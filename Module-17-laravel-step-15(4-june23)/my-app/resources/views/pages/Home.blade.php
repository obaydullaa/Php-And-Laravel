@extends('layout.app')

@section('content')

    @include('component.Hero');
    @include('component.About');
    @include('component.WhatWeDo');
    @include('component.Experience');
    @include('component.Pricing');
    @include('component.Project');
    @include('component.Subscribe');
    @include('component.Testimonials');
    @include('component.Accordion');
    @include('component.Blog');
    @include('component.Team');

@endsection