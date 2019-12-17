<?php
namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\backend\comments\Store;
use App\models\Comment;

use App\models\Post;
trait CommentTrait{
    
    public function commentStore(Store $request){

        $requestArray = $request->all() + ["user_id" => auth()->user()->id];
        Comment::create($requestArray);
        return redirect()->route('posts.edit' , ['id' => $requestArray['post_id'] , '#comments']);
    }

    public function commentDelete($id){
        $row  = Comment::findOrFail($id);
        $row->delete();
        return redirect()->route('posts.edit' , ['id' => $row->post_id , '#comments']);
    }
    public function commentUpdate($id , Store $request){
        $row  = Comment::findOrFail($id);
        $row->update($request->all());
        return redirect()->route('posts.edit' , ['id' => $row->post_id , '#comments']);
    }
}
?>