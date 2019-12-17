@extends('layouts.app')
@section('title' , 'home')
@section('content')
@include('layouts.slider')
@include('front-end.post.index')
@include('front-end.homepage-sections.doctor')

@include('front-end.homepage-sections.statics')
@include('front-end.shared.video-row')

@endsection
