<?php

namespace App\Http\Controllers;

use App\Models\comment;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CommentController extends Controller
{
    public function store(Request $request){
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Asia/Jakarta'));

        DB::table('comments')->insert([
            'posting'=>$request->id,
            'nama'=>$request->nama,
            'email'=>$request->email,
            'komentar'=>$request->komentar,
            'created_at_date'=>$date->format('Y-m-d'),
            'created_at_time'=>$date->format('H:i'),
        ]);

        return redirect('post/'.$request->id)->with('success', 'Komentar berhasil ditambahkan');
    }
}