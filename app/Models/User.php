<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;
use App\Models\Comment;

class User extends Model
{
    use HasFactory;
    protected $table = 'User';
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
    public function comment()
    {
        return $this->hasMany(Comment::class,'User_id','_id');
    }
}
