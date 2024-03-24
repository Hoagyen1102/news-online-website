<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'Comment';
    protected $primaryKey = '_id';
    public $timestamps = false;
    protected $fillable=[
        '_id',
        'User_id',
        'News_id',
        'Content',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'User_id', '_id');
    }
    public function news()
    {
        return $this->belongsTo(News::class, 'News_id', '_id');
    }
}
