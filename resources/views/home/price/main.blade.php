@extends('layouts.master')

@section('homeActive')
    text-primary
@endsection

@section('homepageContent')
    @include('home.templates.home')
    @include('home.templates.price')
@endsection
