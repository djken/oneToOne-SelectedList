<?php

namespace App\Models;

use App\Models\Founder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'address', 'phone', 'email', 'founder_id', 'description'
    ];
    
    
    public function founder()
    {
        return $this->belongsTo(Founder::class);
    }
}
