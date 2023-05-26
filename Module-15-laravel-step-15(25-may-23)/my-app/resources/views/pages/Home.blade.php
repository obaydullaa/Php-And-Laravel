@extends('layout.app')

@section('content')

    @include('component.Hero');
    @include('component.About');
    {{-- @include('component.HowWeDoe'); --}}
    @include('component.Team');

@endsection