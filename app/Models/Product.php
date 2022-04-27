<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
   public function setNameAttribute($name)
   {
       $this->attributes['name']=strtoupper($name);
   }
   
   
   public function getCategoryAttribute($category)
   {
       return ucfirst($category);
   }
}
