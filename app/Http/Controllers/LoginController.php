<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterEmployee;
use App\Models\MasterAdmin;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Modernize.authentication-login");
    }

    public function login(Request $request){
        $myusername = $request->input_username;
        $mypassword = $request->input_password;
        
        
        $checkadmin = MasterAdmin::where("username",$myusername)->where("password",$mypassword)->first();
        if($checkadmin){
            session()->put("login", "admin");
            return response()->json([
                'message' => "Welcome Admin",
                'status' =>"berhasil"
            ]);
        }
        else{
            return response()->json([
                'message' => "Login Failed",
                'status' =>"gagal"
            ]);
        }
       
    }
    public function logout(){
        session()->forget('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}