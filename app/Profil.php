<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
	protected $fillable = [
        'nomcomplet', 'sexe', 'datenaiss','adresse','telephone','profession','bio','image','user_id',
    ];
    


     public function user()
    {
        return $this->belongsTo('App\User');
    }
}
