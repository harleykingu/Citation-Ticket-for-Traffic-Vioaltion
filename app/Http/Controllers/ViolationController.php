<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Violation;
use Auth;
use Session;

class ViolationController extends Controller
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
    $violation = new Violation;
    $user_id = Auth::id();


    $violation->user_id = $user_id;
    $violation->tct_no = $request->tct_no;
    $violation->driver_name = $request->driver_name;
    $violation->address = $request->address;
    $violation->violation = $request->violation;
    $violation->plate_no = $request->plate_no;
    $violation->license_no = $request->license_no;
    $violation->officer = $request->officer;
    $violation->remark = $request->remark;
    $violation->or_no = $request->or_no;
    $violation->amount = $request->amount;
    $violation->or_date = $request->or_date;
    $violation->status = $request->status;


    $violation->save();

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
        $violation = Violation::find($id);

        return view('vehicle.show')->withViolations($violation);

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $violation = Violation::find($id);
      $violation->delete();

      return redirect()->route('homepage');
    }
}
