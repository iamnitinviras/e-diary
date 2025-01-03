<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'comments';

    public function blog(){
        return $this->belongsTo(Blogs::class,'blog_id','id');
    }
}
