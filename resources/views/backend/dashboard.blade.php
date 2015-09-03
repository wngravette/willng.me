@extends('backend.backend-wrap')
@section('content')
<div class="columns">
    <div class="two-thirds column">
        <h3>Actions</h3>
        <a class="btn" href="dashboard/new-post" role="button">New Blog Post</a>
        <a class="btn" href="#" role="button">New Investment</a>
        <h3>Blog Posts</h3>
        @if (isset($status))
        <div class="flash">
            {{$status}}
        </div>
        @endif
        @foreach ($blog_posts as $post)
        <div class="blog_post">
            <h2>{{$post->article_headline}}</h2>
            <p>Published {{$post->human_time}}</p>
        </div>
        @endforeach
    </div>
    <div class="one-third column">
        <script>
        $(function () {
            $('#CIVchart').highcharts({
                chart: {
                    type: 'line'
                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    enabled: false
                },
                title: {
                    text: ''
                },
                // xAxis: {
                //     categories: ['2015-07-22', '2015-07-23', '2015-07-26', '2015-07-27', '2015-07-28', '2015-07-29', '2015-07-30', '2015-08-02', '2015-08-03', '2015-08-04', '2015-08-05', '2015-08-06', '2015-08-09', '2015-08-10', '2015-08-11', '2015-08-12', '2015-08-13', '2015-08-16', '2015-08-17', '2015-08-18', '2015-08-19', '2015-08-20', '2015-08-23', '2015-08-24', '2015-08-25', '2015-08-26', '2015-08-27', '2015-08-30', '2015-08-31', '2015-09-01'],
                // },
                yAxis: {
                    title: {
                        text: 'CIV'
                    },
                },
                xAxis: {
                    reversed: true,
                },
                series: [{
                    name: 'CIV',
                    data: [
                        @foreach ($civ_performance as $dayData)
                        {{$dayData['amount'] /100}},
                        @endforeach
                    ]
                }]
            });
        });
        </script>
        <div id="CIVchart" style="width:100%; height:250px;"></div>
    </div>
</div>
@endsection
