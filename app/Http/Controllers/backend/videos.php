<?php

namespace App\Http\Controllers\backend;

use App\models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use DB;

class videos extends backendController
{
    // 

    public function __construct(Video $model)
    {
        parent::__construct($model);
    }


    public function index() {

        $videos = Video::paginate(10);
        return view('back_end.videos.index',compact('videos'));
    }

    public function create() {

        return view('back_end.videos.create');

    }

    public function store(Request $request) {


        $request->validate([
            'name' =>  'required|max:191',
            'meta_des' => 'required|max:191',
            'meta_keywords' => 'required|max:191',
            'des' =>  'required|max:250',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|',
            'video' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040|required',
        ]);

        
        $originalImage= $request->file('image');
        $ext = $originalImage->getClientOriginalExtension();
        $thumbnailImage = Image::make($originalImage);
        $filename ='video_image' . '_' . time().  '.' . $ext;
        $originalImage->move(public_path('uploads/videos') , $filename);
        $thumbnailImage->resize(150,150);

        $data=$request->all();
        $Video=$data['video'];
                        $input ='video' . '_' . time().  '.' .$Video->getClientOriginalExtension();
                        $destinationPath = 'uploads/videos';
                        $Video->move($destinationPath, $input);



        $Video = new Video() ;
        $Video->name =  $request->name ;
        $Video->meta_des =  $request->meta_des ;
        $Video->meta_keywords =  $request->meta_keywords ;
        $Video->des =  $request->des ;
        $requestArray =['user_id' => auth()->user()->id, 'image' => $filename,  'video' => $input] + $request->all();
        $Video = $this->model->create($requestArray);

        $Video->save();
        return redirect()->route('videos.index')->with('status', 'video was created !');
    }

    public function edit($id) {
        $Video = Video::find($id);
        return view('back_end.videos.edit', compact('Video'));


    }
    

    public function update(Request $request, $id) {
        

        $request->validate([
            'name' =>  'required|max:191',
            'meta_des' => 'required|max:191',
            'meta_keywords' => 'required|max:191',
            'des' =>  'required|max:250',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|',
            'video' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040|required',
            
        ]);
           
         
        $originalImage= $request->file('image');
        $ext = $originalImage->getClientOriginalExtension();
        $thumbnailImage = Image::make($originalImage);
        $filename ='video_image' . '_' . time().  '.' . $ext;
        $originalImage->move(public_path('uploads/videos') , $filename);
        $thumbnailImage->resize(150,150);

        $data=$request->all();
        $Video=$data['video'];
                        $input ='video' . '_' . time().  '.' .$Video->getClientOriginalExtension();
                        $destinationPath = 'uploads/videos';
                        $Video->move($destinationPath, $input);


 
        $Video = Video::find($id) ;
        $Video->name =  $request->name ;
        $Video->meta_des =  $request->meta_des ;
        $Video->meta_keywords =  $request->meta_keywords ;
        $Video->des =  $request->des ;
        $requestArray =['user_id' => auth()->user()->id, 'image' => $filename,  'video' => $input] + $request->all();
        $Video->update($requestArray);
        $this->syncTagsSkills($video , $requestArray);
        $Video->save();
        return redirect()->route('videos.index')->with('status', 'video was created !');
    }

    public function destroy($id) {
        $this->model->FindOrFail($id)->delete();
        return redirect()->route('videos.index')->with('status', 'video was deleted !');
    }
    
}
