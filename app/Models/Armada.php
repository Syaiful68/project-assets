<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Armada extends Model
{
    //
    use SoftDeletes;
    protected $table = 'tb_armadas';
    protected $guarded = ['id'];

    public function vendor()
    {
        return $this->belongsTo(Compenies::class);
    }
}
