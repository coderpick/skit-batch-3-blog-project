<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request,[
            'email' =>'required|email|unique:subscribers'
        ]);

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();
        notify()->success('You Successfully added to our subscriber list');
        return redirect()->back();
    }
}
