<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDonation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'donation_id',
    ];
    //With Donation Model
    public function donation() 
    {
        return $this->belongsTo(Donation::class);
    }

    //With User Model
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    //With PaymentDetails Model
    public function paymenydetails() 
    {
        return $this->belongsTo(PaymentDetails::class);
    }
}
