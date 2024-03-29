<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class card extends Model
{
    use HasFactory;

    protected $table = 'cards';
    protected $fillable = [
        'user_id',
        'name',
        'company',
        'title',
        'coordinates',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
