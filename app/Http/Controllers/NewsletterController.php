<?php

namespace App\Http\Controllers;
use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function add()
    {
        $subscribe = new Newsletter();
        $subscribe->email=request('email');
        $subscribe->save();
        return redirect()->route('home.index')->with('success','Successfully subscribed to the newsletter!');
    }
}