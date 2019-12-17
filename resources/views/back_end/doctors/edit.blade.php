@extends('back_end.layout.app')
@section('title')
تعديل
@endsection
@section('content')

    <div class="wrap-contact100">
			<form class="contact100-form validate-form"action="{{ route('doctors.update' , ['id' => $Doctor]) }}" method="POST"> 
            @csrf
            @method('PUT')  
				<span class="contact100-form-title">
					تعديل
				</span>

				<div class="wrap-input100 validate-input" data-validate="Please enter your name">
					<input class="input100" type="text" name="name" value="{{$Doctor->name}}" placeholder="الاسم">
					<span class="focus-input100"></span>
				</div>


				<div class="wrap-input100 validate-input">
				<label for="body">التخصص</label>
                            <select name="spec_id" class="input100">
                                @foreach($specialties  as $Specialty)
                                    <option value="{{ $Specialty->id }}"{{ isset($Doctor) && $Doctor->cat_id == $Specialty->id ? 'selected'  :'' }} >{{ $Specialty->name }}</option>
                                @endforeach
                            </select>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Please enter your phone">
                <input class="input100" type="text" name="phone" value="{{$Doctor->phone}}" placeholder="التلفون">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Please enter your email: e@a.x">
					<input class="input100" type="text" name="email" value="{{$Doctor->email}}" placeholder="البريد">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100">
					<input class="input100" type="file" name="filename">

					<span class="focus-input100"></span>
					<img src="{{ url('uploads/'.$Doctor->filename) }}" width="400">
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Please enter your message">
                <input class="input100" type="text" name="password" placeholder="الرقم السري">
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