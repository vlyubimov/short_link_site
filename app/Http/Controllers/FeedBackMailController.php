<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\User\FeedBackMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedBackMailController extends Controller
{
    public function sendFeedBack(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'text' => 'required'
        ]);
        Mail::to('lyubimov1998@gmail.com')->send(new FeedBackMail($request->input('name'), $request->input('email'), $request->input('text')));
    }

}
