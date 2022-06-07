<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Api extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fisherManData = DB::table('fisherman')->join('cordinates', 'cordinates.fisher_id', '=', 'fisherman.fisher_id')
            ->get();
        return view('admin/user')->with("fisherManData", $fisherManData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Id = $request->input('id', 0);
        $fisher_id = $request->input('fisher_id');
        $long = $request->input('longitude');
        $lat = $request->input('latitude');



        $query = DB::select("SELECT INSERT_COORDINATE(?,?,?,?,?)", [$Id, 1, $long, $lat, 0]);
        if($query) {
            return redirect()->back()->with('message', 'IT WORKS!');

        }
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
