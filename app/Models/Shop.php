<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'facility_id',
        'user_id',
        'test_report',
        'doc_req',
        'reportname',
        'down_nov'
    ];
    public function users()
    {
        $this->hasmany(User::class);
    }
    public function shopfile()
    {
        $this->belongsTo(ShopFile::class , 'shop_id' , 'id');
    }

}
