<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Building extends Model
{
    //
    use SoftDeletes;
    protected $table = 'tb_buildings';
    protected $guarded = ['id'];

    public function office()
    {
        return $this->belongsTo(office::class);
    }
}
