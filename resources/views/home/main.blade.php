@extends('layouts.master')

@section('metaDesc')
Tempat beli website terpercaya, murah dan berkualitas
@endsection

@section('content')

    @include('home.templates.banner')
    @include('home.templates.client')
    @include('home.templates.whyUs')
    @include('home.templates.price')
    @include('home.templates.testimonial')
    @include('home.templates.cta')
    @include('home.templates.article')
    @include('home.templates.profile')
    @include('home.templates.qnoitelabs')

@endsection