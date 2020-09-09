@extends("layouts.master")
@section("title", "show")

@section("bodyContent") 
@include('subscription_plans.ajax.show')
@stop

