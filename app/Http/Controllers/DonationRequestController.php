<?php

namespace App\Http\Controllers;

use App\Models\DonationRequest;
use App\Mail\DonationRequestManagmentCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//Validation
use App\Http\Requests\DonationRequestFormRequest;


class DonationRequestController extends Controller
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
    public function store($id, DonationRequestFormRequest $request)
    {
        $request->validated();

        $user = Auth::user();

        $request = new DonationRequest([
            "reason" => $request->get('reason'),
        ]);

        $request->user()->associate($user);

        $request->donation()->associate($id);

        $request->save();

        Mail::to(env('MAIL_CONTENT_MANAGMENT'))->send(new DonationRequestManagmentCreated($request));

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DonationRequest  $DonationRequest
     * @return \Illuminate\Http\Response
     */
    public function show(DonationRequest $DonationRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DonationRequest  $DonationRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(DonationRequest $DonationRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DonationRequest  $DonationRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DonationRequest $DonationRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DonationRequest  $DonationRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donationRequest = DonationRequest::find($id);
        return  $donationRequest->delete();
    }
}
