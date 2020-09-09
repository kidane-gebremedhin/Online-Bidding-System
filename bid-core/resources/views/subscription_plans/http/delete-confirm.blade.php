@extends("layouts.master")
@section("title", "delete")

@section("bodyContent") 
@include('subscription_plans.ajax.delete-confirm')
@stop