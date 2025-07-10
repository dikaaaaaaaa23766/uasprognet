<?php

// app/Models/MedicalGuideSubmenu.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalGuideSubmenu extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'medical_guide_id'];

    public function medicalGuide()
    {
        return $this->belongsTo(MedicalGuide::class);
    }

    public function articles()
    {
        return $this->hasMany(MedicalGuideArticle::class);
    }
}
