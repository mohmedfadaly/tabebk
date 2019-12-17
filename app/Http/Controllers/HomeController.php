<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\User;
use App\models\Message;
use Illuminate\Support\Facades\Auth;
use App\models\Comment;
use App\models\Specialty;
use App\models\Post;
use App\models\Reserv;
use App\models\Video;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only([
            'profileUpdate'
       ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $User = User::where('group' , 'doctor')->orderBy('id' , 'desc');
        if(request()->has('search') && request()->get('search') != ''){
            $User = $User->where('name' , 'like' , "%".request()->get('search')."%");
        }
        $User = $User->paginate(30);
        return view('home',compact('User'));
    }
    public function Specialty($id){
        $Specialty = Specialty::findOrFail($id);
        $User = User::where('spec_id' , $id)->orderBy('id' , 'desc')->paginate(30);
        return view('front-end.Specialty.index' , compact('User' , 'Specialty'));
    }

    public function Doctor($id){
        $User = User::where('group' , 'doctor')->with('Specialty')->findOrFail($id);
        $Reserv = Reserv::where('user_id' , $id)->orderBy('id' , 'desc')->paginate(30);
        return view('front-end.Doctor.index' , compact('User','Reserv'));
    }
    public function video($id){
        $Video = Video::with('user')->findOrFail($id);
        return view('front-end.video.index' , compact('Video'));
    }
    public function welcome(){
        $User = User::where('group' , 'doctor')->orderBy('id' , 'desc')->paginate(9);
        $Post_count = Post::count();
        $comments_count = Comment::count();
        $Specialty_count = Specialty::count();
        return view('welcome' , compact('User' , 'Specialty_count' , 'comments_count' , 'Post_count'));
    }
    public function profile($id , $slug = null){
        $user = User::findOrFail($id);
        return view('front-end.profile.index' , compact('user'));
    }

    ///////////
    public function post() {

        $posts = Post::paginate(10);
        return view('front-end.post.index',compact('posts'));
    }

    public function postcreate() {
        $append = $this->append();
        return view('front-end.post.create')->with($append);

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

    public function poststore(Request $request) {
        $request->validate([
            'post' =>  'required|max:250',
        ]);
        $Post = new Post() ;
        $Post->post =  $request->post ;
        $requestArray =['user_id' => auth()->user()->id] + $request->all();
        
        $Post = Post::create($requestArray);
        $Post->save();
        return redirect()->route('post.index')->with('status', 'Post was created !');
    }



    ///////////////////////

    /////////////////////////
    public function Reserv($id) {

        $Reserv = Reserv::with('user')->findOrFail($id);
        return view('front-end.Reserv.index',compact('Reserv'));
    }

    public function Reservcreate() {
        $append1 = $this->append1();
        return view('front-end.Reserv.create')->with($append1);

    }
    protected function append1()
    {
        $array =  [
            'users' => User::where('group' , 'doctor')->get(),
        ];
            return $array;
    }

    public function Reservstore(Request $request) {
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
        return redirect()->route('home')->with('status', 'Reserv was created !');
    }


/////////////////////////
public function commentUpdate($id , \App\Http\Requests\FrontEnd\Comments\store $request){
    $comment = Comment::findOrFail($id);
    if(($comment->user_id == auth()->user()->id) || auth()->user()->group == 'admin'){
        $comment->update(['comment' => $request->comment]);
        
    }
    return redirect()->route('frontend.video' , ['id' => $comment->post_id , '#commnets']);
}

public function commentStore($id , \App\Http\Requests\FrontEnd\Comments\store $request){
    $Post = Post::findOrFail($id);
    Comment::create([
        'user_id' => auth()->user()->id,
        'post_id' => $Post->id,
        'comment' => $request->comment
    ]);
    
    return redirect()->route('frontend.Post' , ['id' => $Post->id , '#commnets']);
}



    public function profileUpdate(\App\Http\Requests\FrontEnd\User\store $request){
        $user = User::findOrFail(auth()->user()->id);
        $array = [];
        if($request->email != $user->email){
            $email = User::where('email' , $request->email)->first();
            if($email == null){
                $array['email'] =  $request->email;
            }
        }
        if($request->name != $user->name){
            $array['name'] =  $request->name;
        }
        if($request->password != ''){
            $array['password'] =  Hash::make($request->password);
        }
        if(!empty($array)){
            $user->update($array);
        }

        return redirect()->route('front.profile' , ['id' => $user->id , 'slug' =>slug($user->name)]);
    }

    ////////////////////////////////////////////////

    public function indexmes()
    {
        $users = DB::select("select users.id, users.name, users.filename, users.email, count(is_read) as unread 
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        where users.id != " . Auth::id() . " 
        group by users.id, users.name, users.filename, users.email");

        return view('chat', ['users' => $users]);
    }
    public function getMessage($user_id)
    {
        $my_id = Auth::id();
        // Make read all unread message
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);
        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->get();
        return view('messages.indexmes', ['messages' => $messages]);
    }
    public function sendMessage(Request $request)
    {
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;
        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0; // message will be unread when sending message
        $data->save();
        // pusher
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );
        $pusher = new Pusher(
            'f979a96d13b7cf51a736',
            '2d1aba05b89d0f4d5ba6',
            '916900',
            $options
        );
        $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
    }
}
