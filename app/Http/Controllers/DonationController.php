<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Donation::all();
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
        if ($request->hasFile('file_path')) {
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);
            $request->file_path->store('donation', 'public');
            $donation = new Donation([
                "name" => $request->get('name'),
                "description" => $request->get('description'),
                "file_path" => $request->file_path->hashName()
            ]);
            $donation->save();
            return $donation;
        }
        else {
            $donation = new Donation([
                "name" => $request->get('name'),
                "description" => $request->get('description'),
                // "file_path" => set a image default
            ]);
            $donation->save();
            return 'sin file';
        }
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
        return Donation::destroy($id);
    }
    /**
     * Search for a name.
     *
     * @param  str $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Donation::where('name', 'like','%'.$name.'%')->get();
    }
}
