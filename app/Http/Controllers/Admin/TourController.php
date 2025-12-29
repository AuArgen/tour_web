<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Direction;
use App\Models\Language;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = Tour::with('direction')->latest()->paginate(10);
        return view('admin.tours.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $directions = Direction::all();
        $languages = Language::where('is_active', true)->get();
        return view('admin.tours.create', compact('directions', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Валидация (жөнөкөйлөтүлгөн)
        $request->validate([
            'direction_id' => 'required|exists:directions,id',
            'slug' => 'required|unique:tours,slug',
            'price' => 'required|numeric',
            'hero_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('hero_image', '_token');

        // Сүрөт жүктөө
        if ($request->hasFile('hero_image')) {
            $path = $request->file('hero_image')->store('tours', 'public');
            $data['hero_image'] = '/storage/' . $path;
        }

        // JSON талааларды туура сактоо (Laravel casts муну автоматтык түрдө кылат,
        // бирок формадан келген массивди түз эле беребиз)

        Tour::create($data);

        return redirect()->route('admin.tours.index')->with('success', 'Тур ийгиликтүү кошулду');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        $directions = Direction::all();
        $languages = Language::where('is_active', true)->get();
        return view('admin.tours.edit', compact('tour', 'directions', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour)
    {
        $request->validate([
            'direction_id' => 'required|exists:directions,id',
            'slug' => 'required|unique:tours,slug,' . $tour->id,
            'price' => 'required|numeric',
            'hero_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('hero_image', '_token', '_method');

        if ($request->hasFile('hero_image')) {
            // Эски сүрөттү өчүрүү (кааласаңыз)
            if ($tour->hero_image) {
                $oldPath = str_replace('/storage/', '', $tour->hero_image);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('hero_image')->store('tours', 'public');
            $data['hero_image'] = '/storage/' . $path;
        }

        $tour->update($data);

        return redirect()->route('admin.tours.index')->with('success', 'Тур жаңыланды');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        if ($tour->hero_image) {
            $oldPath = str_replace('/storage/', '', $tour->hero_image);
            Storage::disk('public')->delete($oldPath);
        }

        $tour->delete();

        return redirect()->route('admin.tours.index')->with('success', 'Тур өчүрүлдү');
    }
}
