@extends('wrap')
@section('content')
<div class="pure-g header">
    <div class="pure-u-1">
        <div class="l-box">
            <h1>William Naughton-Gravette <span class="title_suppliment">{{$name_catch}}</h1>
            <h1 class="header_under">Full Stack Developer <span class="sep">&#183;</span> <span class="second">Partner at Naughton &amp; Ross</span></h1>
        </div>
    </div>
</div>
<div class="pure-g">
    <div class="pure-u-1 pure-u-lg-16-24 blog">
        @foreach ($blog_posts as $post)
        <div class="pure-u-1 blog-item">
            <div class="l-box">
                <p class="timeago">{{$post->human_time}}</p>
                <h1><a href="{{$post->article_url}}">{{$post->article_headline}}</a></h1>
                <p>{{$post->article_catch}}</p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="pure-u-1 pure-u-lg-8-24">
        <div class="l-box">
            <p>I have interests in a number of publically-listed Australian companies, and I like to keep track of them here for everyone’s perusal.</p>
            <p>So here's my performance on the ASX in the past month or so.</p>
            <script>
            $(function () {
                $('#CIVchart').highcharts({
                    chart: {
                        type: 'spline'
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
                            @foreach ($price_data as $dayData)
                            {{$dayData['amount'] /100}},
                            @endforeach
                        ]
                    }]
                });
            });
            </script>
            <div id="CIVchart" style="width:100%; height:100px;"></div>
        </div>
    </div>
</div>
@endsection
