<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;
    protected $fillable = ['title','shop_id', 'description', 'reminder_date', 'recipient_email'];


    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

}
