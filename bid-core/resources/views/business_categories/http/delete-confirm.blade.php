@extends("layouts.master")
@section("title", "delete")

@section("bodyContent") 
@include('business_categories.ajax.delete-confirm')
@stop