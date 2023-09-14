@extends('layouts.master')


@section('content')
    <div class="card text-start bg-info">
        <div class="card-body">
            <h4 class="card-title">Title</h4>
            {{-- <p class="card-text">{{ $koko }} - {{ $name }}</p> --}}
            {{ $name  }} - {{ $age }}
        </div>
    </div>
@endsection
@section('title', 'page1')

@section('header', 'Page 1')
