<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adopcje;
use App\Models\Klienci;
use App\Models\Zwierzeta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;      

class AdopcjeKontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function allAdopcje()
    {
        $adopcjeZBazy = DB::table('adopcje')
        ->leftJoin('klienci', 'adopcje.klient_id', '=', 'klienci.id')
        ->leftJoin('zwierzeta', 'adopcje.zwierze_id', '=', 'zwierzeta.id')
        ->select('adopcje.*', 'klienci.imie as imie_klienta', 'zwierzeta.imie as imie_zwierzecia', 'klienci.nazwisko')
        ->get();
        
        return view('/adopcje/list', ['adopcja' => $adopcjeZBazy,]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klienciZBazy = Klienci::all();
        $zwierzetaZBazy = Zwierzeta::all();
        return view('/adopcje/add', ['klienci' => $klienciZBazy, 'zwierzeta' => $zwierzetaZBazy]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        {
            $validated = $request->validate([
                'klient_id' => 'required',
                'zwierze_id' => 'required',
                'data' => 'required',
            ]);
    
            if ($validated)
            {
                //create new Zwierze
                $adopcja = new Adopcje();
    
                //prepare data from request
                $adopcja->klient_id = $request->klient_id;
                $adopcja->zwierze_id = $request->zwierze_id;
                $adopcja->data = $request->data;
                
                //save to database
                $adopcja->save();
    
                //if OK then return to Ship Modules List
                return redirect('/adopcje/list');
            }
            else 
            {
                $error_message = "Wystąpił problem z walidacją podanych danych! Spróbuj ponownie";
                return view('adopcje.message', ['message'=>$error_message, 'type_of_message' => 'Error']);
            }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adopcjeZBazy = Adopcje::find($id)
        ->leftJoin('klienci', 'adopcje.klient_id', '=', 'klienci.id')
        ->leftJoin('zwierzeta', 'adopcje.zwierze_id', '=', 'zwierzeta.id')
        ->select('adopcje.*', 'klienci.imie as imie_klienta', 'zwierzeta.imie as imie_zwierzecia', 'klienci.nazwisko', 'klienci.email')
        ->get();

        $adopcjaZBazy = Adopcje::find($id);

        if ($adopcjaZBazy == null)
        {
            $error_message = "Adopcja o podanym id (".$id.") nie istnieje!";
            return view('adopcje.message', ['message'=>$error_message,'type_of_message' => 'Error']);
        }
        if ($adopcjaZBazy->count() > 0)
        {
            return view('/adopcje/delete', ['adopcja' => $adopcjaZBazy, 'adopcje' => $adopcjeZBazy]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find Module Crew by Id
        //$adopcjaZBazy = Adopcje::find($id);

        $adopcjeZBazy = Adopcje::find($id)
        ->leftJoin('klienci', 'adopcje.klient_id', '=', 'klienci.id')
        ->leftJoin('zwierzeta', 'adopcje.zwierze_id', '=', 'zwierzeta.id')
        ->select('adopcje.*', 'klienci.imie as imie_klienta', 'zwierzeta.imie as imie_zwierzecia', 'klienci.nazwisko', 'klienci.email')
        ->get();

        $adopcjaZBazy = Adopcje::find($id);

        $klienciZBazy = Klienci::all();
        $zwierzetaZBazy = Zwierzeta::all();

        //check counter
        if ($adopcjaZBazy == null)
        {
            $error_message = "Adopcja o podanym id (".$id.") nie istnieje!";
            return view('adopcje.message', ['message'=>$error_message,'type_of_message' => 'Error']);
        }
        if ($adopcjaZBazy->count() > 0)
        {
            return view('/adopcje/edit', ['adopcja' => $adopcjaZBazy, 'zwierzeta' => 
            $zwierzetaZBazy, 'klienci' => $klienciZBazy, 'adopcje' => $adopcjeZBazy]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'klient_id' => 'required',
            'zwierze_id' => 'required',
            'data' => 'required',
        ]);

        if ($validated)
        {
            //create new ShipModules
            $adopcja = Adopcje::find($id);

            //prepare data from request
            $adopcja->klient_id = $request->klient_id;
            $adopcja->zwierze_id = $request->zwierze_id;
            $adopcja->data = $request->data;
            
            //save to database
            $adopcja->save();

            //if OK then return to Ship Modules List
            return redirect('/adopcje/list');
        }
            else 
            {
                $error_message = "Wystąpił problem z walidacją podanych danych! Spróbuj ponownie";
                return view('adopcje.message', ['message'=>$error_message, 'type_of_message' => 'Error']);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adopcja = Adopcje::find($id);

        if($adopcja != null)
        {
            //delete shipmodule

            $adopcja->delete();
            return redirect('/adopcje/list');
        }
        else 
        {
            $error_message = "Adopcja o podanym id (".$id.") nie istnieje!";
            return view('adopcje.message', ['message'=>$error_message, 'type_of_message'=>'Error']);
        }
    }
}
