<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract;

class SeventhArtController extends Controller
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

    public function create() {
        return view('seventhArt.create_contract');
    }

    public function store() {

        $contract = new Contract();

        $contract->venueID = request('venueId');
        //$contract->type = request('type');
        //$contract->base = request('base');
        //$contract->toppings = request('toppings');
        //$contract->price = 15;

        $contract->save();

        return redirect('/')->with('mssg', 'Thanks for your order');
    }

    public function destroy($id) {
        $contract = Contract::findOrFail($id);
        $contract->delete();

        return redirect('/contracts');
    }
}
