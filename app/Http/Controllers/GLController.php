<?php

namespace App\Http\Controllers;

use App\Department;
use App\GL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GLController extends Controller
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
    public function getGL()
    {
        //$gls = (new GL)::all();
        // $gls = DB::select('SELECT * FROM chart_of_accounts a'
        // . ' LEFT JOIN major_accounts_group b ON b.major_id = a.gl_major_code'
        // );
        $gls = (new GL)::all();
        return response()->json($gls);
    }
    public function getDepartments()
    {
        $depts = (new Department)::all();
        return response()->json($depts);
    }
    public function getSpecificGL($id)
    {
        $specificGL = (new GL)::find($id);
        return response()->json($specificGL);
    }
}
