<?php

namespace App\Http\Controllers;

use App\Models\Units;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    public function index()
    {
        $units = Units::orderBy('id', 'desc')->get();
        return view('admin.pages.units.index')->with('units', $units);
    }

    public function create()
    {
        return view('admin.pages.units.create');
    }

    public function edit($id)
    {
        $units = Units::find($id);
        return view('admin.pages.units.edit')->with('units', $units);
    }

    public function store(Request $request)
    {
        $unit = new Units();
        $unit->title = $request->title;
        $unit->description = $request->description;
        $unit->save();

        return redirect()->route('admin.units.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|max:150',
            'description' => 'required',
        ]);

        $unit = Units::find($id);
        $unit->title = $request->title;
        $unit->save();

        return redirect()->route('admin.units.index');
    }

    public function destroy($id)
    {
        $unit = Units::find($id);
        $unit->delete();

        session()->flash('success' , 'Product has deleted successfully !!');
        return redirect()->route('admin.units.index');
    }
}
