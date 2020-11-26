<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    protected $fillable = ['user_id', 'goods', 'purchase_number', 'price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
