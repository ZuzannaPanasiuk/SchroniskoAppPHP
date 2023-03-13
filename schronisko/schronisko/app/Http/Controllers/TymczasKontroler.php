<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tymczas;
use App\Models\Wolontariusze;
use App\Models\Zwierzeta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TymczasKontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function allTymczasCurrent()
    {
        $tymczasZBazy = DB::table('tymczas')
        ->leftJoin('wolontariusze', 'tymczas.wolontariusz_id', '=', 'wolontariusze.id')
        ->leftJoin('zwierzeta', 'tymczas.zwierze_id', '=', 'zwierzeta.id')
        ->select('tymczas.*', 'wolontariusze.imie as imie_wolontariusza',
        'zwierzeta.imie as imie_zwierzecia', 'wolontariusze.nazwisko')
        ->get();

        return view('/tymczas/list_current', ['tymczas' => $tymczasZBazy,]);
    }

    public function allTymczasArchive()
    {
        $tymczasZBazy = DB::table('tymczas')
        ->leftJoin('wolontariusze', 'tymczas.wolontariusz_id', '=', 'wolontariusze.id')
        ->leftJoin('zwierzeta', 'tymczas.zwierze_id', '=', 'zwierzeta.id')
        ->select('tymczas.*', 'wolontariusze.imie as imie_wolontariusza',
        'zwierzeta.imie as imie_zwierzecia', 'wolontariusze.nazwisko')
        ->get();

        return view('/tymczas/list_archive', ['tymczas' => $tymczasZBazy,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wolontariuszZBazy = Wolontariusze::all();
        $zwierzetaZBazy = Zwierzeta::all();
        return view('/tymczas/add', ['wolontariusz' => $wolontariuszZBazy, 'zwierzeta' => $zwierzetaZBazy]);
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
                'wolontariusz_id' => 'required',
                'zwierze_id' => 'required',
                'data_poczatkowa' => 'required',
                'data_koncowa' => 'required',
            ]);
    
            if (($validated) && ($request->data_poczatkowa < $request->data_koncowa))
            {
                //create new Zwierze
                $tymczas = new Tymczas();
    
                //prepare data from request
                $tymczas->wolontariusz_id = $request->wolontariusz_id;
                $tymczas->zwierze_id = $request->zwierze_id;
                $tymczas->data_poczatkowa = $request->data_poczatkowa;
                $tymczas->data_koncowa = $request->data_koncowa;
                
                //save to database
                $tymczas->save();
    
                //if OK then return to Ship Modules List
                return redirect('/tymczas/list_current');
            }
            else 
            {
                $error_message = "Wystąpił problem z walidacją podanych danych! Spróbuj ponownie";
                return view('tymczas.message', ['message'=>$error_message, 'type_of_message' => 'Error']);
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
        $tymczasyZBazy = Tymczas::find($id)
        ->leftJoin('wolontariusze', 'tymczas.wolontariusz_id', '=', 'wolontariusze.id')
        ->leftJoin('zwierzeta', 'tymczas.zwierze_id', '=', 'zwierzeta.id')
        ->select('tymczas.*', 'wolontariusze.imie as imie_wolontariusza',
         'zwierzeta.imie as imie_zwierzecia', 'wolontariusze.nazwisko', 'wolontariusze.nr_tel')
        ->get();

        $tymczasZBazy = Tymczas::find($id);

        if ($tymczasZBazy == null)
        {
            $error_message = "Tymczas o podanym id (".$id.") nie istnieje!";
            return view('tymczas.message', ['message'=>$error_message,'type_of_message' => 'Error']);
        }
        if ($tymczasZBazy->count() > 0)
        {
            return view('/tymczas/delete', ['tymczas' => $tymczasZBazy, 'tymczasy' => $tymczasyZBazy]);
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
        $tymczasyZBazy = Tymczas::find($id)
        ->leftJoin('wolontariusze', 'tymczas.wolontariusz_id', '=', 'wolontariusze.id')
        ->leftJoin('zwierzeta', 'tymczas.zwierze_id', '=', 'zwierzeta.id')
        ->select('tymczas.*', 'wolontariusze.imie as imie_wolontariusza',
         'zwierzeta.imie as imie_zwierzecia', 'wolontariusze.nazwisko', 'wolontariusze.nr_tel')
        ->get();

        $tymczasZBazy = Tymczas::find($id);

        $wolontariuszeZBazy = Wolontariusze::all();
        $zwierzetaZBazy = Zwierzeta::all();

        //check counter
        if ($tymczasZBazy == null)
        {
            $error_message = "Tymczas o podanym id (".$id.") nie istnieje!";
            return view('tymczas.message', ['message'=>$error_message,'type_of_message' => 'Error']);
        }
        if ($tymczasZBazy->count() > 0)
        {
            return view('/tymczas/edit', ['tymczas' => $tymczasZBazy, 'zwierzeta' => 
            $zwierzetaZBazy, 'wolontariusze' => $wolontariuszeZBazy, 'tymczasy' => $tymczasyZBazy]);
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
            'wolontariusz_id' => 'required',
            'zwierze_id' => 'required',
            'data_poczatkowa' => 'required',
            'data_koncowa' => 'required',
        ]);

        if ($validated)
        {
            //create new ShipModules
            $tymczas = Tymczas::find($id);

            //prepare data from request
            $tymczas->wolontariusz_id = $request->wolontariusz_id;
            $tymczas->zwierze_id = $request->zwierze_id;
            $tymczas->data_poczatkowa = $request->data_poczatkowa;
            
            //save to database
            $tymczas->save();

            //if OK then return to Ship Modules List
            return redirect('/tymczas/list_current');
        }
            else 
            {
                $error_message = "Wystąpił problem z walidacją podanych danych! Spróbuj ponownie";
                return view('tymczas.message', ['message'=>$error_message, 'type_of_message' => 'Error']);
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
        $tymczas = Tymczas::find($id);

        if($tymczas != null)
        {
            //delete shipmodule

            $tymczas->delete();
            return redirect('/tymczas/list_current');
        }
        else 
        {
            $error_message = "Tymczas o podanym id (".$id.") nie istnieje!";
            return view('tymczas.message', ['message'=>$error_message, 'type_of_message'=>'Error']);
        }
    }
}
