<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $connection = 'sqlite';
    protected $table = 'requests';
    protected $fillable = ['url, method', 'collection_id'];
    protected $primaryKey = 'id';

    public function headers()
    {
        return $this->hasMany(Header::class);
    }

    public function data()
    {
        return $this->hasMany(Data::class);
    }

    public function cookies()
    {
        return $this->hasMany(Cookie::class);
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'collection_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($request) {
            $request->headers()->delete();
            $request->cookies()->delete();
            $request->data()->delete();
        });
    }
}

