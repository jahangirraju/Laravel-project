<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.pages.categories.index', compact('categories'));
    }

    public function create()
    {
        $main_category = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        return view('admin.pages.categories.create', compact('main_category'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name'  => 'required',
                'image' => 'nullable | image',
            ],
            [
                'name.reqquired' => 'Pleae give a provider name',
                'image.image' => 'please give valid image with .jpg, .png, .gif, jpeg extension..',
            ]
        );

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;

        if ($request->image)  {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/categories' . $img);

            Image::make($image)->save($location);
            $category->image = $img;
        }
        $category->save();

        session()->flash('success', 'A new category added successfully');
        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $main_category = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        $category = Category::find($id);
        if (!is_null($category)) {
            return view('admin.pages.categories.edit', compact('category', 'main_category'));
        } else {
            return redirect()->route('admin.categories.index');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [

                'name'  => 'required',
                'image' => 'nullable|image',
            ],
            [
                'name.reqquired' => 'Pleae give a provider name',
                'image.image' => 'please give valid image with .jpg, .png, .gif, jpeg extension..',
            ]
        );

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;

        if ($request->image) {
            // Delete the old image from folder

            if (File::exists('images/categories/' . $category->image)) {
                File::delete('images/categories/' . $category->image);
            }
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/categories' . $img);

            Image::make($image)->save($location);
            $category->image = $img;
        }
        $category->save();

        session()->flash('success', 'Category updated successfully');
        return redirect()->route('admin.categories.index');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if (!is_null($category)) {
            // if it is primary category, then all its sub category
            if ($category ->parent_id == NULL) {
                // delete sub category
                $sub_category = Category::orderBy('name', 'desc')->where('parent_id', $category->id)->get();
                foreach ($sub_category as $sub) {
                    if (File::exists('images/categories/' . $sub->image)) {
                        File::delete('images/categories/' . $sub->image);
                    }
                    $sub->delete();
                }
            }

            // delete category image
            if (File::exists('images/categories/' . $category->image)) {
                File::delete('images/categories/' . $category->image);
            }
            $category->delete();
        }
        session()->flash('success', 'Category  has deleted successfully !!');
        return back();
    }
}
