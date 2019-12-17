@extends('layouts.app')

@section('title' , $Video->name)

@section('meta_keywords' , $Video->meta_keywords)

@section('meta_des' , $Video->meta_des)
@section('content')
    <div class="section section-buttons" style="text-align: right;">
        <div class="container">
            <div class="title">
                <h1>{{ $Video->name}}</h1>
            </div>

            <div class="row">
                <div class="col-md-12">
                <video controls style="width: 100%;">
						<source src="{{ url('uploads/videos/'.$Video->video) }}" type="video/mp4">
					</video>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p>
                        <span>
                        {{ $Video->user->name }} : <i class="fa fa-running"></i>بواسطة
                        </span>

                    </p>
                    <p>
                        <span>
                       {{ $Video->created_at }} :   <i class="fa fa-calendar-check"></i>الوقت
                        </span>
                    </p>
                    <p>
                        {{ $Video->des }}
                    </p>
                </div>
                
            </div>
   
        </div>
    </div>
@endsection
