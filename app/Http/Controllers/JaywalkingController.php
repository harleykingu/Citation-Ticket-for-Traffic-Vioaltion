<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jaywalking;
use Auth;
use Session;

class JaywalkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Store in the datavase
      $jaywalking = new Jaywalking;
      $user_id = Auth::id();


      $jaywalking->user_id = $user_id;
      $jaywalking->tct_no = $request->tct_no;
      $jaywalking->app_name = $request->app_name;
      $jaywalking->address = $request->address;
      $jaywalking->violation = $request->violation;
      $jaywalking->app_date = $request->app_date;
      $jaywalking->officer = $request->officer;
      $jaywalking->remark = $request->remark;
      $jaywalking->or_no = $request->or_no;
      $jaywalking->amount = $request->amount;
      $jaywalking->or_date = $request->or_date;
      $jaywalking->status = $request->status;


      $jaywalking->save();

      return redirect()->route('homepage');
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
