<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Session;
use Cloudinary;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->put('page','projects');
        $baseurl=$this->getBaseURL();
        $client = new Client();
        $url = $baseurl."/api/project/getAllProject";
        $headers = [
            'Content-Type: application/json',
        ];
        $response = $client->request('GET', $url, [
            'verify'  => false,
            'headers' => $headers,
        ]);
        $projects = json_decode($response->getBody());
        return view('admin.projects',compact('projects'));
    }

    public function getOpenedProject()
    {
        session()->put('page','opened');
        $baseurl=$this->getBaseURL();
        $client = new Client();
        $url = $baseurl."/api/project/getProjectsByStatus";
        $headers = [
            'Content-Type: application/json',
        ];
        $params = [
            "status"=>'Open',
        ];
        $response = $client->request('POST', $url, [
            'verify'  => false,
            'headers' => $headers,
            'json' => $params,
        ]);
        $projects = json_decode($response->getBody());
        return view('admin.project-opened',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-project');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $image_path = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();

        $baseurl=$this->getBaseURL();
        $client = new Client();
        $url = $baseurl."/api/project/createProject";
        $headers = [
            'Content-Type: application/json',
        ];
        $params = [
        
            "name"=>$request->name,
            "description"=>$request->description,
            "logoImage"=>$image_path,
            "tokenAddress"=>$request->token_address,
            "totalSupply"=>$request->token_supply,
            "listingTimeDate"=>$request->listing_date,
            "BNBPerToken"=>$request->bnb_token,
            "BNBRaised"=>$request->bnb_raised,
            "softCap"=>$request->softcap,
            "hardCap"=>$request->hardcap,
            "minPerWallet"=>$request->min_wallet,
            "maxPerWallet"=>$request->max_wallet,
            "preSaleRate"=>$request->presale_rate,
            "panCakeSwapPrice"=>$request->pancake_swap_price,
            "liquidityAllocation"=>$request->liquidity_allocation,
            "liquidityDuration"=>$request->liquidity_duration,
            "openTimeDate"=>$request->open_date,
            "closeTimeDate"=>$request->close_date,
            "status"=>$request->status,
            "smartContractAddress"=>$request->contact_address,
            "goSwapAddress"=>$request->swap_address,
            "website"=>$request->website,
            "twitterLink"=>$request->twitter,
            "mediumLink"=>$request->medium,
            "telegramLink"=>$request->telegram,
            "publish"=> $request->publish
        ];
        $response = $client->request('POST', $url, [
            'verify'  => false,
            'headers' => $headers,
            'json' => $params,
        ]);
        return redirect()->route('viewproject')->with("success","Project Created Successfully");
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
        $url = $baseurl."/api/project/getProjectById/".$id;
        $headers = [
            'Content-Type: application/json',
        ];
        $response = $client->request('GET', $url, [
            'verify'  => false,
            'headers' => $headers,
        ]);
        $projects = json_decode($response->getBody());
        $project=$projects->data;
		return view('admin.add-project',compact('project'));
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
        if($request->file('file')){
            $image_path = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
        }
        else{
            $image_path=$request->old_picture;
        }

        $baseurl=$this->getBaseURL();
        $client = new Client();
        $url = $baseurl."/api/project/updateProject/".$id;
        $headers = [
            'Content-Type: application/json',
        ];
        $params = [
        
            "name"=>$request->name,
            "description"=>$request->description,
            "logoImage"=>$image_path,
            "tokenAddress"=>$request->token_address,
            "totalSupply"=>$request->token_supply,
            "listingTimeDate"=>$request->listing_date,
            "BNBPerToken"=>$request->bnb_token,
            "BNBRaised"=>$request->bnb_raised,
            "softCap"=>$request->softcap,
            "hardCap"=>$request->hardcap,
            "minPerWallet"=>$request->min_wallet,
            "maxPerWallet"=>$request->max_wallet,
            "preSaleRate"=>$request->presale_rate,
            "panCakeSwapPrice"=>$request->pancake_swap_price,
            "liquidityAllocation"=>$request->liquidity_allocation,
            "liquidityDuration"=>$request->liquidity_duration,
            "openTimeDate"=>$request->open_date,
            "closeTimeDate"=>$request->close_date,
            "status"=>$request->status,
            "smartContractAddress"=>$request->contact_address,
            "goSwapAddress"=>$request->swap_address,
            "website"=>$request->website,
            "twitterLink"=>$request->twitter,
            "mediumLink"=>$request->medium,
            "telegramLink"=>$request->telegram,
            "publish"=> $request->publish
        ];
        $response = $client->request('PUT', $url, [
            'verify'  => false,
            'headers' => $headers,
            'json' => $params,
        ]);

        if (session('page')=='opened'){
            return redirect()->route('viewopenedproject')->with("success","Project Updated Successfully");
        }
        else{
            return redirect()->route('viewproject')->with("success","Project Updated Successfully");
        }
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
        $url = $baseurl."/api/project/deleteProject/".$id;
        $headers = [
            'Content-Type: application/json',
        ];
        $response = $client->request('DELETE', $url, [
            'verify'  => false,
            'headers' => $headers,
        ]);
        $users = json_decode($response->getBody());
        if (session('page')=='opened'){
            return redirect()->route('viewopenedproject')->with("success","Project Deleted Successfully");
        }
        else{
            return redirect()->route('viewproject')->with("success","Project Deleted Successfully");
        }
    }
}
