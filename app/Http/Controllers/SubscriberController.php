<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Input;
use Cookie;
use App\Subscriber;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = Input::all();
        $subscriberEmail = $request->email;

        if (Subscriber::where('email', $request->email)->exists()) {
            return redirect('/')->with(['msg' => 'Your email is already on the list, you flog.', 'msg_type' => 'red']);
        }

        $subscriber = new Subscriber($input);
        $subscriber->save();

        Mail::queue('email.signup', ['email' => $subscriberEmail], function ($m) use ($subscriber) {
            $m->to($subscriber->email, 'Subscriber')->subject('For some reason you just signed up for my blog posts.');
        });

        return redirect('/')->with(['msg' => 'I put your email in the thing.', 'msg_type' => 'green'])->withCookie(cookie()->forever('is_subscribed', '1'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
