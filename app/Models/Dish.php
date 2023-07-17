<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable=['dish_name','category_id','dish_detail','dish_image','dish_status'];
    protected $primaryKey='dish_id';
    use HasFactory;
}
