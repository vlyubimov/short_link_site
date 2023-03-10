<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;
use Illuminate\Support\Facades\DB;

class StaticController extends Controller
{
    public function index() {
        $title = "Главная страница";
        $allLinks = Link::all();
        return view('static.index')->with('links', $allLinks);
    }
    public function about() {
        $title = "Про нас";
        $data = [
            'title' => "Про нас",
        ];
        return view('static.about')->with('header', $title);
    }

    public function reDirect($newLink) {
        $link = DB::table('links')->where('shortLink', 'http://127.0.0.1:8000/'.$newLink)->value('fullLink');
        return redirect("$link");
    }

    public function contact() {

        return view('static.contact');
    }
}
