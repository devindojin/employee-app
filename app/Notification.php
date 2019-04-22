<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    public function local()
    {
      return $this->hasMany('App\Local');
    }

    public function locals()
    {
      return $this->belongsToMany('App\Local','local_notification','notification_id','local_id');
    }
}
