<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    //
    use SoftDeletes;
    protected $table = 'tb_assets';
    protected $guarded = ['id'];

    public function office()
    {
        return $this->belongsTo(office::class, 'location', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
