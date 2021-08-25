<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;



class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=News::paginate(10);
        return view('index', compact('news'));
        middleware(['auth'])->name('news');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return view('create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $cad=$news=News::create([
            'title'=>$request->title,
            'text'=>$request->text,
            'user_id'=>$request->user_id,
        ]);
        if($cad){
            return redirect(to:'noticias');
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
        $news=News::find($id);
        return view('show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news=News::find($id);
        $users=User::all();
        return view('create', compact('news', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        News::where(['id'=>$id])->update([
            'title'=>$request->title,
            'text'=>$request->text,
            'user_id'=>$request->user_id
        ]);
        return(redirect(to:'noticias'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=News::destroy($id);
        return($del)?"sim":"não";
    }
}
