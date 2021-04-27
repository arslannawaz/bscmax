<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Session;

class ClaimTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->put('page','claim');
        $baseurl=$this->getBaseURL();
        $client = new Client();
        $url = $baseurl."/api/claimToken/getAllClaimToken";
        $headers = [
            'Content-Type: application/json',
        ];
        $response = $client->request('GET', $url, [
            'verify'  => false,
            'headers' => $headers,
        ]);
        $claimtoken = json_decode($response->getBody());
        return view('admin.claims',compact('claimtoken'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-claim');
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
        $url = $baseurl."/api/claimToken/createClaimToken";
        $headers = [
            'Content-Type: application/json',
        ];
        $params = [
            "projName"=>$request->projectname,
            "preSaleDateTimeStart"=>$request->preSaleDateTimeStart,
            "preSaleDateTimeClose"=>$request->preSaleDateTimeClose,
            "numberOfParticipant"=>$request->numberOfParticipant,
            "numberOfTokenPurchased"=>$request->numberOfTokenPurchased,
            "numberOfBNBRaised"=>$request->numberOfBNBRaised,
            "purchaseProgressPercentage"=>$request->purchaseProgressPercentage,
            "claimToken"=>$request->claimToken,
        ];
        $response = $client->request('POST', $url, [
            'verify'  => false,
            'headers' => $headers,
            'json' => $params,
        ]);
        //$wallet = json_decode($response->getBody());
        //print_r($wallet);
        return redirect()->route('viewclaim')->with("success","Claim Token Created Successfully");
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
        $url = $baseurl."/api/claimToken/getClaimTokenById/".$id;
        $headers = [
            'Content-Type: application/json',
        ];
        $response = $client->request('GET', $url, [
            'verify'  => false,
            'headers' => $headers,
        ]);
        $claimtokens = json_decode($response->getBody());
        $claimtoken=$claimtokens->data;
		return view('admin.add-claim',compact('claimtoken'));
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
        $url = $baseurl."/api/claimToken/updateClaimToken/".$id;
        $headers = [
            'Content-Type: application/json',
        ];
        $params = [
            "projName"=>$request->projectname,
            "preSaleDateTimeStart"=>$request->preSaleDateTimeStart,
            "preSaleDateTimeClose"=>$request->preSaleDateTimeClose,
            "numberOfParticipant"=>$request->numberOfParticipant,
            "numberOfTokenPurchased"=>$request->numberOfTokenPurchased,
            "numberOfBNBRaised"=>$request->numberOfBNBRaised,
            "purchaseProgressPercentage"=>$request->purchaseProgressPercentage,
            "claimToken"=>$request->claimToken,
        ];
        $response = $client->request('PUT', $url, [
            'verify'  => false,
            'headers' => $headers,
            'json' => $params,
        ]);
        //$wallet = json_decode($response->getBody());
        //print_r($wallet);
        return redirect()->route('viewclaim')->with("success","Claim Token Updated Successfully");
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
        $url = $baseurl."/api/claimToken/deleteClaimToken/".$id;
        $headers = [
            'Content-Type: application/json',
        ];
        $response = $client->request('DELETE', $url, [
            'verify'  => false,
            'headers' => $headers,
        ]);
        $users = json_decode($response->getBody());
        return redirect()->route('viewclaim')->with("success","Claim Token Deleted Successfully");
    }
}
