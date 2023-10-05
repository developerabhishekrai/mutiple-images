<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        return view('image.upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public/images/', $imageName);

            $imageModel = new Image();
            $imageModel->name = $imageName;
            $imageModel->save();

            return redirect()->back()->with('success', 'Image uploaded successfully');
        }

        return redirect()->back()->with('error', 'Failed to upload image');
    }

    public function showImages()
    {
        $images = Image::all();

        return view('image.list', compact('images')); 
    }

    public function delete($id)
    {
        $image = Image::find($id);

        if ($image) {
            Storage::delete('public/images/' . $image->name);

            $image->delete();

            return redirect()->back()->with('success', 'Image deleted successfully');
        }

        return redirect()->back()->with('error', 'Image not found');
    }
}

