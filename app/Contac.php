<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contac extends Model
{
    protected $fillable = ['name','email','state','city'];
    protected $table= 'contacts';
}
