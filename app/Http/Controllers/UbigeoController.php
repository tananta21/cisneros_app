<?php

namespace App\Http\Controllers;

use App\Core\Ubigeo\UbigeoRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UbigeoController extends Controller
{
    protected $repoUbigeo;

    public function __construct(){
        $this->repoUbigeo = new UbigeoRepository();
    }

    public function index()
    {
        //
    }

    public function buscarProvincia(){

        $ubigeo = Input::get('ubigeo');
        $provincias = $this->repoUbigeo->allProvincias($ubigeo);
        if (empty($provincias)) {
            return 0;
        } else {
            return response()->json($provincias);
        }
    }

    public function buscarDistrito(){

        $ubigeo = Input::get('ubigeo');
        $provincias = $this->repoUbigeo->allDistritos($ubigeo);
        if (empty($provincias)) {
            return 0;
        } else {
            return response()->json($provincias);
        }
    }

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
}
