@extends('layouts.panel')

@section('title', 'News')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center pb-3">
            <div class="h3">
                News
            </div>
            <div>
                <a class="btn btn-primary" href="{{ route('panel.news.create') }}">Create</a>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered display" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Author</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Created at</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->author?->username }}</td>
                            <td>{{ $item->name }}</td>
                            <td class="text-center">
                                <img src="{{ $item->image ? $item->getImage() : asset('img/not_found.jpg') }}" alt="{{ $item->name }}" style="width: 100px">
                            </td>
                            <td>{{ $item->created_at->format('d.m.Y H:i') }}</td>
                            <td>
                                <a href="{{ route('panel.news.edit', $item) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('panel.news.destroy', $item) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this news?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
