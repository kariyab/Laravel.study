<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profile;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'hobby' => 'required',
            'introduction' => 'required',
            ]);
            
            $profile = new Profile();
            $profile->name = $validateData['name'];
            $profile->gender = $validateData['gender'];
            $profile->hobby = $validateData['hobby'];
            $profile->introduction = $validateData['introduction'];
            
            $profile->save();
            return redirect('admin/profile/create');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }
    
    public function update()
    {
        return redirect('admin/profile/edit');
    }
}
