@extends('back_end.layout.app')
@section('title')
تعديل
@endsection
@section('content')

    <div class="wrap-contact100">
			<form class="contact100-form validate-form"action="{{ route('reservs.update' , ['id' => $Reserv]) }}" method="POST"> 
            @csrf
            @method('PUT')  
				<span class="contact100-form-title">
					تعديل
				</span>

				<div class="wrap-input100 validate-input" data-validate="Please enter your name">
					<input class="input100" type="text" name="name"  value="{{$Reserv->name}}" placeholder="الاسم">
					<span class="focus-input100"></span>
				</div>

			
				<div class="wrap-input100 validate-input">
				<label for="body">الاطباء</label>
                            <select name="user_id" class="input100">
                                @foreach($users  as $user)
								<option value="{{ $Reserv->id }}"{{ isset($Reserv) && $Reserv->user_id == $Reserv->id ? 'selected'  :'' }} >{{ $user->name }}</option>
                                @endforeach
                            </select>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Please enter your phone">
                <input class="input100" type="text" name="phone"   value="{{$Reserv->phone}}"  placeholder="التلفون">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Please enter your email: e@a.x">
					<input class="input100" type="text" name="email"   value="{{$Reserv->email}}" placeholder="البريد">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Please enter your email: e@a.x">
					<input class="input100" type="time" name="time"   value="{{$Reserv->time}}" placeholder="الوقت">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Please enter your email: e@a.x">
					<input class="input100" type="date" name="date"   value="{{$Reserv->date}}" placeholder="التاريخ">
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