<?php

namespace App\Models\Template;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    
    public function category()
    {
        return $this->belongsTo('App\Models\Template\TemplateCategory','category_id','id');
    }
}
