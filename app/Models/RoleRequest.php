<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'license_file',
        'farm_images',
        'descreption', 
        'status'
    ];
    protected $casts = [
        'farm_images' => 'array',
       
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
