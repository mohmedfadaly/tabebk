@extends('back_end.layout.app')
@section('title')
    الرائيسية
@endsection
@section('content')
<div class="card">
                <div class="card-header card-header-primary">
                @component('back_end.layout.header')
                    @endcomponent
                <div class="row">
                
                  <div class="col-md-8 text-right">
                      <h4 class="card-title ">الرائيسية</h4>
                  </div>
                  
                </div>

 
                </div>
              </div>
              <div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                <i class="fa fa-clipboard"></i>
                </div>
                <p class="card-category">posts</p>
                <h3 class="card-title">{{ \App\models\Post::count() }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{ route('posts.index') }}" class="warning-link">All posts</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                <i class="fa fa-user-nurse"></i>
                </div>
                <p class="card-category">doctors</p>
                <h3 class="card-title">{{ \App\models\User::where('group' , 'doctor')->count() }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{ route('doctors') }}" class="warning-link">All doctors</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-tags"></i>
                </div>
                <p class="card-category">Specialty</p>
                <h3 class="card-title">{{ \App\models\Specialty::count() }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{ route('specialties.index') }}" class="warning-link">All specialties</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-comments"></i>
                </div>
                <p class="card-category">Comments</p>
                <h3 class="card-title">{{ \App\models\Comment::count() }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{ route('posts.index') }}" class="warning-link">Check Post</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-video"></i>
                </div>
                <p class="card-category">videos</p>
                <h3 class="card-title">{{ \App\models\Video::count() }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{ route('videos.index') }}" class="warning-link">Check videos</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                <i class="fa fa-calendar-check"></i>
                </div>
                <p class="card-category">reservs</p>
                <h3 class="card-title">{{ \App\models\Reserv::count() }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{ route('reservs.index') }}" class="warning-link">Check reservs</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection