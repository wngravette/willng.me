<?php $name_catch = '503'; ?>
@extends('wrap')
@section('content')
<div class="pure-g">
    <div class="pure-u-20-24 pure-u-lg-16-24">
        <div class="l-box">
            <p>This is an error page.</p>
            <p>It's a 503 error, which means one of three things has happened.</p>
            <p>Firstly, <b>it's most likely that I'm pushing new code to the site literally as you read this. In that case it'll be back to normal in a few seconds. </b>In any other case, I could have pulled the site offline myself. This occurs approximately once every three days when I accidentally upload graphic obscene images of myself to my blog and then deeply regret putting off developing a 'delete post' feature. Perhaps less ridiculously, I may have done it because the site is down for maintenance.</p>
            <p>The second possibility is that Amazon Web Services, in charge of hosting the computer which this website lives inside of, has in some way neglected to realise that their data centre is on fire, and, in turn, neglected to put it out.</p>
            <p>Thirdly, and I put this last intentionally as it is highly ludicrous and completely unreasonable, because it would mean that more than several people are on this site at once, and we know that's never going to happen. Who the hell do you think I am? In any case,</p>
            <p>Sorry.</p>
        </div>
    </div>
</div>
@endsection
