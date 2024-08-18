<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class SuperAdminController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view("superadmin.index", compact('users'));
    }
    public function controlUser()
    {
        $users = User::all();

        return view("superadmin.controlUser", compact('users'));
    }
    public function edit(Request $request, $uuid)
    {
        $users = User::where('uuid', $uuid)->first();

        return view('superadmin.edit', compact('users'));
    }
    public function update(Request $request, $uuid)
    {
        $user = User::where('uuid', $uuid)->first();

        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'role' => 'required|in:1,2',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:5000',
        ]);

        $userData = [
            'username' => $request->username,
            'email' => $request->email,
            'store_name' => $request->store_name,
            'role' => $request->role,
        ];

        if ($request->password) {
            $userData['password'] = bcrypt($request->input('password'));
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $path = '/profile/' . $filename;

            if ($user->image) {
                Storage::disk('public')->delete('/profile/' . $user->image);
            }

            Storage::disk('public')->put($path, file_get_contents($image));

            $userData['image'] = $filename;
        }

        $user->update($userData);

        return redirect()->route('superadmin.controlUser')->with('updateSuccess', 'Akun berhasil diupdate');
    }


    public function create()
    {

        return view('superadmin.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required|in:1,2',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:5000',
        ]);

        $userAttributes = [
            'uuid' => Str::uuid()->toString(),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'store_name' => $request->input('store_name'),
            'role' => $request->input('role'),
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $path = '/profile/' . $filename;

            Storage::disk('public')->put($path, file_get_contents($image));

            $userAttributes['image'] = $filename;
        }

        User::create($userAttributes);

        return redirect()->route('superadmin.controlUser')->with('storeSuccess', 'Akun berhasil ditambahkan');
    }


    public function delete(Request $request, $uuid)
    {
        $user = User::where('uuid', $uuid)->first();

        if ($user) {
            if ($user->image) {
                Storage::disk('public')->delete('profile/' . $user->image);
            }

            $user->delete();
        }

        return redirect()->route('superadmin.controlUser')->with('deleteSuccess', 'Akun berhasil DIHAPUS');
    }
    public function search(Request $request)
    {
        $searchQuery = $request->query('search');

        $usersQuery = User::query();

        if ($searchQuery) {
            $usersQuery->where('username', 'LIKE', '%' . $searchQuery . '%')
                ->orWhere('email', 'LIKE', '%' . $searchQuery . '%')
                ->orWhere('store_name', 'LIKE', '%' . $searchQuery . '%');
        }

        $users = $usersQuery->orderBy('created_at', 'desc')->paginate(10);

        return view('superadmin.controlUser', compact('users'));
    }
    public function category()
    { {
            $category = Category::all();

            return view("superadmin.category", compact('category'));
        }
    }
    public function createCategory()
    {

        return view('superadmin.createCategory');
    }
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category = Category::create([
            'uuid' => Str::uuid()->toString(),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('superadmin.category')->with('categoryStoreSucces', 'Kategori berhasil ditambahkan');
    }
    public function editCategory(Request $request, $uuid)
    {
        $category = Category::where('uuid', $uuid)->first();

        return view('superadmin.editCategory', compact('category'));
    }
    public function updateCategory(Request $request, $uuid)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category['name']           = $request->name;
        $category['description']    = $request->description;

        Category::where('uuid', $uuid)->update($category);

        return redirect()->route('superadmin.category')->with('categoryUpdateSucces', 'Kategori berhasil diupdate');
    }
    public function deleteCategory(Request $request, $uuid)
    {
        $category = Category::where('uuid', $uuid)->first();

        if ($category) {
            $category->delete();
        }

        return redirect()->route('superadmin.category')->with('categoryDeleteSucces', 'Kategori berhasil DIHAPUS');
    }
    public function searchCategory(Request $request)
    {
        $search = $request->input('search');

        $category = Category::where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('description', 'LIKE', '%' . $search . '%')
            ->get();

        return view('superadmin.category', compact('category'));
    }




    /**
     * Display the specified user.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
}
