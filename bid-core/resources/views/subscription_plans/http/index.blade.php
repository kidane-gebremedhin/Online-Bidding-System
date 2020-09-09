@extends("layouts.master")

@section('title', 'index')

@section("bodyContent") 

@include('subscription_plans.ajax.index')

@stop
