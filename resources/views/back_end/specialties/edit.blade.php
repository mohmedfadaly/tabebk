@extends('back_end.layout.app')
@section('title')
تعديل
@endsection
@section('content')

    <div class="wrap-contact100">
			<form class="contact100-form validate-form"action="{{ route('specialties.update' , ['id' => $Specialty]) }}" method="POST"> 
            @csrf
            @method('PUT')  
				<span class="contact100-form-title">
					تعديل
				</span>

				<div class="wrap-input100 validate-input" data-validate="Please enter your name">
					<input class="input100" type="text" name="name" value="{{$Specialty->name}}" placeholder="الاسم">
					<span class="focus-input100"></span>
				</div>


				<div class="wrap-input100 validate-input" data-validate = "Please enter your meta_keywords">
					<input class="input100" type="text" name="meta_keywords" value="{{$Specialty->meta_keywords}}" placeholder="كلمات دلالية">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Please enter your meta_des">
                <input class="input100" type="text" name="meta_des" value="{{$Specialty->meta_des}}" placeholder="كلمات وصفية">
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