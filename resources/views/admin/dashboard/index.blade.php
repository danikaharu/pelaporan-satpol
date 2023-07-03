@extends('layouts.admin.index')

@section('title')
    Dashboard
@endsection

@section('content')
    {{ auth()->user()->name }}
@endsection
