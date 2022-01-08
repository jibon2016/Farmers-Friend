<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserDocument extends Model
{
    protected $fillable = ['user_id','nid_number', 'nid_img'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
