<?php

namespace App\Http\Controllers;

use App\Models\comment;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CommentController extends Controller
{
    public function index($id){
        $data = DB::table('comments')->where('posting', $id);
    }

    public function store($id, Request $request){
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Asia/Jakarta'));

        $data = DB::table('comments')->insert([
            'posting'=>$id,
            'komentar'=>$request->komentar,
            'created_at_date'=>$date->format('d-m-Y'),
            'created_at_time'=>$date->format('H:i:s'),
        ]);
    }
}
