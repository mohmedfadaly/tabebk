<?php

namespace App\Providers;
use App\models\Specialty;
use App\models\Comment;
use App\models\Message;
use App\models\Reserv;
use App\models\User;
use App\models\Video;
use App\models\Post;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { 
        view()->share('specialties' , Specialty::where('id', '<>', '1')->get());
        view()->share('Post' , Post::get());
        view()->share('comments' , Comment::get());
        view()->share('messages' , Message::get());
        view()->share('reservs' , Reserv::get());
        view()->share('Video' , Video::get());
        view()->share('users' , User::where('group' , 'doctor')->get());
        
       
    }
}
