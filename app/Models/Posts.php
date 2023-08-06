<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table      = "posts";
    protected $guarded    = [];
    public $timestamps    = false;

    public function scopeList($query, $limit, $offset)
    {
        $sql = $query->skip($offset)
                    ->take($limit)
                    ->get();

        return $sql;
    }
}
