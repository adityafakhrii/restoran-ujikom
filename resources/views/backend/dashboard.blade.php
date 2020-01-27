@extends('backend.layout.master')
    <title>Dashboard | Restaurant</title>
	<style>
		span{
			font-weight: normal;
		}
	</style>
@section('content')
	<h3> <span>Selamat Datang </span>{{auth()->user()->nama}} <span>sebagai</span> {{auth()->user()->role}} </h3>
@endsection