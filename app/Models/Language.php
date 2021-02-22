<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Language extends Authenticatable
{
    use Notifiable;

    protected $table = 'languages';

    protected $fillable = [
        'abbr', 'locale','name','direction','active'
    ];

    public function scopeActive($query){
        return $query -> where('active',1);
    }

    public function  scopeSelection($query){

        return $query -> select('id','abbr', 'name', 'direction', 'active');
    }


    public function getActive(){
      return   $this -> active == 1 ? 'مفعل'  : 'غير مفعل';
    }
}
