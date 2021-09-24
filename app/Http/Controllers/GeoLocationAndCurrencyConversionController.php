<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeoLocationAndCurrencyConversionController extends Controller
{
    public function index(){
        $geoLocateBaseURI                   = 'https://app.ipworld.info/api/iplocation?apikey=c01403fbebe447fea66d731a81ec2761';
        $response                           = Http::accept('application/json')->get($geoLocateBaseURI);
        $fullResponse                       = $response->json();

        return view('geolocate')->with('locatedcurrency','USD')
                                ->with('userIp',$fullResponse['ip'])
                                ->with('userContinent',$fullResponse['continent'])
                                ->with('userCountry',$fullResponse['country'])
                                ->with('userZipCode',$fullResponse['zipCode'])
                                ->with('userFlag', $fullResponse['flag'])
                                ->with('userCurrencyCode',$fullResponse['currencyCode']);
    }

    public function ConvertCurrency(Request $req){
        $currencyConversionBaseURI          = 'https://currency-exchange.p.rapidapi.com/exchange';
        $value_to_convert                   =   $req->enteredvalue;

        $response   = Http::withHeaders([
            'x-rapidapi-host' => 'currency-exchange.p.rapidapi.com',
            'x-rapidapi-key' => 'd6a4590abcmshc3b32ffcbe31feap18587ejsnfca8d46e066b'
        ])->accept('application/json')->get($currencyConversionBaseURI,[
            'to' => $req->convertToCurr,
            'from' => $req->hdnBaseCurrency,
            //'q' => '1.0'
        ]);
        $unitPrice  =   $response->json();
        //dd($response->json());
        $convertedPrice     =   $value_to_convert * $unitPrice;

        return view('geolocate')->with('convertedValue', $convertedPrice);
    }

    public function result(){
        return view('geolocate');
    }
}
