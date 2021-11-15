<?php

namespace App\Http\Controllers;

use App\Models\posting;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostingController extends Controller
{
    public function index(){
        $data = DB::table('postings');
        return view('home', compact('data'));
    }

    public function create(){
        return view('posting.create');
    }
    
    public function store(Request $request){
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Asia/Jakarta'));

        DB::table('postings')->insert([
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            'gambar'=>$request->gambar,
            'created_at_date'=>$date->format('d-m-Y'),
            'created_at_time'=>$date->format('H:i:s'),
        ]);

        return redirect()->route('posting.index')->with('success', 'Posting berhasil ditambahkan');
    }

    public function show($id){
        $data = DB::table('postings')->where('id', $id)->get();
        return view('posting.show', compact('data'));
    }

    public function edit($id){
        $data = DB::table('posting')->where('id', $id)->first();
        return view('posting.edit', compact('data'));
    }
    
    public function update(Request $request){
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Asia/Jakarta'));

        DB::table('posting')->where('id', $request->id)->update([
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            'gambar'=>$request->gambar,
            'updated_at_date'=>$date->format('d-m-Y'),
            'updated_at_time'=>$date->format('H:i:s'),
        ]);
        return view('posting.edit', compact('data'));
    }
    
    public function delete($id){
        DB::table('postings')->where('id', $id)->delete();
        return redirect()->route('posting.index')->with('success', 'Posting berhasil dihapus');
    }
}
