<?php

namespace App\Models\Email;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendEmail extends Model
{
    use HasFactory;

    protected $fillable = [
        'mail_processing',
    ];

    public function template_category()
    {
        return $this->belongsTo('App\Models\Template\TemplateCategory','template_category_id','id');
    }

    public function template()
    {
        return $this->belongsTo('App\Models\Template\Template','template_id','id');
    }

    public function sourcecemail()
    {
        return $this->belongsTo('App\Models\Source\SourceEmail','sender_email','email_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Email\EmailCategory','category_id','id');
    }

    public function get_mapped_cat_count()
    {
        return $this->hasMany('App\Models\Email\BounsedEmail','send_email_id');
    }

    public function list_map()
    {
        return $this->hasMany('App\Models\Email\BounsedEmail','send_email_id');
    }

    public function videos() {
        return $this->get_mapped_cat_count()->where('bounced','=', 2);
    }

    // results in a "problem", se examples below
    public function available_videos() {
        return $this->get_mapped_cat_count()->where('bounced','=', 1);
    }
}
