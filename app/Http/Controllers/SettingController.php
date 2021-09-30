<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function account()
    {
        return view('auth.settings.account');
    }

    public function account_image(ImageRequest $data)
    {
        if ($data->has('image')) {
            // Get image file
            $image = $data->file('image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug(Auth::user()->name) . '_' . time();
            $folder = 'storage/image/avatar';

            $image = $image->move($folder, $name . '.' . $image->getClientOriginalExtension());

            Auth::user()->update([
                'image' => $image
            ]);

            session()->flash('toastr', ['type' => 'success', 'title' => __('toastr.title.success'), 'contant' =>  __('toastr.contant.success')]);
        }

        return back();
    }

    public function security()
    {
        return view('auth.settings.security');
    }
}
