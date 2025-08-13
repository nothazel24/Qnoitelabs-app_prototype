@extends('layouts.master')

@section('metaDesc')
Tempat beli website terpercaya, murah dan berkualitas
@endsection

@section('content')
    @include('home.price.templates.banner')
    @include('home.price.templates.list')
    @include('home.templates.qnoitelabs')
@endsection
