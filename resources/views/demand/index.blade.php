@extends('layouts.pdf')
@section('title')
    <h1>

    </h1>
@endsection

<div>
    @foreach ($demands as $demand)
        <h2>{{ $demand->id }}</h2>
    @endforeach
    <br>
    <br>
    <br>
</div>
