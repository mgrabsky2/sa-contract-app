<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract;
use App\Venue;
use App\Film;
use App\Cinema;
use App\Format;
use App\Language;
use App\Contract_Screening;


class ContractController extends Controller
{
       
    public function index() {        
        
        $contracts = Contract::all();
        //$contracts = contract::orderBy('name')->get();
        //$contracts = contract::where('type', 'hawaiian')->get();
        //$contracts = contract::latest()->get();
            
        return view('contracts.index', [
            'contracts' => $contracts
        ]);       
       
    }

    public function show($id) {

        $contract = Contract::findOrFail($id);

        return view('contract.show', ['contract' => $contract]);
    }

    public function terms() {        
        return view('contracts.terms');
    }

    public function create() {

        // we need to asceratin which cinema this user is responsible for.
        $user = auth()->user();        
        $cinemaID = Cinema::where('email', $user->email)->first()->id;
        $cinemaName = Cinema::where('email', $user->email)->first()->name;

        $venues = Venue::where('cinemaId', $cinemaID)->get(['id', 'name', 'formatId', 'languageId', 'deliveryAddress']);
        $films = Film::all(['id', 'name', 'length', 'releaseDate', 'inSeason']);
        $formats = Format::all(['id', 'name']);
        $languages = Language::all(['id', 'name']);

        return view('contracts.create', [
            'venues' => $venues, 'films' => $films, 'formats' => $formats, 'languages' => $languages, 'cinemaName' => $cinemaName
        ]);
    }

    public function store() {

        //error_log(request('id'));
    
        $data = request()->validate([
            'venue.*' => 'required|numeric|min:1',
            'filmId.*' => 'required|numeric|min:1',
            'screenings.*' => 'required',
            'startDate.*' => 'required|before_or_equal:endDate.*',
            'endDate.*' => 'required|after_or_equal:startDate.*'
        ]);
                   
        $contract = new Contract();
        //dd(json_encode( request('venue')));
        $contract->venueId = request('venue');
        $venue = Venue::where('id', $contract->venueId)->first()->name;
        $cinemaId = Venue::where('id', $contract->venueId)->first()->cinemaId;
        $cinemaName = Cinema::where('id', $cinemaId)->first()->name;
        
        $contract->save();

        //dd($contract->id);

        $noRows = (int)request("tableRows");
        $films = array($noRows);
        for($i = 0; $i < $noRows; $i++) {
            $contract_screening = new Contract_Screening();

            $contract_screening->contractId = $contract->id;
            $contract_screening->filmId = request("filmId." . strval($i) );
            $contract_screening->noOfScreenings = request("screenings." . strval($i));
            $contract_screening->startDate = request("startDate." . strval($i));
            $contract_screening->endDate = request("endDate." . strval($i));

            $film = Film::where('id', $contract_screening->filmId)->first()->name;
            $screenings = strval($contract_screening->noOfScreenings);
            if($screenings == 0) $screenings = "TBC";

            $films[$i] = array($film, $screenings, 
                $contract_screening->startDate, $contract_screening->endDate);
            $contract_screening->save();
        }

        
        $mike = app('App\Http\Controllers\MailController')->html_email($contract->id, $cinemaName, $venue, $films);

        //return redirect()->back();            

        return redirect('/contracts/create')->with('mssg', 'Thanks for submitting a new contract. Please logout or enter another.');
    }

    public function contactInfo() {

        // we need to asceratin which cinema this user is responsible for.
        $user = auth()->user();        
        $cinemaID = Cinema::where('email', $user->email)->first()->id;
        $cinemaName = Cinema::where('email', $user->email)->first()->name;        

        return view('contracts.contact_details');
    }

    public function storeContactInfo() {
        dd("hello");

    }

    public function destroy($id) {
        $contract = Contract::findOrFail($id);
        $contract->delete();

        return redirect('/contracts');
    }
}
