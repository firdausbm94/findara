<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Mengizinkan semua kolom diisi data (menghindari error Mass Assignment)
    protected $guarded = [];
}