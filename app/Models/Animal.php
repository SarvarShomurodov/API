<?php

namespace App\Models;

use App\Events\AnimalCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Animal extends Model
{
    use HasFactory;

    protected $dispatchesEvents = [
        'created' => AnimalCreated::class
    ];

    protected $table = "animals";

    protected $fillable = ['type','name','desc'];
}
