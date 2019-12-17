@extends('layouts.app')

@section('title' , $Specialty->name)



@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1 class="text-right">{{ $Specialty->name }}</h1>
            </div>
            @include('front-end.shared.doctor-row')
        </div>
    </div>
@endsection
