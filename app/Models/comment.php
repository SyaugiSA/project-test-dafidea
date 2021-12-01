<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $primaryKey = 'id';

    protected $fillable = [
        'posting_id',
        'nama',
        'email',
        'komentar',
        'created_at_date',
        'created_at_time',
    ];

    public function posting(){
        return $this->belongsTo(posting::class);
    }
}
