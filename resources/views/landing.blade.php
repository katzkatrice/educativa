@extends('layouts.app')

@section('title', 'Dynasti Education Center')

@section('body_class', 'bg-white text-gray-800')

@section('content')
<div x-data="{ sidebarOpen: false }" class="relative">
    @include('components.navbar')
    @include('components.sidebar')
    @include('components.hero')



    @include('components.features')
    @include('components.courses')
    @include('components.cta')
    @include('components.footer')
</div>
@endsection