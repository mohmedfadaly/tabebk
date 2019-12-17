@extends('layouts.app')
@section('title' , 'home')
@section('content')
<div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h2>Latest doctor</h2>
                @if(request()->has('search') && request()->get('search') != '')
                    <p style="margin-top: 10px">
                        you are search on  <b>{{ request()->get('search') }}</b> |  <a href="{{ route('home') }}"> Reset </a>
                    </p>
                @endif
            </div>
            @include('front-end.shared.doctor-row')
        </div>
    </div>
@endsection
