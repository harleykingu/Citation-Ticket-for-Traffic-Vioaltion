<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
      public $table = "violations";

      public function user(){
        return $this->belongsTo('App\User');
      }

      public function scopeSearch_tct($query, $s) {
        return $query->where('tct_no', 'like', '%' .$s. '%');
      }
      public function scopeSearch_dn($query, $s) {
        return $query->where('driver_name', 'like', '%' .$s. '%');
      }
}
