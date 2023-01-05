<?php

namespace App\Models\Email;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_category_name',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Email\EmailCategory','category_id','id');
    }
}
