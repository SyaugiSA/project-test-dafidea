<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\posting;
use App\Models\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostingController extends Controller
{
    public function home(){
        $data = posting::get();
        return view('index', compact('data'));
    }

    public function index(){
        $data = DB::table('postings')->get();
        return view('posting.index', compact('data'));
    }

    public function create(){
        $data = null;
        return view('posting.create', compact('data'));
    }
    
    public function store(Request $request){
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Asia/Jakarta'));

        DB::table('postings')->insert([
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            'gambar'=>$request->gambar,
            'user_id'=>Auth::id(),
            'created_at_date'=>$date->format('Y-m-d'),
            'created_at_time'=>$date->format('H:i'),
        ]);

        return redirect()->route('posting.index')->with('success', 'Posting berhasil ditambahkan');
    }

    public function showPost($id){
        $data = posting::find($id)->first();
        return view('show', compact('data'));
    }

    public function show($id){
        $data = posting::find($id)->first();
        return view('posting.show', compact('data'));
    }

    public function edit($id){
        $data = posting::find($id)->first();
        return view('posting.create', compact('data'));
    }
    
    public function update(Request $request){
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Asia/Jakarta'));

        DB::table('postings')->where('id', $request->id)->update([
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            'gambar'=>$request->gambar,
            'updated_at_date'=>$date->format('Y-m-d'),
            'updated_at_time'=>$date->format('H:i')
        ]);
        return redirect()->route('posting.index')->with('success', 'Posting berhasil diupdate');
    }
    
    public function destroy($id){
        posting::find($id)->delete();
        return redirect()->route('posting.index')->with('success', 'Posting berhasil dihapus');
    }
}
