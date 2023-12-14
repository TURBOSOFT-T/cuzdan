<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $categories = Category::all();

        //  dd($categories);
        return view('auth.register', compact('categories'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'birth_day' => 'required',
            'gender' => 'required',
             'region'=>'string',
            'country' => 'required',
            'state' => 'required',
            'city' => 'string',

            'phone' => 'required',
            'address' => 'required',
            'tc_vkn' => 'required',
            'bank_name'         => 'required',
            'iban'         => 'required',
            'category'         => 'required',
            'currency'         => 'required',
            //  'fx_rate'         => 'required',

            //  'trade_name'  => 'string',
            //  'company_type' =>     'string',
            'mersis_no' => 'string',
            'registration_number' => 'string',

            'taxe_admin' => 'string',
            'taxe_admin'    => 'string',


            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $personal_info = new User();
        $personal_info->first_name        = $request->first_name;
        $personal_info->last_name         = $request->last_name;
        $personal_info->birth_day =  $request->birth_day;

        $personal_info->gender = $request->gender;
        $personal_info->region  = $request->region;
        $personal_info->country  = $request->country;

        $personal_info->state = $request->state;
        $personal_info->city = $request->city;
        $personal_info->phone = $request->phone;
        $personal_info->address = $request->address;
        $personal_info->tc_vkn = $request->tc_vkn;
        $personal_info->bank_name  = $request->bank_name;
        $personal_info->iban    = $request->iban;
        $personal_info->category    = $request->category;
        $personal_info->currency    = $request->currency;

        //  'fx_rate'  => $request->fx_rate,

        // 'trade_name'  => $request->trade_name,
        // 'company_type' => $request->company_type,
        $personal_info->mersis_no = $request->mersis_no;
        $personal_info->registration_number = $request->registration_number;
        $personal_info->taxe_admin  = $request->taxe_admin;
        $personal_info->taxe_number = $request->taxe_number;

        //  'image_path'=>$request->image_path,
        $personal_info->email = $request->email;
        $personal_info->password = Hash::make($request->password);

        if ($request->file('image_path')) {
            $picture       = !empty($request->file('image_path')) ? $request->file('image_path')->getClientOriginalName() : '';
            $request->file('image_path')->move(public_path('assets/images/'), $picture);
        }
        $personal_info->image_path        = isset($picture) && !empty($picture) ? $picture : '';
        $personal_info->save();


        /* $user = User::create([
             'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'birth_day' => $request->birth_day,
            'gender' => $request->gender,
            'country' => $request->country,
            'region'         => $request->region,
            'city'  => $request->city,
            'phone' => $request->phone,
            'address' => $request->address,
           'tc_vkn' => $request->tc_vkn,
           'bank_name'  => $request->bank_name,
          'iban'    => $request->iban,
            'category'    => $request->category,
            'currency'    => $request->currency,

            //  'fx_rate'  => $request->fx_rate,

            // 'trade_name'  => $request->trade_name,
            // 'company_type' => $request->company_type,
             'mersis_no' => $request->mersis_no,
            'registration_number' => $request->registration_number,
            'taxe_admin'  => $request->taxe_admin,
           'taxe_number'    => $request->taxe_number,

             'image_path'=>$request->image_path,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]); */



        //  event(new Registered($user));
        event(new Registered($personal_info));

        // Auth::login($user);
        Auth::login($personal_info);

        return redirect(RouteServiceProvider::HOME);
    }
}