<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Flyer;
use App\Photo;
use App\Http\Controllers\Traits\AuthorizesUsers;
use App\Http\Requests\FlyerRequest as FlyerRequest;
use App\Http\Requests\AddPhotoRequest;
use App\Http\Controllers\Controller;

class FlyersController extends Controller
{
    use AuthorizesUsers;
    function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
        parent::__construct();
    }
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
        return view('flyers.create');
    }

    /**
     * Use FlyaerRequest to validate
     * Then persist data to database
     * return redirect to root path
     *
     * @param  \Illuminate\Http\Requests\Flyer  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlyerRequest $request)
    {
        Flyer::create($request->all());
        flash()->success('Success!', 'Your flyer has been created');
        return redirect()->back();
    }


    /**
     * Apply a photo to the referenced flyer
     * @param string  $zip     
     * @param string  $street  
     * @param Request $request 
     */
    public function addPhoto ($zip , $street , AddPhotoRequest $request) {

        $photo = Photo::fromFile($request->file('photo'));
        Flyer::locatedAt($zip, $street)->addPhoto($photo);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street);
        return view('flyers.show', compact('flyer'));
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
