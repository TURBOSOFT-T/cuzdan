<?php

namespace App\Http\Controllers\Back;

use App\Http\{
    Controllers\Controller,
};

use App\Models\WalletSellerMoneyTransferList;
use App\Http\Requests\StoreWalletSellerMoneyTransferListRequest;
use App\Http\Requests\UpdateWalletSellerMoneyTransferListRequest;
use App\Models\WalletCostsheet;
use Illuminate\Http\Request;

class WalletSellerMoneyTransferListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $walletCosts= WalletCostsheet::latest()->paginate(5);
        return view('back.walletSellerMoneyTransferLists.index' , compact('walletCosts'));
    }

    public function individual()
    {

        $walletCosts = WalletCostsheet::select('*')
            ->join('users', 'wallet_costsheets.user_id', '=', 'users.id')
            ->where('registration_type', 'INDIVIDUAL')
            ->paginate(5);

        // return $this->getResponse($walletOrderLists, "All orders");
        return view('back.walletSellerMoneyTransferLists.index', compact('walletCosts'));
    }


    public function corporate()
    {

        $walletCosts = WalletCostsheet::select('*')
            ->join('users', 'wallet_costsheets.user_id', '=', 'users.id')
            ->where('registration_type', 'CORPORATE')
            ->paginate(5);

        //  return $this->getResponse($walletOrderLists, "All orders");
        return view('back.walletSellerMoneyTransferLists.index', compact('walletCosts'));
    }

    public function actifUser()
    {


        $walletCosts = WalletCostsheet::select('*')
            ->join('users', 'wallet_costsheets.user_id', '=', 'users.id')
            ->where('status', '1')
            ->paginate(5);

        //  return $this->getResponse($walletOrderLists, "All orders");
        return view('back.walletSellerMoneyTransferLists.index', compact('walletCosts'));
    }


    public function passifUser()
    {

        $walletCosts = WalletCostsheet::select('*')
            ->join('users', 'wallet_costsheets.user_id', '=', 'users.id')
            ->where('status', '0')
            ->paginate(5);

        //  return $this->getResponse($walletOrderLists, "All orders");
        return view('back.walletSellerMoneyTransferLists.index', compact('walletCosts'));
    }


    public function filter(Request $request)
    {
        $walletCosts = WalletCostsheet::query();

        $country = $request->country;
        $vendor = $request->vendor;

        if ($country) {
            $walletCosts->where('country', 'LIKE', '%' . $country . '%');
        }

        if ($vendor) {
            $walletCosts->where('vendor', 'LIKE', '%' . $vendor . '%');
        }

        $data = [

            'country' => $country,
            'vendor' => $vendor,

            'walletOrderLists' => $walletCosts->latest()->Paginate(5),
        ];

        return view('back.walletSellerMoneyTransferLists.index', $data);
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
     * @param  \App\Http\Requests\StoreWalletSellerMoneyTransferListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWalletSellerMoneyTransferListRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WalletSellerMoneyTransferList  $walletSellerMoneyTransferList
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WalletSellerMoneyTransferList  $walletSellerMoneyTransferList
     * @return \Illuminate\Http\Response
     */
    public function edit(WalletSellerMoneyTransferList $walletSellerMoneyTransferList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWalletSellerMoneyTransferListRequest  $request
     * @param  \App\Models\WalletSellerMoneyTransferList  $walletSellerMoneyTransferList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWalletSellerMoneyTransferListRequest $request, WalletSellerMoneyTransferList $walletSellerMoneyTransferList)
    {
        //
    }

    public function show($id)
    {
        $walletOrderLists = WalletCostsheet::find($id);
        return view('back.walletSellerMoneyTransferLists.show', compact('walletOrderLists'));
    }

    public function destroy($id)
    {
        WalletCostsheet::find($id)->delete();
        return redirect()->route('walletSellerMoneyTransferLists.index')
        ->with('success', 'User deleted successfully');
    }
}