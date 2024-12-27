@extends('layouts.app')

@section('title', $item->name)

@section('content')

    <div class="text-center pt-5">
        <img src="{{ $item->image ? $item->getImage() : asset('img/not_found.jpg') }}"
             alt="{{ $item->name }}" class="img-fluid pb-3">
    </div>
    <div class="py-3">
        <div class="h2">{{ $item->name }}</div>
        <div>{{ $item->description }}</div>
        <div class="h5 pt-3">{{ $item->created_at->format('d.m.Y H:i') }}</div>
    </div>
@endsection
