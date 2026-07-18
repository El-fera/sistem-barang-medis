<?php

namespace App\Http\Controllers;

use App\Models\MedicalDevice;
use App\Models\Category;
use App\Models\Room;
use App\Http\Requests\StoreMedicalDeviceRequest;
use App\Http\Requests\UpdateMedicalDeviceRequest;
use Illuminate\Http\Request;

class MedicalDeviceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $medicalDevices = MedicalDevice::with(['category', 'room'])
            ->when($search, function ($query, $search) {
                return $query->where('kode_alat', 'like', "%{$search}%")
                    ->orWhere('nama_alat', 'like', "%{$search}%")
                    ->orWhere('merk', 'like', "%{$search}%")
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('nama_kategori', 'like', "%{$search}%");
                    })
                    ->orWhereHas('room', function ($q) use ($search) {
                        $q->where('nama_ruangan', 'like', "%{$search}%");
                    });
            })->latest()->paginate(10);

        return view('medical_devices.index', compact('medicalDevices', 'search'));
    }

    public function create()
    {
        $categories = Category::all();
        $rooms = Room::all();
        return view('medical_devices.create', compact('categories', 'rooms'));
    }

    public function store(StoreMedicalDeviceRequest $request)
    {
        MedicalDevice::create($request->validated());

        return redirect()->route('medical-devices.index')
            ->with('success', 'Alat medis berhasil ditambahkan.');
    }

    public function show(MedicalDevice $medicalDevice)
    {
        $medicalDevice->load(['category', 'room', 'maintenances' => function ($query) {
            $query->latest();
        }]);
        return view('medical_devices.show', compact('medicalDevice'));
    }

    public function edit(MedicalDevice $medicalDevice)
    {
        $categories = Category::all();
        $rooms = Room::all();
        return view('medical_devices.edit', compact('medicalDevice', 'categories', 'rooms'));
    }

    public function update(UpdateMedicalDeviceRequest $request, MedicalDevice $medicalDevice)
    {
        $medicalDevice->update($request->validated());

        return redirect()->route('medical-devices.index')
            ->with('success', 'Alat medis berhasil diperbarui.');
    }

    public function destroy(MedicalDevice $medicalDevice)
    {
        $medicalDevice->delete();

        return redirect()->route('medical-devices.index')
            ->with('success', 'Alat medis berhasil dihapus.');
    }
}