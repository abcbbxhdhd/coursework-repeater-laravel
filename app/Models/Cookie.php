<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cookie extends Model
{
    use HasFactory;

    protected $connection = 'sqlite';
    protected $table = 'cookies';
    public $timestamps = false;
    protected $fillable = ['cookie_key', 'cookie_value', 'request_id'];
    protected $primaryKey = 'id';

    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id');
    }
}
