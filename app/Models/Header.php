<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;
    protected $connection = 'sqlite';
    protected $table = 'headers';
    protected $fillable = ['header_key', 'header_value', 'request_id'];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id');
    }
}

