@extends('layouts.app')

@section('title', 'Dynasti Education Center')

@section('body_class', 'bg-white text-gray-800')

@section('content')
    <div x-data="{ sidebarOpen: false }" class="relative">
        @include('components.navbar')
        @include('components.sidebar')
        @include('components.hero')

        <section class="py-10 text-center">
            <p class="text-gray-500 mb-4">Dipercaya oleh</p>
            <div class="flex justify-center gap-10 text-gray-400">
                <span>Mahasiswa</span>
                <span>Lembaga Penelitian</span>
                <span>Universitas</span>
            </div>
        </section>

        @include('components.features')
        @include('components.courses')
        @include('components.cta')
        @include('components.footer')
    </div>
@endsection
