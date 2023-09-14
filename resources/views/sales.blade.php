@extends('layouts.master')
@section('title', 'Sales Agents')
@section('header', 'Sales Agents Targets')
@section('content')
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Jun</th>
                    <th scope="col">Feb</th>
                    <th scope="col">March</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($agents as $name => $targets)
                    <tr class="">
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $name }}</td>
                        @foreach ($targets as $month => $amount)
                            <td>{{ $amount }}</td>
                        @endforeach
                    </tr>
                @empty
                    <tr class="">
                        <td class="fw-bold text-center" colspan="5" scope="row">
                            <h2>No Data Found</h2>
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

@endsection
