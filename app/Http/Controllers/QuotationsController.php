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
                DB::insert('insert into quotations (reference, name, email, cost, store, details, accepted) values (?, ?, ?, ?, ?, ?, ?)', [
                    $request['ref'],
                    $request['name'],
                    $request['email'],
                    $request['cost'],
                    $request['stores'],
                    $carDetails,
                    'yes',
                ]);
            }
            return view('accept', ['ref' => $request['ref']]);
        }
        return view('welcome');
    }

}
