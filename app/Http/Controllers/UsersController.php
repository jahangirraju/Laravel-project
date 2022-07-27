<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\User;
use App\Models\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.pages.user.index')->with('akash', $users);
    }

    public function create()
    {
        return view('admin.pages.user.create');
    }

    public function edit($id)
    {
        $user = User::find($id);

        if (empty($user)) {
            abort(404, 'This user not found.');
        }

        return view('admin.pages.user.edit')->with('users', $user);
    }

    public function destroy($id)
    {
        $users = User::find($id);
        if (!is_null($users)) {
            $users->delete();
        }
        session()->flash('success', 'User has deleted successfully !!');
        return back();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|max:150',
            'email'   => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // ProductImage Model insert image

        // if ($request->hasFile('user_image')) {
        //     // insert that image
        //     $image = $request->file('user_image');
        //     $img = time() . '.' . $image->getClientOriginalExtension();
        //     $location = public_path('images/user_image/' . $img);
        //     Image::make($image)->save($location);


        //     $user_image = new UserImage();
        //     $user_image->user_id = $user->id;
        //     $user_image->image = $img;
        //     $user_image->save();
        // }


        return redirect()->route('admin.users.index');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name'    => 'required|max:150',
            'email'   => 'required|email',
            'password' => 'required|min:6',
        ]);




        $user =  User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();


        return redirect()->route('admin.users.index');
    }
}
