<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{    
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'birth_date', 'cpf', 'cellphone', 'telephone', 'profile_pic'];
}