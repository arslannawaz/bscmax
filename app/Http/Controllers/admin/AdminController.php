<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->put('page','users');
        $baseurl=$this->getBaseURL();
        $client = new Client();
        $url = $baseurl."/api/user/getAllUser";
        $headers = [
            'Content-Type: application/json',
        ];
        $response = $client->request('GET', $url, [
            'verify'  => false,
            'headers' => $headers,
        ]);
        $users = json_decode($response->getBody());
		return view('admin.users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session()->put('page','users');
		return view('admin.add-admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' =>'required'
        ]);

        User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt($request->password),
        ]);

        $image_path = cloudinary()->upload($request->file('picture')->getRealPath())->getSecurePath();
        $baseurl=$this->getBaseURL();
        $client = new Client();
        $url = $baseurl."/api/user/createUser";
        $headers = [
            'Content-Type: application/json',
        ];
        $params = [
            "name"=>$request->name,
            "picture"=>$image_path,
            "email"=>$request->email,
            "password"=>$request->password,
        ];
        $response = $client->request('POST', $url, [
            'verify'  => false,
            'headers' => $headers,
            'json' => $params,
        ]);
        //$users = json_decode($response->getBody());
        //print_r($users);
        return redirect()->route('viewadmin')->with("success","User Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $url = $baseurl."/api/user/getUserById/".$id;
        $headers = [
            'Content-Type: application/json',
        ];
        $response = $client->request('GET', $url, [
            'verify'  => false,
            'headers' => $headers,
        ]);
        $user = json_decode($response->getBody());
        $users=$user->data;
		return view('admin.add-admin',compact('users'));
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
        if($request->file('picture')){
            $image_path = cloudinary()->upload($request->file('picture')->getRealPath())->getSecurePath();
        }
        else{
            $image_path=$request->old_picture;
        }

        $baseurl=$this->getBaseURL();
        $client = new Client();
        $url = $baseurl."/api/user/updateUser/".$id;
        $headers = [
            'Content-Type: application/json',
        ];
        $params = [
            "name"=>$request->name,
            "picture"=>$image_path,
            "email"=>$request->email,
        ];
        $response = $client->request('PUT', $url, [
            'verify'  => false,
            'headers' => $headers,
            'json' => $params,
        ]);
        return redirect()->route('viewadmin')->with("success","User Updated Successfully");
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
        $url = $baseurl."/api/user/deleteUser/".$id;
        $headers = [
            'Content-Type: application/json',
        ];
        $response = $client->request('DELETE', $url, [
            'verify'  => false,
            'headers' => $headers,
        ]);
        $users = json_decode($response->getBody());
        return redirect()->route('viewadmin')->with("success","User Deleted Successfully");
    }

    public function viewDashboard()
    {
        session()->put('page','dashboard');
        $baseurl=$this->getBaseURL();
        $client = new Client();
        $url = $baseurl."/api/project/getDashboardInfo";
        $headers = [
            'Content-Type: application/json',
        ];
        $response = $client->request('GET', $url, [
            'verify'  => false,
            'headers' => $headers,
        ]);
        $dashboard = json_decode($response->getBody());
		return view('admin.dashboard',compact('dashboard'));
    }
}
