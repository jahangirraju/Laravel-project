<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use Illuminate\Http\Request;

class ShelfsController extends Controller
{
    public function index()
    {
        $shelfs = Sell::orderBy('id', 'desc')->get();
        return view('admin.pages.shelfs.index')->with('shelfs', $shelfs);
    }

    public function create()
    {
        return view('admin.pages.shelfs.create');
    }

    public function edit($id)
    {
        $shelfs = Sell::find($id);
        return view('admin.pages.shelfs.edit')->with('shelfs', $shelfs);
    }

    public function store(Request $request)
    {
        $shelfs = new Sell();
        $shelfs->title = $request->title;
        $shelfs->description = $request->description;
        $shelfs->save();

        return redirect()->route('admin.shelfs.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|max:150',
            'description' => 'required',
        ]);

        $shelfs = Sell::find($id);
        $shelfs->title = $request->title;
        $shelfs->save();

        return redirect()->route('admin.shelfs.index');
    }

    public function destroy($id)
    {
        $shelfs = Sell::find($id);
        $shelfs->delete();

        session()->flash('success', 'Product has deleted successfully !!');
        return redirect()->route('admin.shelfs.index');
    }
}
