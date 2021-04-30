<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Session;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->put('page','refunds');
        $baseurl=$this->getBaseURL();
        $client = new Client();
        $url = $baseurl."/api/refund/getAllRefund";
        $headers = [
            'Content-Type: application/json',
        ];
        $response = $client->request('GET', $url, [
            'verify'  => false,
            'headers' => $headers,
        ]);
        $refunds = json_decode($response->getBody());
        return view('admin.refunds',compact('refunds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-refund');
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
        $url = $baseurl."/api/refund/createRefund";
        $headers = [
            'Content-Type: application/json',
        ];
        $params = [
            "projName"=>$request->projName,
            "whiteListed"=>$request->whiteListed,
            "walletAddress"=>$request->walletAddress,
            "purchaseAmount"=>$request->purchaseAmount,
            "refundAmount"=>$request->refundAmount,
            "getRefundButton"=>"false",
        ];
        $response = $client->request('POST', $url, [
            'verify'  => false,
            'headers' => $headers,
            'json' => $params,
        ]);
        //$refund = json_decode($response->getBody());
        //print_r($refund);
        return redirect()->route('viewrefund')->with("success","Refund Created Successfully");
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
        $url = $baseurl."/api/refund/getRefundById/".$id;
        $headers = [
            'Content-Type: application/json',
        ];
        $response = $client->request('GET', $url, [
            'verify'  => false,
            'headers' => $headers,
        ]);
        $refunds = json_decode($response->getBody());
        $refund=$refunds->data;
		return view('admin.add-refund',compact('refund'));
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
        $url = $baseurl."/api/refund/updateRefund/".$id;
        $headers = [
            'Content-Type: application/json',
        ];
        $params = [
            "projName"=>$request->projName,
            "whiteListed"=>$request->whiteListed,
            "walletAddress"=>$request->walletAddress,
            "purchaseAmount"=>$request->purchaseAmount,
            "refundAmount"=>$request->refundAmount,
            "getRefundButton"=>"false",
        ];
        $response = $client->request('PUT', $url, [
            'verify'  => false,
            'headers' => $headers,
            'json' => $params,
        ]);
        //$refund = json_decode($response->getBody());
        //print_r($refund);
        return redirect()->route('viewrefund')->with("success","Refund Updated Successfully");
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
        $url = $baseurl."/api/refund/deleteRefund/".$id;
        $headers = [
            'Content-Type: application/json',
        ];
        $response = $client->request('DELETE', $url, [
            'verify'  => false,
            'headers' => $headers,
        ]);
        $users = json_decode($response->getBody());
        return redirect()->route('viewrefund')->with("success","Refund Deleted Successfully");
    }
}
