@extends('wrap')
@section('content')
<div class="pure-g header">
    <div class="pure-u-1">
        <div class="l-box">
            <h1>William Naughton-Gravette <span class="title_suppliment">{{$name_catch}}</h1>
            <h1 class="header_under">Full Stack Developer &#183; Partner at Naughton &amp; Ross </h1>
        </div>
    </div>
</div>
<div class="pure-g">
    <div class="pure-u-16-24 blog">
        <div class="pure-u-1 blog-item">
            <div class="l-box">
                <p class="timeago">6 days ago</p>
                <h1>This is a blog post, and this is it's title</h1>
            </div>
        </div>
        <div class="pure-u-1 blog-item">
            <div class="l-box">
                <p class="timeago">18 days ago</p>
                <h1>This is an additional, older blog post, and this is&nbsp;it’s&nbsp;title</h1>
            </div>
        </div>
    </div>
    <div class="pure-u-8-24">
        <div class="l-box">
            <p>I have interests in a number of publically-listed Australian companies, and I like to keep track of them here for everyone’s perusal.</p>
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
                    xAxis: {
    		            categories: ['2015-07-22', '2015-07-23', '2015-07-26', '2015-07-27', '2015-07-28', '2015-07-29', '2015-07-30', '2015-08-02', '2015-08-03', '2015-08-04', '2015-08-05', '2015-08-06', '2015-08-09', '2015-08-10', '2015-08-11', '2015-08-12', '2015-08-13', '2015-08-16', '2015-08-17', '2015-08-18', '2015-08-19', '2015-08-20', '2015-08-23', '2015-08-24', '2015-08-25', '2015-08-26', '2015-08-27', '2015-08-30', '2015-08-31', '2015-09-01'],
                    },
                    yAxis: {
                        title: {
                            text: 'CIV'
                        }
                    },
                    series: [{
                        name: 'CIV',
                        data: [1392,1325,1276,1310,1325,1299,1345,1359,1333,1397,1382,1359,1393,1416,1431,1347,1298,1353,1411,1347,1431,1382,1409,1298,1261,1294,1306,1261,1333,1149]
                    }]
                });
            });
            </script>
            <div id="CIVchart" style="width:100%; height:100px;"></div>
            <p>Here's my performance on the ASX in the past month or so</p>
        </div>
    </div>
</div>
@endsection
