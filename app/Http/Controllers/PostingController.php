<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\posting;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostingController extends Controller
{
    public function home(){
        $data = DB::table('postings')->get();
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
            'created_at_date'=>$date->format('Y-m-d'),
            'created_at_time'=>$date->format('H:i'),
        ]);

        return redirect()->route('posting.index')->with('success', 'Posting berhasil ditambahkan');
    }

    public function showPost($id){
        $data = posting::find($id);
        $comment = DB::table('comments')->where('posting', $id)->get();
        return view('show', compact('data', 'comment'));
    }

    public function show($id){
        $data = DB::table('postings')->where('id', $id)->get();
        return view('posting.show', compact('data'));
    }

    public function edit($id){
        $data = DB::table('postings')->where('id', $id)->first();
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
        DB::table('postings')->where('id', $id)->delete();
        return redirect()->route('posting.index')->with('success', 'Posting berhasil dihapus');
    }
}
