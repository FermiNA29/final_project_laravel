<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jawaban;
use App\Pertanyaan;
use App\User;
use App\VoteUnvoteJawaban;
use Illuminate\Support\Facades\DB;

class JawabanController extends Controller
{
    public function index($id)
    {
        // $jawabans = Jawaban::where('pertanyaan_id', $id)->get();
        $jawabans = Jawaban::with('users')->where('pertanyaan_id', $id)->get();

        // $pertanyaan = Pertanyaan::where('id', $id)->first();

        $pertanyaan = Pertanyaan::with('users')->where('id', $id)->first();

        $vote = VoteUnvoteJawaban::selectRaw('jawabans_id, sum(poin) as sum_poin')->groupBy('jawabans_id')
            ->get();
        // dd($vote);
        return view('jawaban.index', compact('pertanyaan', 'jawabans', 'vote'));
    }

    public function create(Request $request)
    {
        // dd($request);
        $jawaban = Jawaban::create([
            'isi' => $request->isi,
            'pertanyaan_id' => $request->pertanyaan_id,
            'users_id' => $request->users_id
        ]);

        return redirect('/jawabans/' . $request->pertanyaan_id);
    }

    public function destroy($id, $idPertanyaan)
    {
        $jawaban = Jawaban::find($id);
        $jawaban->delete();
        return redirect('/jawabans/' . $idPertanyaan);
    }

    public function edit($id)
    {
        $jawaban = Jawaban::where('id', $id)->first();
        return view('jawaban.edit', compact('jawaban'));
    }

    public function update(Request $request, $id)
    {
        $jawaban = Jawaban::find($id);
        $jawaban->isi = $request->isi;
        $jawaban->save();
        return redirect('/jawabans/' . $request->pertanyaan_id);
    }


    public function upvote(Request $request)
    {
        // dd($request["pertanyaans_id"]);
        $new_pertanyaan = VoteUnvoteJawaban::firstOrCreate(
            // ["pertanyaans_id" => $request["pertanyaans_id"]],
            [
                "users_id" => $request["users_id"],
                "jawabans_id" => $request["jawabans_id"],
                "poin" => 15
            ]
        );

        $users_id = $request->users_id;
        $pertanyaans_id = $request->pertanyaans_id;

        $affectedRows = User::where('id', '=', $users_id)->increment('poin', 10);
        return redirect('/jawabans/' . $pertanyaans_id);
    }

    public function downvote(Request $request)
    {
        $new_pertanyaan = VoteUnvoteJawaban::firstOrCreate(
            [
                "users_id" => $request["users_id"],
                "jawabans_id" => $request["jawabans_id"],
                "poin" => -10
            ]
        );

        $users_id = $request->users_id;
        $pertanyaans_id = $request->pertanyaans_id;

        $affectedRows = User::where('id', '=', $users_id)->decrement('poin', 1);

        return redirect('/jawabans/' . $pertanyaans_id);
    }
}
