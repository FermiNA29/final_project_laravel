<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use App\Jawaban;
// use App\User;
use App\Models\User;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pertanyaans = Pertanyaan::all();
        $pertanyaans = Pertanyaan::with('users')->get();
        // $pertanyaans = DB::table('articles')
        // ->select('articles.id as articles_id', ..... )
        // ->join('categories', 'articles.categories_id', '=', 'categories.id')
        // ->join('users', 'articles.user_id', '=', 'user.id')

        // ->get()
        // dd($pertanyaans);
        return view('index', compact('pertanyaans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pertanyaan.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pertanyaan = Pertanyaan::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tags' => $request->tags,
            'users_id' => $request->users_id
        ]);
        return redirect('/pertanyaans');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jawabans = Jawaban::where('pertanyaan_id', $id)->get();
        $pertanyaan = Pertanyaan::where('id', $id)->first();
        return view('pertanyaan.show', compact('pertanyaan', 'jawabans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaan = Pertanyaan::where('id', $id)->first();
        return view('pertanyaan.edit', compact('pertanyaan'));
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
        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->judul = $request->judul;
        $pertanyaan->isi = $request->isi;
        $pertanyaan->tags = $request->tags;
        $pertanyaan->save();
        return redirect('/pertanyaans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->delete();
        return redirect('/pertanyaans');
    }
}
