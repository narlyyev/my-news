@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div id="news-container">
        @include('customer.home.partials.news', ['news' => $news])
    </div>
@endsection

@push('js')
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            fetchNews(page);
        });

        function fetchNews(page) {
            $.ajax({
                url: "?page=" + page,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $('#news-container').html(data);
                }
            });
        }
    </script>
@endpush
