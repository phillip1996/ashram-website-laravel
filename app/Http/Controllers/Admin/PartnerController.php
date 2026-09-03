<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->get();
        return Inertia::render('Admin/Partners/Index', ['partners' => $partners]);
    }

    public function create()
    {
        return Inertia::render('Admin/Partners/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',       // 👈 Now optional
            'location' => 'nullable|string|max:255',   // 👈 Now optional
            'website' => 'nullable|url|max:255',
            'is_active' => 'boolean',
            'logo' => 'nullable|file|image|max:2048', // 2MB
        ]);

        $data = $request->only(['name', 'location', 'website', 'is_active']);

        // Store logo
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('partners/logos', 'public');
            $data['logo'] = '/storage/' . $path;
        }

        Partner::create($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partner created.');
    }

    public function edit(Partner $partner)
    {
        return Inertia::render('Admin/Partners/Edit', ['partner' => $partner]);
    }

    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',       // 👈 Now optional
            'location' => 'nullable|string|max:255',   // 👈 Now optional
            'website' => 'nullable|url|max:255',
            'is_active' => 'boolean',
            'logo' => 'nullable|file|image|max:2048',
        ]);

        $data = $request->only(['name', 'location', 'website', 'is_active']);

        // Replace logo
        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($partner->logo) {
                $oldPath = str_replace('/storage/', '', $partner->logo);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('logo')->store('partners/logos', 'public');
            $data['logo'] = '/storage/' . $path;
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partner updated.');
    }

    public function destroy(Partner $partner)
    {
        try {
            // Delete logo file
            if ($partner->logo) {
                $oldPath = str_replace('/storage/', '', $partner->logo);
                Storage::disk('public')->delete($oldPath);
            }

            $partner->delete();

            return redirect()->route('admin.partners.index')->with('success', 'Partner deleted.');
        } catch (\Throwable $e) {
            return redirect()->route('admin.partners.index')->with('error', 'Could not delete partner. Please try again.');
        }
    }
}