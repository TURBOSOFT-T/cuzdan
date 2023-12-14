<?php

namespace App\Http\Controllers\Back;

use App\Http\{
    Controllers\Controller,
};

use App\Models\Wallet_Sellers;
use App\Http\Requests\StoreWallet_SellersRequest;
use App\Http\Requests\UpdateWallet_SellersRequest;
use App\Models\User;
use Illuminate\Http\Request;

class WalletSellersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $users = User::latest()->paginate(5);
        return view('back.walletSellers.index', compact('users'));
    }

    public function filter(Request $request)
    {
        $users = User::query();

        $last_name = $request->last_name;
        $email = $request->email;
        $bank_name = $request->bank_name;
        $address = $request->address;




        if ($last_name) {
            $users->where('last_name', 'LIKE', '%' . $last_name . '%');
        }

        if ($email) {
            $users->where('email', 'LIKE', '%' . $email . '%');
        }
        if ($bank_name) {
            $users->where('bank_name', 'LIKE', '%' . $bank_name . '%');
        }
        if ($address) {
            $users->where('address', 'LIKE', '%' . $address . '%');
        }





        $data = [

            'email' => $email,
            'name' => $last_name,
            'status' => $bank_name,
            'address' => $address,

            'users' => $users->latest()->Paginate(5),
        ];

        return view('back.walletSellers.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWallet_SellersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWallet_SellersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wallet_Sellers  $wallet_Sellers
     * @return \Illuminate\Http\Response
     */
    public function show(Wallet_Sellers $wallet_Sellers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wallet_Sellers  $wallet_Sellers
     * @return \Illuminate\Http\Response
     */
    public function edit(Wallet_Sellers $wallet_Sellers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWallet_SellersRequest  $request
     * @param  \App\Models\Wallet_Sellers  $wallet_Sellers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWallet_SellersRequest $request, Wallet_Sellers $wallet_Sellers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallet_Sellers  $wallet_Sellers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Wallet_Sellers::find($id)->delete();
        return redirect()->route('walletSellers.index')
        ->with('success', 'User deleted successfully');
    }
}