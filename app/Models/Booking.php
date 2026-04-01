<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'training_id',
        'trainer_id', 
        'booking_datetime',
        'status',
        'payment_status',
        'amount',
    ];

    protected $casts = [
        'booking_datetime' => 'datetime',
        'amount' => 'decimal:2',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function trainings() {
        return $this->belongsTo(Training::class);
    }

    public function trainers() {
        return $this->belongsTo(Trainer::class);
    }

    public function payment() {
        return $this->hasOne(Payment::class);
    }


    public function scopeConfirmed($query) {
        return $query->where('status', 'confirmed');
    }

    public function scopePaid($query) {
        return $query->where('payment_status',  'paid');
    }
}