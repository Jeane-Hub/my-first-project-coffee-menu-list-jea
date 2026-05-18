<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    // Display in Home Page
    public function index() {
        $all_menus = Menu::all();
        $best_sellers = Menu::where('category', 'Best Seller')->get(); 
        $classic_menus = Menu::where('category', 'Classic')->get();

        return view('home', compact('all_menus', 'best_sellers', 'classic_menus'));
    }

    // Manage Record
    public function adminIndex(\Illuminate\Http\Request $request) {
        // Check Role
        if (!session('user') || session('user')->role !== 'Admin') {
            return redirect()->route('login')->with('error', 'Unauthorized access!');
        }

        //Find admin input in search bar
        $search = $request->input('search');
        $menus = Menu::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('category', 'like', "%{$search}%");
        })->get();

        return view('manage_record', compact('menus', 'search'));
    }

    // Store Record
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = [
            'user_id' => session('user')->id,
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description ?? 'No description', 
            'is_best_seller' => $request->category == 'Best Seller' ? 1 : 0, 
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images/menu_image'), $imageName);
            
            $data['image'] = $imageName; 
        } else {
            $data['image'] = 'default.png'; 
        }

        Menu::create($data);

        return redirect()->back()->with('success', 'New coffee added successfully!');
    }

    // Delete Record
    public function destroy($id)
    {
        $item = Menu::findOrFail($id);
        $item->delete();

        return back()->with('success', 'Item deleted successfully!');
    }

    // Update Record
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $item = Menu::findOrFail($id);

        $data = $request->only(['name', 'category', 'price', 'description']);

        // Image Upload 
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images/menu_image'), $imageName);
            $data['image'] = $imageName;
        }

        // Auto Update in Best Seller
        $data['is_best_seller'] = ($request->category == 'Best Seller') ? 1 : 0;
        
        $item->update($data);

        return back()->with('success', 'Menu updated successfully!');
    }
}