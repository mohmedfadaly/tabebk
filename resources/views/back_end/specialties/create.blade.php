@extends('back_end.layout.app')
@section('title')
    اضافة
@endsection
@section('content')
<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="{{ route('specialties.store') }}" method="POST">
            @csrf 
				<span class="contact100-form-title">
					اضافة تخصص
				</span>

				<div class="wrap-input100 validate-input" data-validate="Please enter your name">
					<input class="input100" type="text" name="name" placeholder="الاسم">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Please enter your meta_keywords">
					<input class="input100" type="text" name="meta_keywords" placeholder="كلمات دلالية">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Please enter your meta_des">
                <input class="input100" type="text" name="meta_des" placeholder="كلمات وصفية">
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