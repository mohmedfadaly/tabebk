<?php

namespace App\Http\Controllers\backend;

use App\models\User;
use App\models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use DB;

class users extends backendController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    //
    public function doctors() {

        $users = User::where('group' , 'doctor')->paginate(10);
        return view('back_end.users.index',compact('users'));
    }
    public function index() {

        $users = User::where('spec_id' , '1')->paginate(10);
        return view('back_end.users.index',compact('users'));
    }
    protected function append()
    {
        $array =  [
            'specialties' => Specialty::get(),
        ];
            return $array;
    }

    public function create() {
        $append = $this->append();
        return view('back_end.users.create')->with($append);

    }

    public function store(Request $request) {
        $request->validate([
            'name' =>  'required|max:200',
            'spec_id' => 'required',
            'phone' => 'required|string',
            'email' => 'required|max:500',
            'password' => 'required|max:500',
            'group' => ['required'],
            'filename' => 'required|image|mimes:jpeg,png,jpg,gif|'
        ]);

        $originalImage= $request->file('filename');
        $ext = $originalImage->getClientOriginalExtension();
        $thumbnailImage = Image::make($originalImage);
        $originalImage->move(public_path('uploads') , 'cover_image' . '_' . time().  '.' . $ext);
        $thumbnailImage->resize(150,150);


        $user = new User() ;
        $user->name =  $request->name ;
        $user->spec_id =  $request->input('spec_id');
        $user->phone =  $request->phone ;
        $user->email =  $request->email ;
        $user->password =  Hash::make ($request->password) ;
        $user->filename='cover_image' . '_' . time().  '.' . $ext;
        $user->group =  $request->group ;
        $user->save();
        return redirect()->route('users.index')->with('status', 'user was created !');
    }

    public function edit($id) {
        $user = User::find($id);
        $append = $this->append();
        return view('back_end.users.edit', compact('user'))->with($append);


    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' =>  'required|max:200',
            'spec_id' => 'nullable|numeric',
            'phone' => 'required|string',
            'email' => 'required|max:500',
            'password' => 'required|max:500',
            'group' => ['required'],
            'filename' => 'required|image|mimes:jpeg,png,jpg,gif|'

        ]);

        $originalImage= $request->file('filename');
        $ext = $originalImage->getClientOriginalExtension();
        $thumbnailImage = Image::make($originalImage);
        $originalImage->move(public_path('uploads') , 'cover_image' . '_' . time().  '.' . $ext);
        $thumbnailImage->resize(150,150);



        $user = User::find($id) ;
        $user->name =  $request->name ;
        $user->spec_id =$request->input('spec_id');
        $user->phone =  $request->phone ;
        $user->email =  $request->email ;
        $user->password =  Hash::make ($request->password) ;
        $user->filename='cover_image' . '_' . time().  '.' . $ext;
        $user->group =  $request->group ;
        $user->save();
        return redirect()->route('users.index')->with('status', 'user was updated !');
    }

    public function destroy($id) {
        $user = User::find($id) ;
        $user->delete();
        return redirect()->route('users.index')->with('status', 'user was deleted !');
    }
}
