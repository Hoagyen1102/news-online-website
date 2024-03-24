<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NewsDetails;
use App\Models\Category;
use App\Models\Journalist;
use App\Models\Admin;
use App\Models\Status;
use App\Models\Comment;

class News extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'News';
    protected $primaryKey = '_id';
    protected $fillable=[
        '_id',
        'Category_id',
        'Journalist_id',
        'Admin_id',
        'Status_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'Category_id', '_id');
    }
    public function journalist()
    {
        return $this->belongsTo(Journalist::class, 'Journalist_id', '_id');
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'Admin_id', '_id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'Status_id', '_id');
    }
    public function details()
    {
        return $this->hasOne(NewsDetails::class, 'News_id', '_id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class, 'News_id', '_id');
    }
}
