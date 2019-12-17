@extends('back_end.layout.app')
@section('title')
    اضافة
@endsection
@section('content')
<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="{{ route('doctors.store') }}" method="POST"enctype="multipart/form-data">
            @csrf 
				<span class="contact100-form-title">
					اضافة طبيب
				</span>

				<div class="wrap-input100 validate-input" data-validate="Please enter your name">
					<input class="input100" type="text" name="name" placeholder="الاسم">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input">
				<label for="body">التخصص</label>
                            <select name="spec_id" class="input100">
                                @foreach($specialties  as $Specialty)
                                    <option value="{{ $Specialty->id }}" >{{ $Specialty->name }}</option>
                                @endforeach
                            </select>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Please enter your phone">
                <input class="input100" type="text" name="phone" placeholder="التلفون">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Please enter your email: e@a.x">
					<input class="input100" type="text" name="email" placeholder="البريد">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100">
					<input class="input100" type="file" name="filename">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Please enter your message">
                <input class="input100" type="text" name="password" placeholder="الرقم السري">
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