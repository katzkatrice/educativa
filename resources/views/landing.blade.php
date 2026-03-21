@extends('layouts.app')

@section('title', 'Dynasti Education Center')

@section('body_class', 'bg-white text-gray-800')

@section('content')
<div x-data="{ sidebarOpen: false }" class="relative">
    @include('components.page.navbar')
    @include('components.page.sidebar')
    @include('components.page.hero')
    @include('components.page.features')
    @include('components.page.courses')
    @include('components.page.cta')
    @include('components.page.contact')
    @include('components.page.footer')
    @include('components.plugin.whatsapp')
</div>

@endsection