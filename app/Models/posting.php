<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posting extends Model
{
    use HasFactory;

    protected $table = 'postings';

    protected $primaryKey = 'id';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'created_at_date',
        'created_at_time',
        'updated_at_date',
        'updated_at_time'
    ];
}
