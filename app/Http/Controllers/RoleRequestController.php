<?php

namespace App\Http\Controllers;

use App\Models\RoleRequest;
use Illuminate\Http\Request;

class RoleRequestController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'license_file' => 'required', 
            'farm_images.*' => 'image|mimes:jpg,png,jpeg|max:2048', 
            'descreption' => 'required|string|min:10|max:500', 
        ]);


        $path=$request->file('license_file')->store('licenses');
        $farmImages = [];
        if ($request->hasFile('farm_images')) {
            foreach ($request->file('farm_images') as $image) {
                $farmImages[] = $image->store('farm_images');
            }
        }

        $roleRequest = RoleRequest::created([
            'user_id'=>auth()->id(),
            'license_file'=>$path,
            'farm_images'=>$farmImages,
            'descreption' => $request->descreption,
            'satatus'=>'pending'



        ]);

        return response()->json([
            'message'=>'request submited successfully',
        ]);
    }
    

    
}
