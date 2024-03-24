<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'Status';
    protected $primaryKey = '_id';
    protected $fillable=[
        '_id',
        'Name'
    ];
    public function news()
    {
        return $this->hasMany(News::class,'News_id','_id');
    }
}
