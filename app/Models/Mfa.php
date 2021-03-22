<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mfa extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'hash',
        'isUsed',
    ];
}
