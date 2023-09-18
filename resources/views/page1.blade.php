@extends('layouts.master')


@section('content')
    <div class="card text-start bg-info">
        <div class="card-body">
            <h4 class="card-title">Title</h4>
<<<<<<< HEAD
            {{-- <p class="card-text">{{ $koko }} - {{ $name }}</p> --}}
            {{ $name  }} - {{ $age }}
=======
            <p class="card-text">{{ $koko }}</p>
>>>>>>> 9c4551dbca464b3da97120a2b87c04bd44b62b82
        </div>
    </div>
@endsection
@section('title', 'page1')

@section('header', 'Page 1')
