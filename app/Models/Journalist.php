<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journalist extends Model
{
    use HasFactory;
    protected $table = 'Journalist';
    public $timestamps = false;
    protected $primaryKey = '_id';
    protected $fillable=[
        '_id',
        'Email',
        'Password',
        'Fullname',
        'Image',
        'PhoneNumber'
    ];
    public function news()
    {
        return $this->hasMany(News::class,'News_id','_id');
    }
}
