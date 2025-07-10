<?php
namespace App\Http\Controllers;
use App\Models\HealthFacility;
use Inertia\Inertia;

class HealthFacilityController extends Controller
{
    public function index()
    {
        return Inertia::render('Public/NearbyFacilities', [
            'facilities' => HealthFacility::all()
        ]);
    }
}
