<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('admin.profile.index', ['user' => $user]);
    }

    public function edit()
    {
        $user = auth()->user();
        return view('admin.profile.edit', ['user' => $user]);
    }

    public function update()
    {
        $user = auth()->user();
        $request = request();
        $input = $request->only('first_name','email', 'last_name', 'phone_number', 'language', 'city', 'state', 'country', 'zip', 'address', 'profile_image');
        $request->validate([
            'first_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'last_name' => ['required', 'string', 'max:50'],
            'phone_number' => ['required', 'string', 'max:20'],
            'profile_image' => ['max:10000', "image", 'mimes:jpeg,png,jpg,gif,svg'],
        ], [
            "first_name.required" => __('validation.required', ['attribute' => 'first name']),
            "first_name.string" => __('validation.custom.invalid', ['attribute' => 'first name']),

            "last_name.required" => __('validation.required', ['attribute' => 'last name']),
            "last_name.string" => __('validation.custom.invalid', ['attribute' => 'last name']),

            "phone_number.required" => __('validation.required', ['attribute' => 'phone number']),
            "phone_number.regex" => __('validation.custom.invalid', ['attribute' => 'phone number']),

            "profile_image.max" => __('validation.gt.file', ['attribute' => 'profile image', 'value' => 10000]),
            "profile_image.image" => __('validation.enum', ['attribute' => 'profile image']),
            "profile_image.mimes" => __('validation.enum', ['attribute' => 'profile image']),

        ]);

        $request->session()->flash('Success', __('system.messages.updated', ['model' => __('system.profile.menu')]));

        $user->fill($input);
        $user->save();
        return redirect(route('admin.profile'));
    }

    public function passwordEdit()
    {
        $user = auth()->user();
        return view('admin.password.edit', ['user' => $user]);
    }

    public function passwordUpdate()
    {
        $user = auth()->user();
        $request = request();

        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!\Hash::check($value, $user->password)) {
                    return $fail(__('validation.custom.currentpassword'));
                }
            }],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'different:current_password'],

        ], [
            "password.required" => __('validation.required', ['attribute' => 'new password']),
            "password.string" => __('validation.password.invalid', ['attribute' => 'new password']),
            "password.different" => __('validation.custom.samepassword', ['attribute' => 'new password']),
        ]);
        $user->password = Hash::make($request->password);
        $user->save();
        $request->session()->flash('Success', __('system.messages.change_success_message', ['model' => __('system.password.title')]));

        return redirect(route('admin.profile'));
    }

    public function delete(){
        $user = auth()->user();
        if ($user->user_type==User::USER_TYPE_ADMIN){
            return redirect('home');
        }

        $user->delete();
        return redirect('login')->with('Success',trans('system.profile.delete_success'));
    }
}

