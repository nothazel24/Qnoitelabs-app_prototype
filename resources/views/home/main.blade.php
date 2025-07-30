@extends('layouts.master')

@section('homeActive')
    text-primary
@endsection

@section('homepageContent')

    @include('home.templates.home')
    @include('home.templates.client')
    @include('home.templates.whyUs')
    @include('home.templates.price')
    @include('home.templates.testimonial')
    @include('home.templates.article')
    @include('home.templates.profile')
    @include('home.templates.qnoitelabs')

@endsection