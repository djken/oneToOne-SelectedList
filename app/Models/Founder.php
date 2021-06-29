<?php

namespace App\Models;

use App\Models\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Founder extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname', 'lastname', 'email'
    ];
    
    
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
