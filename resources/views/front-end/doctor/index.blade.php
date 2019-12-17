@extends('layouts.app')

@section('title' , $User->name)


@section('content')
<div class="whole-wrap">
		<div class="container box_1170">
<div class="section-top-border text-right">
				<h3 class="mb-30">{{$User->name}}</h3>
				<div class="row">
					<div class="col-md-9">
						<p class="text-right">{{ $User->Specialty->name }}</p>
						<p class="text-right">{{$User->email}}</p>
					</div>
					<div class="col-md-3">
                    <img src="{{ url('uploads/'.$User->filename) }}" alt="{{ $User->name }} " width="250">
					</div>
				</div>
			</div>
            </div>
			</div>
			

			
<section class="blog_area single-post-area section-padding"id="profileCard">
      <div class="container">
      <h4 style="margin-top: 10px;margin-bottom: 5px;text-align: center;">الحجزات</h4>
         <div class="row">
         
            <div class="col-lg-12 posts-list">
               <div class="single-post">
@foreach($User->reservs as $reservs)
<div class="quote-wrapper">
                    <div class="quotes">
                           <p>{{$reservs->name}}</p>
                           <a href="{{ route('frontend.Doctor' , ['id' => $reservs->user->id]) }}" title="{{ $User->name }}">
                           <p>{{$reservs->user->name}}</p>
                            </a>
                           
                           <p>{{$reservs->phone}}</p>
                           <p>{{$reservs->email}}</p>
                           <p>{{$reservs->time}}</p>
                           <p>{{$reservs->date}}</p>
                    </div>
            </div>
    @endforeach
    </div>
    </div>
    </div>
    </div>
    </section>

@endsection
