<?php

namespace App\Http\Controllers\backend;

use App\models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class specialties extends backendController
{

    public function __construct(Specialty $model)
    {
        parent::__construct($model);
    }

      //
      public function index() {

        $specialties = Specialty::paginate(10);
        return view('back_end.specialties.index',compact('specialties'));
    }

    public function create() {
        return view('back_end.specialties.create');

    }

    public function store(Request $request) {
        $request->validate([
            'name' =>  'required|max:191',
            'meta_keywords' => 'required|max:191',
            'meta_des' => 'required|max:191',
        ]);
        $Specialty = new Specialty() ;
        $Specialty->name =  $request->name ;
        $Specialty->meta_keywords =  $request->meta_keywords ;
        $Specialty->meta_des =  $request->meta_des ;
        $Specialty->save();
        return redirect()->route('specialties.index')->with('status', 'التخصص انشأ');
    }

    public function edit($id) {
        $Specialty = Specialty::find($id);
        return view('back_end.specialties.edit', compact('Specialty'));


    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' =>  'required|max:191',
            'meta_keywords' => 'required|max:191',
            'meta_des' => 'required|max:191',
        ]);
        $Specialty = Specialty::find($id) ;
        $Specialty->name =  $request->name ;
        $Specialty->meta_keywords =  $request->meta_keywords ;
        $Specialty->meta_des =  $request->meta_des ;
        $Specialty->save();
        return redirect()->route('specialties.index')->with('status', 'التخصص تم التعديل !');
    }

    public function destroy($id) {
        $Specialty = Specialty::find($id) ;
        $Specialty->delete();
        return redirect()->route('specialties.index')->with('status', 'النخصص مسح !');
    }
}
