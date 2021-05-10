<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ["buisnessName","prefix","firstName","lastName","mobileNumber","alternateNumber","contactType","email","taxNumber","openingBalance","addressLine1","addressLine2","city","state","country","zipcode"];
    protected $hidden = ["created_at","updated_at"];
}
