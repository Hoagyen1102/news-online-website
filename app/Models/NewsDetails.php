<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class NewsDetails extends Model
{
    use HasFactory;
    protected $table = 'NewsDetails';
    public $timestamps = false;
    protected $primaryKey = '_id';
    protected $fillable=[
        '_id',
        'News_id',
        'Title',
        'Content',
        'Image',
        'Views',
        'created_at',
        'Reply'
    ];
    public function news()
    {
        return $this->belongsTo(News::class, 'News_id', '_id');
    }
    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
}
