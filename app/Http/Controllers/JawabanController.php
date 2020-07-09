<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jawaban;
use App\Pertanyaan;

class JawabanController extends Controller
{
    public function index($id) {
        $jawabans = Jawaban::where('pertanyaan_id', $id)->get();
        $pertanyaan = Pertanyaan::where('id', $id)->first();
        return view('jawaban.index', compact('pertanyaan', 'jawabans'));
    }

    public function create(Request $request) {
        $jawaban = Jawaban::create([
            'isi' => $request->isi,
            'pertanyaan_id' => $request->pertanyaan_id,
            'users_id' => $request->users_id
        ]);
        
        return redirect('/jawabans/'.$request->pertanyaan_id);
    }

    public function destroy($id)
    {
        $jawaban = Jawaban::find($id);
        $jawaban->delete();
        return redirect('/jawabans/'.$id);
    }

    public function edit($id) {
        $jawaban = Jawaban::where('id', $id)->first();
        return view('jawaban.edit', compact('jawaban'));
    }

    public function update(Request $request, $id)
    {
        $jawaban = Jawaban::find($id);
        $jawaban->isi = $request->isi;
        $jawaban->save();
        return redirect('/jawabans/'. $request->pertanyaan_id);
    }
}