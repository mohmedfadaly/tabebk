<?php

namespace App\Http\Controllers\backend;

use App\models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class posts extends backendController
{
    use CommentTrait;
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }
    //
    public function index() {

        $posts = Post::paginate(10);
        return view('back_end.posts.index',compact('posts'));
    }

    public function create() {
        $append = $this->append();
        return view('back_end.posts.create')->with($append);

    }
    protected function append()
    {
        $array =  [
            'comments' => [],
        ];
        if(request()->route()->parameter('Post')){
            $array['comments']  = $this->model->find(request()->route()->parameter('Post'))
                ->comments()->orderBy('id' , 'desc')->with('user')->get();
        }
            return $array;
    }

    public function store(Request $request) {
        $request->validate([
            'post' =>  'required|max:250',
        ]);
        $Post = new Post() ;
        $Post->post =  $request->post ;
        $requestArray =['user_id' => auth()->user()->id] + $request->all();
        
        $Post = $this->model->create($requestArray);
        $Post->save();
        return redirect()->route('posts.index')->with('status', 'Post was created !');
    }

    public function edit($id) {
        $Post = Post::find($id);
        $append = $this->append();
        return view('back_end.posts.edit', compact('Post'))->with($append);


    }

    public function update(Request $request, $id) {
        $request->validate([
            'post' =>  'required|max:250',
        ]);
        $Post = Post::find($id) ;
        $Post->post =  $request->post ;
        $Post->save();
        return redirect()->route('posts.index')->with('status', 'Post was updated !');
    }

    public function destroy($id) {
        $Post = Post::find($id) ;
        $Post->delete();
        return redirect()->route('posts.index')->with('status', 'Post was deleted !');
    }
}