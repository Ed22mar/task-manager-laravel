<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;


class Task extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];
}
