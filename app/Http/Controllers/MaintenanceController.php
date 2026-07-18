<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\MedicalDevice;
use App\Http\Requests\StoreMaintenanceRequest;
use App\Http\Requests\UpdateMaintenanceRequest;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $maintenances = Maintenance::with(['medicalDevice'])
            ->when($search, function ($query, $search) {
                return $query->where('jenis_perawatan', 'like', "%{$search}%")
                    ->orWhere('teknisi', 'like', "%{$search}%")
                    ->orWhereHas('medicalDevice', function ($q) use ($search) {
                        $q->where('nama_alat', 'like', "%{$search}%");
                    });
            })->latest()->paginate(10);

        return view('maintenances.index', compact('maintenances', 'search'));
    }

    public function create()
    {
        $medicalDevices = MedicalDevice::all();
        return view('maintenances.create', compact('medicalDevices'));
    }

    public function store(StoreMaintenanceRequest $request)
    {
        Maintenance::create($request->validated());

        return redirect()->route('maintenances.index')
            ->with('success', 'Data maintenance berhasil ditambahkan.');
    }

    public function show(Maintenance $maintenance)
    {
        $maintenance->load('medicalDevice');
        return view('maintenances.show', compact('maintenance'));
    }

    public function edit(Maintenance $maintenance)
    {
        $medicalDevices = MedicalDevice::all();
        return view('maintenances.edit', compact('maintenance', 'medicalDevices'));
    }

    public function update(UpdateMaintenanceRequest $request, Maintenance $maintenance)
    {
        $maintenance->update($request->validated());

        return redirect()->route('maintenances.index')
            ->with('success', 'Data maintenance berhasil diperbarui.');
    }

    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();

        return redirect()->route('maintenances.index')
            ->with('success', 'Data maintenance berhasil dihapus.');
    }
}