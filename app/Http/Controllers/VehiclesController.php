<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehiclesController extends Controller
{
    public function generateBarcode(Request $request)
    {
        if (Auth::check()) {
            $request = request()->all();
            if ($request['vin'] && strlen($request['vin']) === 17) {
                $delimiter = ';';
                $barcode = $request['vin'] . $delimiter . $request['make'] . $delimiter . $request['model'] . $delimiter . $request['year'] .
                    $delimiter . $request['registration'] . $delimiter . $request['issue_date'] . $delimiter . $request['expire_date'];
                return view('barcode', ['barcode' => $barcode]);
            }
            return redirect('home')->with('status', 'Please ensure the VIN number is 17 alphanumeric characters long!');
        }
        return view('welcome');
    }

    public function createQuote(Request $request)
    {
        if (Auth::check()) {
            $details = explode(';', $request->details);
            $notSupported = [
                'bmw',
                'uudi',
                'benz',
                'mercedes',
                'mercedes benz',
            ];
            $quote = [];
            $errors = [];
            $currentDate = date('Ymd');
            if (in_array(strtolower($details[1]), $notSupported)) {
                $errors[] = "This make of vehicle is not supported: {$details[1]}!";
            }
            if ((int) $details[3] < 2006) {
                $errors[] = 'Only cars older than 2006 are supported.';
            }
            if ((int) $details[6] < $currentDate) {
                $errors[] = 'Your licence disc has expired!';
            }
            if (empty($results)) {
                $errors[] = FALSE;
                $referenceNumber = str_pad(time() . rand(10 * 45, 100 * 98), 8, "0", STR_PAD_LEFT);
                $price = $this->costEstimator($details[3]);
                $user = Auth::user();
                $quote['id'] = $user->getAuthIdentifier();
                $quote['name'] = $user->getAttributes()['name'];
                $quote['email'] = $user->getAttributes()['email'];
                $quote['ref'] = $referenceNumber;
                $quote['cost'] = $price;
                $quote['vin'] = $details[0];
                $quote['make'] = $details[1];
                $quote['model'] = $details[2];
                $quote['year'] = $details[3];
                $quote['reg'] = $details[4];
                $quote['issue'] = $details[5];
                $quote['expire'] = $details[6];
            }
            return view('vehicle', ['errors' => $errors, 'quote' => $quote]);
        }
        return view('welcome');
    }

    public function scanQRCode()
    {
        if (Auth::check()) {
            return view('scan');
        }
        return view('welcome');
    }

    public function costEstimator($year) {
        if ((int)$year >= 2006 && (int)$year < 2011) {
            return 1000;
        }
        elseif ((int)$year >= 2011 && (int)$year < 2016) {
            return 1500;
        }
        elseif ((int)$year >= 2016 && (int)$year < 2021) {
            return 2000;
        }
        elseif ((int)$year > 2021) {
            return 2500;
        }
    }
}
