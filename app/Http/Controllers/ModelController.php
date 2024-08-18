<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ModelController extends Controller
{
    public function index(Request $request)
    {
        $filePath = public_path('assets/tshirt/scene.gltf');
        $fileContent = file_get_contents($filePath);

        $modifiedContent = preg_replace('/texture\.jpg/', $request->get('m'), $fileContent);

        $headers = [
            'Content-Type' => 'application/json',
        ];

        return response($modifiedContent, 200, $headers);
    }
    public function bin(Request $request)
    {
        return response()->file(public_path('assets/tshirt/scene.bin'), ['Content-Type' => 'application/octet-stream']);
    }
    public function txt(Request $request, $tex)
    {
        return response()->file(public_path('storage/motive_picture/' . $tex), ['Content-Type' => 'image/jpeg']);
    }
    public function indexDress(Request $request)
    {
        $filePath = public_path('assets/dress/scene.gltf');
        $fileContent = file_get_contents($filePath);

        $modifiedContent = preg_replace('/texture\.jpg/', $request->get('m'), $fileContent);

        $headers = [
            'Content-Type' => 'application/json',
        ];

        return response($modifiedContent, 200, $headers);
    }
    public function binDress(Request $request)
    {
        return response()->file(public_path('assets/dress/scene.bin'), ['Content-Type' => 'application/octet-stream']);
    }
    public function txtDress(Request $request, $tex)
    {
        return response()->file(public_path('storage/motive_picture/' . $tex), ['Content-Type' => 'image/jpeg']);
    }
    public function indexWomen(Request $request)
    {
        $filePath = public_path('assets/vestido_anos_50/scene.gltf');
        $fileContent = file_get_contents($filePath);

        $modifiedContent = preg_replace('/texture\.jpg/', $request->get('m'), $fileContent);

        $headers = [
            'Content-Type' => 'application/json',
        ];

        return response($modifiedContent, 200, $headers);
    }
    public function binWomen(Request $request)
    {
        return response()->file(public_path('assets/vestido_anos_50/scene.bin'), ['Content-Type' => 'application/octet-stream']);
    }
    public function txtWomen(Request $request, $tex)
    {
        return response()->file(public_path('storage/motive_picture/' . $tex), ['Content-Type' => 'image/jpeg']);
    }
}
