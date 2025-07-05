<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compenies extends Model
{
    //
    use SoftDeletes;
    protected $table = 'tb_compenies';
    protected $guarded = ['id'];
}
