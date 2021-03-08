<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastName',
        'company',
        'linkedin',
        'formation',
        'contactPoint',
        'dateFirstContact',
        'cell',
        'telephone',
        'email',
        'emailSecondary',
        'city',
        'state',
        'country',
    ];
}
