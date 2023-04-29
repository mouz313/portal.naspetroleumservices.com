<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFiles extends Model
{
    use HasFactory;

    protected $fillable = [
        
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
}
