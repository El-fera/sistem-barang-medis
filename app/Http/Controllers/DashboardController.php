<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Room;
use App\Models\MedicalDevice;
use App\Models\Maintenance;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCategories = Category::count();
        $totalRooms = Room::count();
        $totalMedicalDevices = MedicalDevice::count();
        $totalMaintenances = Maintenance::count();

        return view('dashboard', compact(
            'totalCategories',
            'totalRooms',
            'totalMedicalDevices',
            'totalMaintenances'
        ));
    }
}