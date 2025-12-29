<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Direction;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DirectionController extends Controller
{
    public function index()
    {
        $directions = Direction::latest()->paginate(10);
        return view('admin.directions.index', compact('directions'));
    }

    public function create()
    {
        $languages = Language::where('is_active', true)->get();
        return view('admin.directions.create', compact('languages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:directions,slug',
            'image_url' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('image_url', '_token');

        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('directions', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        Direction::create($data);

        return redirect()->route('admin.directions.index')->with('success', 'Багыт ийгиликтүү кошулду');
    }

    public function edit(Direction $direction)
    {
        $languages = Language::where('is_active', true)->get();
        return view('admin.directions.edit', compact('direction', 'languages'));
    }

    public function update(Request $request, Direction $direction)
    {
        $request->validate([
            'slug' => 'required|unique:directions,slug,' . $direction->id,
            'image_url' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('image_url', '_token', '_method');

        if ($request->hasFile('image_url')) {
            if ($direction->image_url) {
                $oldPath = str_replace('/storage/', '', $direction->image_url);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('image_url')->store('directions', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        $direction->update($data);

        return redirect()->route('admin.directions.index')->with('success', 'Багыт жаңыланды');
    }

    public function destroy(Direction $direction)
    {
        if ($direction->image_url) {
            $oldPath = str_replace('/storage/', '', $direction->image_url);
            Storage::disk('public')->delete($oldPath);
        }

        $direction->delete();

        return redirect()->route('admin.directions.index')->with('success', 'Багыт өчүрүлдү');
    }
}
