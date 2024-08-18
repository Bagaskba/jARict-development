<?php

namespace App\Http\Controllers;

use App\Models\Batik;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $pageTitle = 'Dashboard';
        $batiks = Batik::all();

        return view('dashboard.index', compact('pageTitle', 'batiks'));
    }

    public function edit(Request $request, $uuid)
    {
        $pageTitle = 'Kelola Batik';
        $batiks = Batik::where('uuid', $uuid)->first();
        $categories = Category::all();

        return view('dashboard.edit', compact('pageTitle', 'batiks', 'categories'));
    }
    public function update(Request $request, $uuid)
    {
        $batik = Batik::where('uuid', $uuid)->first();

        $request->validate([
            'name' => 'required',
            'uuid_category' => 'required',
            'product_url' => 'required',
            'catalog_picture' => 'nullable|mimes:svg,png,jpg,jpeg|max:5000',
            'motive_picture' => 'nullable|mimes:svg,png,jpg,jpeg|max:5000',
        ]);

        $batikData = [
            'name' => $request->input('name'),
            'uuid_category' => $request->input('uuid_category'),
            'product_url' => $request->input('product_url'),
        ];

        if ($request->hasFile('catalog_picture')) {
            $catalogImage = $request->file('catalog_picture');
            $catalogFilename = date('Y-m-d') . $catalogImage->getClientOriginalName();
            $catalogPath = '/catalog_picture/' . $catalogFilename;

            if ($batik->catalog_picture) {
                Storage::disk('public')->delete('/catalog_picture/' . $batik->catalog_picture);
            }

            Storage::disk('public')->put($catalogPath, file_get_contents($catalogImage));

            $batikData['catalog_picture'] = $catalogFilename;
        }

        if ($request->hasFile('motive_picture')) {
            $motiveImage = $request->file('motive_picture');
            $motiveFilename = date('Y-m-d') . $motiveImage->getClientOriginalName();
            $motivePath = '/motive_picture/' . $motiveFilename;

            if ($batik->motive_picture) {
                Storage::disk('public')->delete('/motive_picture/' . $batik->motive_picture);
            }

            Storage::disk('public')->put($motivePath, file_get_contents($motiveImage));

            $batikData['motive_picture'] = $motiveFilename;
        }

        $batik->update($batikData);

        return redirect()->route('dashboard')->with('update', 'Data batik berhasil diUPDATE');
    }
    public function delete(Request $request, $uuid)
    {
        $batik = Batik::where('uuid', $uuid)->first();

        if ($batik) {
            if ($batik->catalog_picture) {
                Storage::disk('public')->delete('catalog_picture/' . $batik->catalog_picture);
            }
            if ($batik->motive_picture) {
                Storage::disk('public')->delete('motive_picture/' . $batik->motive_picture);
            }

            $batik->delete();
        }

        return redirect()->route('dashboard')->with('delete', 'Data batik berhasil DIHAPUS');
    }
    public function add()
    {
        $pageTitle = 'Kelola Batik';
        $categories = Category::all();

        return view('dashboard.add', compact('pageTitle', 'categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'uuid_category' => 'required',
            'product_url' => 'required',
            'catalog_picture' => 'required|mimes:svg,png,jpg,jpeg|max:5000',
            'motive_picture' => 'required|mimes:svg,png,jpg,jpeg|max:5000',
        ]);

        $user = Auth::user();

        $uuid = Str::uuid()->toString();
        $batikData = [
            'uuid_user' => $user->uuid,
            'uuid' => $uuid,
            'name' => $request->input('name'),
            'uuid_category' => $request->input('uuid_category'),
            'product_url' => $request->input('product_url'),
        ];

        $catalogImage = $request->file('catalog_picture');
        $catalogFilename = date('Y-m-d') . $catalogImage->getClientOriginalName();
        $catalogPath = '/catalog_picture/' . $catalogFilename;

        Storage::disk('public')->put($catalogPath, file_get_contents($catalogImage));

        $motiveImage = $request->file('motive_picture');
        $motiveFilename = date('Y-m-d') . $motiveImage->getClientOriginalName();
        $motivePath = '/motive_picture/' . $motiveFilename;

        Storage::disk('public')->put($motivePath, file_get_contents($motiveImage));

        $batikData['catalog_picture'] = $catalogFilename;
        $batikData['motive_picture'] = $motiveFilename;

        Batik::create($batikData);

        return redirect()->route('dashboard')->with('store', 'Data batik berhasil ditambahkan');
    }

    public function profile()
    {
        $pageTitle = 'Edit Profil';
        $batiks = Batik::all();
        $categories = Category::all();
        

        return view('dashboard.profile', compact('pageTitle', 'batiks', 'categories'));
    }
    public function profileDetail()
    {
        $pageTitle = 'Edit Profil';
        return view('dashboard.profileDetail', compact('pageTitle'));
    }
    public function profileUpdate(Request $request, $uuid)
    {
        $user = User::where('uuid', $uuid)->first();

        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:5000',
        ]);

        $userData = [
            'username' => $request->username,
            'email' => $request->email,
            'store_name' => $request->store_name,
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

        return redirect()->route('dashboard.profile')->with('updateAccSuccess', 'Akun berhasil diupdate');
    }
}
