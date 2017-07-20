<?php

namespace DestinyH\Http\Controllers;

use DestinyH\Subscriber;
use Illuminate\Http\Request;
use Validator;

class SubscribeController extends Controller
{
    public function index()
    {
        return view('portal.views.subscribe');
    }
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),
            [
                'subscriber_email'=>'required|email|unique:subscribers',
            ]);
        if($validator->fails())
        {
            $request->session()->flash('no_email', 'no_email');
            return view('portal.views.subscribe');
        }
        try{
            $subscriber = new Subscriber();
            $subscriber -> subscriber_email = $request->subscriber_email;
            $subscriber -> subscriber_token = str_random(50);
            $subscriber -> save();
            $request->session()->flash('subscribed', 'success');
        }
        catch(\Exception $e)
        {
            return response()->view('errors.500');
        }
        return view('portal.views.subscribe');
    }
}
