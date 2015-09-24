<div class="pure-u-1 footer">
    @if ($is_subscribed !== '1')
        <p>You can also give me your email address so I can sell it to advertisers. No, not really, it'll actually just send you an email whenever I make a new blog post.</p>
        <form class="pure-form" method="post" action="/subscriber">
            {!! csrf_field() !!}
            <input type="email" name="email" class="pure-input-1" placeholder="e-mail, then enter"/>
        </form>
    @endif
    <p>You can learn more about me and all of the v cool things I do <a href="about">here</a>, and follow me on shit below:</p>
    <p>
        <a class="no-link" href="https://github.com/wngravette/willng.me"><i class="fa fa-github"></i></a>
        <a class="no-link" href="https://twitter.com/willpsng"><i class="fa fa-twitter"></i></a>
    </p>
</div>
