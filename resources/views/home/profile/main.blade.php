@extends('layouts.master')

@section('metaDesc')
Tempat beli website terpercaya, murah dan berkualitas
@endsection

@section('content')
    @include('home.profile.templates.banner')
    @include('home.profile.templates.qnoite')
    @include('home.profile.templates.about')
    @include('home.templates.qnoitelabs')
@endsection
