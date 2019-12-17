@extends('back_end.layout.app')
@section('title')
تعديل
@endsection
@section('content')

    <div class="wrap-contact100">
			<form class="contact100-form validate-form"action="{{ route('videos.update' , ['id' => $Video]) }}" method="POST" enctype="multipart/form-data"> 
            @csrf
            @method('PUT')  
				<span class="contact100-form-title">
					تعديل
				</span>

				<div class="wrap-input100 validate-input" data-validate="Please enter your name">
					<input class="input100" type="text" name="name"  value="{{$Video->name}}" placeholder="الاسم">
					<span class="focus-input100"></span>
				</div>
				

				<div class="wrap-input100 validate-input" data-validate = "Please enter your phone">
				<input type="text" name="meta_des" id="meta_des"value="{{$Video->meta_des}}" class="input100">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Please enter your email: e@a.x">
				<input type="text" name="meta_keywords" id="meta_keywords"value="{{$Video->meta_keywords}}" class="input100">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100">
					<input class="input100" type="file" name="image">
					<img src="{{ url('uploads/videos/'.$Video->image) }}" width="400">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100">
					<input class="input100" type="file" name="video">
					<video controls>
						<source src="{{ url('uploads/videos/'.$Video->video) }}" type="video/mp4" width="400">
					</video>
					
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Please enter your message">
                <textarea  name="des" cols="30" videos="10" id="des" value="{{$Video->des}}" class="input100"></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">

					<i class="far fa-edit"></i>	تعديل

					</button>
				</div>
			</form>
		</div>

@endsection