@extends('layouts.app')

@section('title' , $user->name)

@section('content')

    <div class="section  d-flex justify-content-center align-items-center" style="margin-top: 100px;text-align: center;margin-bottom: 100px;">
        <div class="container">
            <div class="owner">
                <div class="avatar">
                    <img src="{{ url('uploads/'.$user->filename) }}" alt="Circle Image"
                         class="rounded-circle img-no-padding img-responsive">
                </div>
                <div class="name">
                    <h4 class="title">{{ $user->name }}
                        <br>
                    </h4>
                    <h6 class="description">
                        {{ $user->email }}
                    </h6>
                </div>
            </div>
            @if(auth()->user() && auth()->user()->group == 'admin')
            <div class="info_button">
                            <a href="{{route('home.index')}}" class="boxed-btn3-white">التحكم</a>
                        </div>
            @endif
            @if(auth()->user() && $user->id == auth()->user()->id)
                <br>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <btn onclick="$('#profileCard').slideToggle(1000)" class="btn btn-outline-default btn-round"><i class="fa fa-cog"></i> Update Profile</btn>
                    </div>
                </div>
                @include('front-end.profile.edit')
            @endif
        </div>
    </div>
@endsection
