<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Notes extends Model
{

    use HasFactory ,Sortable;
    protected $guarded = [];
    const APPROVAL_STATUS = ['pending', 'approved', 'rejected'];

    public $sortable = [
        'id',
        'title',
        'created_at',
        'status',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function author(){
        return $this->belongsTo(User::class,'created_by','id')->select('id','first_name','last_name','email','profile_image');
    }
}
