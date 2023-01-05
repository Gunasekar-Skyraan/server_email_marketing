<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_email',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Email\EmailCategory','category_id','id');
    }
}
