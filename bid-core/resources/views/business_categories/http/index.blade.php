@extends("layouts.master")

@section('title', 'index')

@section("bodyContent") 

@include('business_categories.ajax.index')

@stop
