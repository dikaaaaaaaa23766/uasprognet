<?php

namespace App\Http\Controllers;

use App\Models\MedicalGuide;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MedicalGuideController extends Controller
{
    public function index()
    {
        $guides = MedicalGuide::with(['submenus.articles'])
                                ->orderBy('title', 'asc')
                                ->get();

        return Inertia::render('Public/MedicalGuide', [
            'guides' => $guides,
        ]);
    }
}