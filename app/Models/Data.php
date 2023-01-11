<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $connection = 'sqlite';

    protected $table = 'data';
    protected $fillable = ['data_key', 'data_value', 'request_id'];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id');
    }
}
