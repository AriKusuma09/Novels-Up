<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Chapter extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'chapter';
    protected $guarded = ['id'];

    public function novel()
    {
        return $this->belongsTo(Novel::class, 'nov_id','id');
    }
}
