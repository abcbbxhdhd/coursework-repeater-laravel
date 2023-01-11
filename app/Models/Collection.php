<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'collections';

    protected $connection = 'sqlite';

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

}
