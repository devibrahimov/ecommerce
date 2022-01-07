<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'customer_reviews' ;
    protected $primaryKey = 'cr_id';
    public $incrementing = true;

    protected $guarded = [] ;

    public function customer(){
      return $this->belongsTo('App\Models\Customer' ,'customer_id' ,'id');
    }
}
