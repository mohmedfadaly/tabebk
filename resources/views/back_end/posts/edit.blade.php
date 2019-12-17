@extends('back_end.layout.app')
@section('title')
تعديل
@endsection
@section('content')

    <div class="wrap-contact100">
			<form class="contact100-form validate-form"action="{{ route('posts.update' , ['id' => $Post]) }}" method="POST"> 
            @csrf
            @method('PUT')  
				<span class="contact100-form-title">
					تعديل
				</span>

				<div class="wrap-input100 validate-input" data-validate = "Please enter your post: e@a.x">
				<textarea class="input100" type="text" name="post" value="{{$Post->post}}" placeholder="منشور">{{$Post->post}}</textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">

					<i class="far fa-edit"></i>	تعديل

					</button>
				</div>
			</form>
		</div>
		@component('back_end.shared.edit' , ['pageTitle' => "التعليقات" , 'pageDes' => "لوحة التحكم بالتعليقات"])

@include('back_end.comments.index')
@slot('md4')
@include('back_end.comments.create')
@endslot
@endcomponent

@endsection