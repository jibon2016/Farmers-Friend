<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
  protected $fillable = ['status','offer_no','user_id','product_id','quantity','amount','sub_total','delivery_charge','product_type'];

  public function user(){
    return $this->belongsTo(User::class);
  }

  public function product(){
      return $this->belongsTo(Product::class);
  }
}
