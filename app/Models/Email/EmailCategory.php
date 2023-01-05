<?php

namespace App\Models\Email;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailCategory extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'category_name',
    ];
}
