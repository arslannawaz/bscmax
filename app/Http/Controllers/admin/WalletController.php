<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Session;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baseurl=$this->getBaseURL();
        $client = new Client();
        $url = $baseurl."/api/wallet/getAllWallet";
        $headers = [
            'Content-Type: application/json',
        ];
        $response = $client->request('GET', $url, [
            'verify'  => false,
            'headers' => $headers,
        ]);
        $wallets = json_decode($response->getBody());
        return view('admin.wallets',compact('wallets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-wallet');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $baseurl=$this->getBaseURL();
        $client = new Client();
        $url = $baseurl."/api/wallet/createWallet";
        $headers = [
            'Content-Type: application/json',
        ];
        $params = [
            "projName"=>$request->projectname,
            "preSaleStarted"=>$request->presalestarted,
            "whiteListed"=>$request->whitelisted,
            "country"=>$request->country,
            "walletType"=>$request->wallettype,
            "walletAddress"=>$request->walletaddress,
            "numberBsmxStaked"=>$request->bsmx,
            "maxBNBPerWallet"=>$request->maxbnbperwallet,
            "purchasedBNBAmount"=>$request->purchasedbnbamount,
            "wallet"=>$request->wallet,
        ];
        $response = $client->request('POST', $url, [
            'verify'  => false,
            'headers' => $headers,
            'json' => $params,
        ]);
        //$wallet = json_decode($response->getBody());
        //print_r($wallet);
        return redirect()->route('viewwallet')->with("success","Wallet Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $baseurl=$this->getBaseURL();
        $client = new Client();
        $url = $baseurl."/api/wallet/getWalletById/".$id;
        $headers = [
            'Content-Type: application/json',
        ];
        $response = $client->request('GET', $url, [
            'verify'  => false,
            'headers' => $headers,
        ]);
        $wallets = json_decode($response->getBody());
        $wallet=$wallets->data;
		return view('admin.add-wallet',compact('wallet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $baseurl=$this->getBaseURL();
        $client = new Client();
        $url = $baseurl."/api/wallet/updateWallet/".$id;
        $headers = [
            'Content-Type: application/json',
        ];
        $params = [
            "projName"=>$request->projectname,
            "preSaleStarted"=>$request->presalestarted,
            "whiteListed"=>$request->whitelisted,
            "country"=>$request->country,
            "walletType"=>$request->wallettype,
            "walletAddress"=>$request->walletaddress,
            "numberBsmxStaked"=>$request->bsmx,
            "maxBNBPerWallet"=>$request->maxbnbperwallet,
            "purchasedBNBAmount"=>$request->purchasedbnbamount,
            "wallet"=>$request->wallet,
        ];
        $response = $client->request('PUT', $url, [
            'verify'  => false,
            'headers' => $headers,
            'json' => $params,
        ]);
        //$wallet = json_decode($response->getBody());
        //print_r($wallet);
        return redirect()->route('viewwallet')->with("success","Wallet Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baseurl=$this->getBaseURL();
        $client = new Client();
        $url = $baseurl."/api/wallet/deleteWallet/".$id;
        $headers = [
            'Content-Type: application/json',
        ];
        $response = $client->request('DELETE', $url, [
            'verify'  => false,
            'headers' => $headers,
        ]);
        $users = json_decode($response->getBody());
        return redirect()->route('viewwallet')->with("success","Wallet Deleted Successfully");
    }
}
