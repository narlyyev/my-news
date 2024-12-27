@extends('layouts.panel')

@section('title', 'Users')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center pb-3">
            <div class="h3">
                Users
            </div>
            <div>
                <a class="btn btn-primary" href="{{ route('panel.users.create') }}">Create</a>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered display" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Created at</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
                            <td>
                                <a href="{{ route('panel.users.edit', $user) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('panel.users.destroy', $user) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
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
