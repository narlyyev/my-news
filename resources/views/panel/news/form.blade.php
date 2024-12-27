@extends('layouts.panel')

@section('title', 'News create')

@push('css')
    <style>
        .dropify-wrapper .dropify-message p {
            font-size: 16px;
        }

        .dropify-wrapper .dropify-clear {
            font-size: 14px;
        }

        .dropify-wrapper .dropify-error {
            font-size: 12px;
        }
    </style>
@endpush

@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('panel.home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('panel.news.index') }}">News</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">News create</li>
            </ol>
        </nav>
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="h5">{{ isset($news) ? 'Edit News' : 'Create News' }}</h2>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ isset($news) ? route('panel.news.update', $news->id) : route('panel.news.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($news))
                                @method('PUT')
                            @endif

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name', isset($news) ? $news->name : '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5"
                                          required>{{ old('description', isset($news) ? $news->description : '') }}</textarea>
                            </div>
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" id="image" name="image" class="form-control"
                                       accept="image/png,image/jpg,image/jpeg"
                                       @if(isset($news)) data-default-file="{{ $news->getImage() }}" @endif>
                            </div>

                            <button type="submit"
                                    class="btn btn-primary w-100">{{ isset($news) ? 'Update' : 'Create' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(function () {
            $('#image').dropify();
        });
    </script>
@endpush
