<?php

namespace App\Models;

use App\Models\Categori;
use App\Models\ProductGallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','users_id','categoris_id','price','deskripsi','slug'];
    protected $hidden = [];

    public function gallery()
    {
        return $this->hasMany(ProductGallery::class,'products_id','id')->where('status','active');        
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class,'products_id','id');        
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','users_id');        
    }
    public function categori()
    {
        return $this->belongsTo(Categori::class,'categoris_id','id');        
    }

}
