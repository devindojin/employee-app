<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    
    public function locals ()
    {
      return $this->belongsToMany('App\Local','local_notification','notification_id','local_id');
    }
}
