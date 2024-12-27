@extends('layouts.panel')

@section('title', 'Dashboard')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div id="authors-chart"></div>
            </div>
            <div class="col-md-6">
                <div id="news-chart"></div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/highcharts.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Highcharts.chart('authors-chart', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'News Count by Authors'
                },
                xAxis: {
                    categories: {!! json_encode($authorNames) !!},
                    title: {
                        text: 'Authors'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'News Count',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: ' news'
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'News Count',
                    data: {!! json_encode($newsCounts) !!}
                }]
            });

            Highcharts.chart('news-chart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Top 5 Recent News Description Lengths'
                },
                xAxis: {
                    categories: {!! json_encode($newsTitles) !!},
                    title: {
                        text: 'News Titles'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Description Length (characters)',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: ' characters'
                },
                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Description Length',
                    data: {!! json_encode($descriptionLengths) !!}
                }]
            });
        });
    </script>
@endsection
