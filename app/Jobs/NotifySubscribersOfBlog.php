<?php

namespace App\Jobs;

use Mail;
use App\Article;
use App\Subscriber;
use App\Jobs\Job;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifySubscribersOfBlog extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $article = Article::orderBy('id', 'desc')->first();

        $subscribers = Subscriber::all();

        foreach ($subscribers as $subscriber)
        {
            $mailer->send('email.new-post', ['article' => $article], function ($m) use ($subscriber, $article) {
                $m->to($subscriber->email, null)->subject('New blog post: '.$article->article_headline);
            });
        }
    }
}
