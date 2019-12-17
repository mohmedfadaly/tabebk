@extends('back_end.layout.app')
@section('title')
اضافة فديو
@endsection
@section('content')
   
    <div class="wrap-contact100">
			<form class="contact100-form validate-form" action="{{ route('videos.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf 
				<span class="contact100-form-title">
					اضافة فديو
				</span>

				<div class="wrap-input100 validate-input" data-validate="Please enter your name">
					<input class="input100" type="text" name="name" placeholder="الاسم">
					<span class="focus-input100"></span>
				</div>
				

				<div class="wrap-input100 validate-input" data-validate = "Please enter your phone">
				<input type="text" name="meta_des" id="meta_des" class="input100">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Please enter your email: e@a.x">
				<input type="text" name="meta_keywords" id="meta_keywords" class="input100">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100">
					<input class="input100" type="file" name="image">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100">
					<input class="input100" type="file" name="video">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Please enter your message">
                <textarea  name="des" cols="30" videos="10" id="des" class="input100"></textarea>
					<span class="focus-input100"></span>
				</div>

              

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">

					<i class="fas fa-plus"></i><span>   انشاء </span>

					</button>
				</div>
			</form>
		</div>

@endsection