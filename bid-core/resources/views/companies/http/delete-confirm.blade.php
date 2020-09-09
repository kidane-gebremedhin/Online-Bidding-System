@extends("layouts.master")
@section("title", "delete")

@section("bodyContent") 
@include('companies.ajax.delete-confirm')
@stop