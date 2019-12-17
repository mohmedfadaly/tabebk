<?php

namespace App\Http\Controllers\backend;
use App\models\Reserv;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class reservs extends backendController
{
    
    public function __construct(Reserv $model)
    {
        parent::__construct($model);
    }
    //
    public function index() {

        $reservs = Reserv::paginate(10);
        return view('back_end.reservs.index',compact('reservs'));
    }
    public function create() {
        $append = $this->append();
        return view('back_end.reservs.create')->with($append);

    }
    protected function append()
    {
        $array =  [
            'users' => User::where('group' , 'doctor')->get(),
        ];
            return $array;
    }

    public function store(Request $request) {
        $request->validate([
            'name' =>  'required|max:191',
            'phone' => 'required',
            'email' =>  'email',
            'date' => 'required',
            'user_id' => 'required',
            'time' => 'required',
        ]);
        $Reserv = new Reserv() ;
        $Reserv->name =  $request->name ;
        $Reserv->phone =  $request->phone ;
        $Reserv->email =  $request->email ;
        $Reserv->date =  $request->date ;
        $Reserv->user_id =  $request->user_id ;
        $Reserv->time =  $request->time ;
        $Reserv->save();
        return redirect()->route('reservs.index')->with('status', 'الحجز انشأ');
    }


    public function edit($id) {
        $Reserv = Reserv::find($id);
        $append = $this->append();
        return view('back_end.reservs.edit', compact('Reserv'))->with($append);


    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' =>  'required|max:191',
            'phone' => 'required',
            'email' =>  'email',
            'date' => 'required',
            'user_id' => 'required',
            'time' => 'required',
        ]);
        $Reserv = Reserv::find($id) ;
        $Reserv->name =  $request->name ;
        $Reserv->phone =  $request->phone ;
        $Reserv->email =  $request->email ;
        $Reserv->date =  $request->date ;
        $Reserv->user_id =  $request->user_id ;
        $Reserv->time =  $request->time ;
        $Specialty->save();
        return redirect()->route('reservs.index')->with('status', 'التخصص تم التعديل !');
    }

    public function destroy($id) {
        $Reserv = Reserv::find($id) ;
        $Reserv->delete();
        return redirect()->route('reservs.index')->with('status', 'النخصص مسح !');
    }
    
}