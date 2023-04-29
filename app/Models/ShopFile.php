<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopFile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function shops()
    {
        $this->hasmany(Shop::class , 'shop_id' , 'id');
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class);
    }
}
