<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class Category extends Model
{
    use HasFactory;
    protected $table = 'Category';
    public $timestamps = false;
    protected $primaryKey = '_id';
    protected $fillable=[
        '_id',
        'Name'
    ];
    public function news()
    {
        return $this->hasMany(News::class,'Category_id','_id');
    }
}
