<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use Attribute;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    
    public function index()
    {
        $attribute = Attributes::orderBy('id', 'desc')->get();
        return view('admin.pages.attribute.index')->with('attributes' , $attribute);
    }

    public function create()
    {
        return view('admin.pages.attribute.create');
    }

    public function store(Request $request)
    {
        $attribute = new Attributes();
        $attribute->title = $request->title;
        $attribute->description = $request->description;
        $attribute->save();

        return back();
    }


    public function edit($id)
    {
        $attributes = Attributes::find($id);
        return view('admin.pages.attribute.edit')->with('attributes', $attributes);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|max:150',
            'description' => 'required',
        ]);

        $attribute = Attributes::find($id);
        $attribute->title = $request->title;
        $attribute->description = $request->description;
        $attribute->save();

        return redirect()->route('admin.attributes.index');
    }

    
    public function destroy($id)
    {
        $attribute = Attributes::find($id);
        $attribute->delete();

        session()->flash('success' , 'Product has deleted successfully !!');

        return redirect()->route('admin.attributes.index');
    }

 
}
