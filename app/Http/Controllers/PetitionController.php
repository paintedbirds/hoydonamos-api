<?php

namespace App\Http\Controllers;

use App\Models\Petition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\PetitionCreated;
use App\Mail\PetitionManagmentCreated;
use App\Mail\MailerAuth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
//Validation
use App\Http\Requests\PetitionStoreFormRequest;

class PetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request = null)
    {
        if (!is_null($request)) {
            $time_period = $request->query("time_period");
            if ($time_period === "week") {
                $byweek = Petition::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->get()
                ->paginate(10);
            return $byweek;
            } else if ($time_period === "month") {
                $byMonth = Petition::whereMonth('created_at', Carbon::now()->month)
                ->get()
                ->paginate(10);
                return $byMonth;
            }else{
                return back()->withErrors('We could not manage your filter');
            }
        }
        return Petition::where('state', 'PUBLISHED')->paginate(10);
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
    public function store(PetitionStoreFormRequest $request)
    {
        $request->validated();

        $user = Auth::user();

        $petition = new Petition([
            "subject" => $request->get('subject'),
            "description" => $request->get('description'),
        ]);
        
        $petition->user()->associate($user);

        $petition->save();

        Mail::to($user['email'])->send(new PetitionCreated($petition));
        Mail::to(env('MAIL_CONTENT_MANAGMENT'))->send(new PetitionManagmentCreated($petition));

        return $petition;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petition  $petition
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Petition::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petition  $petition
     * @return \Illuminate\Http\Response
     */
    public function edit(Petition $petition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petition  $petition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $petition = Petition::find($id);
        $petition->update($request->all());
        return $petition;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petition  $petition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petition = Petition::find($id);
        return  $petition->delete();    
    }
}
