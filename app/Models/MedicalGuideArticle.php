<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalGuideArticle extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'photo', 'questions', 'medical_guide_submenu_id'];

    public function medicalGuideSubmenu()
    {
        return $this->belongsTo(MedicalGuideSubmenu::class);
    }

    protected $casts = [
        'photo' => 'array', // Menjadikan kolom photo sebagai array
        'questions' => 'array', // Sama untuk kuisioner
    ];
}
