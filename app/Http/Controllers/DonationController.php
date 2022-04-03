<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\DonationRequested;
use App\Mail\MailerAuth;
use Illuminate\Support\Facades\Mail;
//Validation
use App\Http\Requests\StoreDonationFormRequest;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($search = null)
    {
        if(!is_null($search)){
            return Donation::where('name', 'like','%'.$search.'%')
            ->where('state', 'PUBLISHED')
            ->paginate(10);
        }
        return Donation::where('state', 'PUBLISHED')->paginate(10);
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
    public function store(StoreDonationFormRequest $request)
    {        
        $request->validated();

        $user = Auth::user();

        $img=Image::make($request->file('image')->getRealPath());
        $img=resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        });
        $response = cloudinary()->upload($img, [
            'folder' => 'Donaciones'
        ])->getSecurePath();

        $donation = new Donation([
            "name" => $request->get('name'),
            "description" => $request->get('description'),
            "image" => asset($response),
        ]);
        
        $donation->user()->associate($user);

        $donation->save();

        Mail::to($user['email'])->send(new DonationRequested($request));

        return $donation;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        return Donation::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $donation = Donation::find($id);
        $donation->update($request->all());
        return $donation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donation = Donation::find($id);
        return  $donation->delete();
    }
}
