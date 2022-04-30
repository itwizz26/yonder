<?php

namespace App\Http\Controllers;

use App\Models\Quotations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuotationsController extends Controller
{
    public function saveQuotation(Request $request) {
        if (Auth::check()) {
            $request = request()->all();
            $carDetails = [
                $request['vin'],
                $request['make'],
                $request['model'],
                $request['year'],
                $request['reg'],
                $request['issue'],
                $request['expire'],
            ];
            $carDetails = json_encode($carDetails);
            if (Quotations::where('reference', '=', $request['ref'])->exists() === FALSE) {
                DB::insert('insert into quotations (reference, name, email, cost, store, details) values (?, ?, ?, ?, ?, ?)', [
                    $request['ref'],
                    $request['name'],
                    $request['email'],
                    $request['cost'],
                    $request['stores'],
                    $carDetails,
                ]);
            }
            return view('accept', ['ref' => $request['ref']]);
        }
        return view('welcome');
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
     * @param  \App\Models\Quotations  $quotations
     * @return \Illuminate\Http\Response
     */
    public function show(Quotations $quotations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quotations  $quotations
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotations $quotations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quotations  $quotations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotations $quotations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quotations  $quotations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotations $quotations)
    {
        //
    }
}
