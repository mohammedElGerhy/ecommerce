<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Vendor extends Authenticatable
{
    //use HasFactory;
    use HasFactory, Notifiable;


    protected $table = 'vendors';

    protected $fillable = [
        'latitude', 'longitude', 'name', 'mobile', 'password', 'address', 'email', 'logo', 'category_id', 'active' 
    ];

    protected $hidden = ['category_id', 'password'];
    public function scopeActive($query)
    {

        return $query->where('active', 1);
    }

    public function getLogoAttribute($val)
    {
        return ($val !== null) ? asset('public/assets/' . $val) : "";

    }


    public function scopeSelection($query)
    {
        return $query->select('id', 'category_id','latitude','longitude', 'active', 'name', 'address', 'email', 'logo', 'mobile');
    }


    public function category()
    {

        return $this->belongsTo('App\Models\MainCategory', 'category_id', 'id');
    }

    public function getActive()
    {
        return $this->active == 1 ? 'مفعل' : 'غير مفعل';

    }


    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }
}
