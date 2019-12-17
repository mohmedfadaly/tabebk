@extends('back_end.layout.app')
@section('title')
اضافة منشور
@endsection
@section('content')
   
    <div class="wrap-contact100">
			<form class="contact100-form validate-form" action="{{ route('posts.store') }}" method="POST">
            @csrf 
				<span class="contact100-form-title">
					اضافة منشور
				</span>

				<div class="wrap-input100 validate-input" data-validate = "Please enter your post: e@a.x">
				<textarea class="input100" type="text" name="post" placeholder="منشور"></textarea>
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