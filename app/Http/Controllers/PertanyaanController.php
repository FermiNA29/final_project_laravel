<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Pertanyaan;
use App\Jawaban;
// use App\Models\User;
use App\User;
use App\VoteUnvotePertanyaan;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        // $pertanyaans = Pertanyaan::all();
        $pertanyaans = Pertanyaan::with('users')->get();
        // $pertanyaans = Pertanyaan::with('vote_unvote_pertanyaan')->get();
        // $vote = VoteUnvotePertanyaan::with('pertanyaans')->get();
        $vote = VoteUnvotePertanyaan::selectRaw('pertanyaans_id, sum(poin) as sum_poin')->groupBy('pertanyaans_id')
            ->get();

        // dd($vote);
        // dd($pertanyaans);
        return view('index', compact('pertanyaans', 'vote'));
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

    public function upvote(Request $request)
    {
        // dd($request["pertanyaans_id"]);
        $new_pertanyaan = VoteUnvotePertanyaan::firstOrCreate(
            // ["pertanyaans_id" => $request["pertanyaans_id"]],
            [
                "users_id" => $request["users_id"],
                "pertanyaans_id" => $request["pertanyaans_id"],
                "poin" => 15
            ]
        );

        $users_id = $request->users_id;

        $affectedRows = User::where('id', '=', $users_id)->increment('poin', 10);
        return redirect('/pertanyaans');
    }

    public function downvote(Request $request)
    {
        $new_pertanyaan = VoteUnvotePertanyaan::firstOrCreate(
            [
                "users_id" => $request["users_id"],
                "pertanyaans_id" => $request["pertanyaans_id"],
                "poin" => -10
            ]
        );

        $users_id = $request->users_id;

        $affectedRows = User::where('id', '=', $users_id)->decrement('poin', 1);


        return redirect('/pertanyaans');
    }
}
