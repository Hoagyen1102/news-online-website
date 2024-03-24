<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'Admin';
    protected $primaryKey = '_id';
    public $timestamps = false;
    protected $fillable=[
        '_id',
        'Email',
        'Password',
        'Fullname',
        'Image',
        'PhoneNumber'
    ];
}
