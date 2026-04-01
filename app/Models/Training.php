<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

  protected  $fillable = [
    'name', 
    'description',
    'price',
    'duration',
    'image',
    'is_active',
  ];

  protected $casts = [
       'is_active' => 'boolean',
       'price' => 'decimal:2',
   ];

  public function bookings() {
    return $this->hasMany(Booking::class);
  }

  public function trainers() {
    return $this->belongsToMany(Trainer::class, 'booking_trainer');
  }

}
