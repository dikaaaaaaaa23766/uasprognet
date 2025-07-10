<?php

// app/Models/MedicalGuide.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalGuide extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function submenus()
    {
        return $this->hasMany(MedicalGuideSubmenu::class);
    }
}