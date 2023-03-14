<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Главная страница";
        if (auth()->user() == NULL) {
            return view('static.index');
        }
        else {
            $userId = auth()->user()->id;
            $user = User::find($userId);
            return view('static.index')->with('links', $user->links);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'fullLink' => 'required',
           'shortLink' => 'required'
        ]);
        $status = '';
        $newLink = 'http://127.0.0.1:8000/'.$request->input('shortLink');
        $link = new Link();
        $repeat = DB::table('links')->where('shortLink', '=', $newLink)->get();
        if (count($repeat)>0) {
            return redirect('/')->with('error', 'Такая ссылка уже есть')->withInput();
        }
        else {
            $link->fullLink = $request->input('fullLink');
            $link->shortLink = $newLink;
            $link->user_id = auth()->user()->id;
            $link->save();
            return redirect('/');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = Link::find($id);
        $link->delete();
        return redirect('/');
    }
}
