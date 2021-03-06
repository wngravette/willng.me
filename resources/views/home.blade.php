@extends('wrap')
@section('header_under')
<h1 class="header_under">Full Stack Developer <span class="sep">&#183;</span> <span class="second">Partner at Naughton &amp; Ross</span></h1>
@endsection
@section('content')
<div class="pure-g">
    @if (Session::has('msg'))
    <div class="pure-u-1 pure-u-lg-16-24 msg animated flash">
        <div class="pure-u-1 msg-item">
            <div class="l-box">
                <p class="{{Session::get('msg_type')}}">Ding dong!</p>
                <h1>{{Session::get('msg')}}</h1>
            </div>
        </div>
    </div>
    @endif
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
        <div class="pure-u-1 blog-item">
            <div class="l-box">
                <p>
                    <a href="/archive">See the archive.</a>
                </p>
            </div>
        </div>
    </div>
    <div class="pure-u-1 pure-u-lg-8-24">
        <div class="l-box">
            <p>I'm a 19 year-old moron and socialite from Melbourne. Here's some data:</p>
            <p>I have interests in a number of publically-listed Australian companies, and I like to keep track of them here for everyone’s perusal.</p>
            <p>So, here's my performance on the ASX in the past month or so. New data is published at 5 pm on weekdays.</p>
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
            <p>I also have a an extremely wonderful and <a href="api">pointless API</a> which you should feel free to pillage. It' usually pretty snappy, here's it's response time over the past 30 mins.</p>
            <script>
            $(function () {
                $('#APIchart').highcharts({
                    chart: {
                        type: 'spline',
                        spacingLeft: 0,
                    },
                    plotOptions: {
                		series: {
                			nullColor: '#444444',
                			color: {
                                linearGradient: {
                                    x1: 0,
                                    y1: 0,
                                    x2: 0,
                                    y2: 1
                                },
                                stops: [
                                    [0, '#e74c3c'],
                                    [0.5, '#6498f1'],
                                    [1, '#2ecc71']
                                ]
                            },
                        },
                    },
                    tooltip: {
                        enabled: true,
                        formatter: function() {
                           return this.series.name + ': ' + this.y + ' ms';
                       }
                    },
                    title: {
                        text: ''
                    },
                    // xAxis: {
    		        //     categories: ['2015-07-22', '2015-07-23', '2015-07-26', '2015-07-27', '2015-07-28', '2015-07-29', '2015-07-30', '2015-08-02', '2015-08-03', '2015-08-04', '2015-08-05', '2015-08-06', '2015-08-09', '2015-08-10', '2015-08-11', '2015-08-12', '2015-08-13', '2015-08-16', '2015-08-17', '2015-08-18', '2015-08-19', '2015-08-20', '2015-08-23', '2015-08-24', '2015-08-25', '2015-08-26', '2015-08-27', '2015-08-30', '2015-08-31', '2015-09-01'],
                    // },
                    yAxis: {
                        title: {
                            text: 'API request time'
                        },
                        labels: {
                            enabled: true,
                            format: '{value} ms'
                        },
                        floor: 0,
                    },
                    xAxis: {
                        reversed: true,
                    },
                    series: [{
                        name: 'API request time',
                        data: [
                            @foreach ($api_speed as $apiData)
                            {{$apiData['speed_ms']}},
                            @endforeach
                        ]
                    }]
                });
            });
            </script>
            <div id="APIchart" style="width:100%; height:100px;"></div>
             @include('footer')
        </div>
    </div>
</div>
@endsection
