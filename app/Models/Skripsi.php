<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    use HasFactory;

    protected $table = "skripsi";
    protected $fillable = 
    [
        'namadosen','tahap','judul','deskripsi','keluhan','file','catatan','status','nama'
    ];
}
