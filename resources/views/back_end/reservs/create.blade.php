@extends('back_end.layout.app')
@section('title')
اضافة حجز
@endsection
@section('content')
   
    <div class="wrap-contact100">
			<form class="contact100-form validate-form" action="{{ route('reservs.store') }}" method="POST">
            @csrf 
				<span class="contact100-form-title">
					اضافة حجز
				</span>

				<div class="wrap-input100 validate-input" data-validate="Please enter your name">
					<input class="input100" type="text" name="name" placeholder="الاسم">
					<span class="focus-input100"></span>
				</div>

			
				<div class="wrap-input100 validate-input">
				<label for="body">الاطباء</label>
                            <select name="user_id" class="input100">
                                @foreach($users  as $user)
                                    <option value="{{ $user->id }}" >{{ $user->name }}</option>
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
				<div class="wrap-input100 validate-input" data-validate = "Please enter your email: e@a.x">
					<input class="input100" type="time" name="time" placeholder="الوقت">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Please enter your email: e@a.x">
					<input class="input100" type="date" name="date" placeholder="التاريخ">
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