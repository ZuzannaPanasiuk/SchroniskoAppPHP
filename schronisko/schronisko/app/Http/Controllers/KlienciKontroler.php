<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klienci;

class KlienciKontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function allKlienci()
    {
        $klienciZBazy = Klienci::all();
        return view('/klienci/list', ['klient' => $klienciZBazy,]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/klienci/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $validated = $request->validate([
            'imie' => 'required|min:3|max:20',
            'nazwisko' => 'required|min:3|max:30',
            'email' => 'required|min:9|max:25|unique:klienci',
        ]);

        if ($validated)
        {
            //create new ShipModules
            $klient = new Klienci();

            //prepare data from request
            $klient->imie = $request->imie;
            $klient->nazwisko = $request->nazwisko;
            $klient->email = $request->email;
            
            //save to database
            $klient->save();

            //if OK then return to Ship Modules List
            return redirect('/klienci/list');
        }
        else 
            {
                $error_message = "Wystąpił problem z walidacją podanych danych! Spróbuj ponownie";
                return view('klient.message', ['message'=>$error_message, 'type_of_message' => 'Error']);
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
        $klienci = Klienci::find($id);

        //check counter
        if($klienci == null)
        {
            $error_message = "Klient o podanym id (".$id.") nie istnieje!";
            return view('klienci.message', ['message'=>$error_message,'type_of_message' => 'Error']);
        }
        if ($klienci->count() > 0)
        {
            return view('/klienci/delete', ['klient' => $klienci,]);
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
        $klientZBazy = Klienci::find($id);

        //check counter
        if ($klientZBazy == null)
        {
            $error_message = "Klient o podanym id (".$id.") nie istnieje!";
            return view('klienci.message', ['message'=>$error_message,'type_of_message' => 'Error']);
        }
        if ($klientZBazy->count() > 0)
        {
            return view('/klienci/edit', ['klient' => $klientZBazy]);
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
            'imie' => 'required|min:3|max:20',
            'nazwisko' => 'required|min:3|max:30',
            'email' => 'required|min:9|max:25|unique:klienci',
        ]);

        if ($validated)
        {
            //create new ShipModules
            $klient = Klienci::find($id);

            //prepare data from request
            $klient->imie = $request->imie;
            $klient->nazwisko = $request->nazwisko;
            $klient->email = $request->email;
            
            //save to database
            $klient->save();

            //if OK then return to Ship Modules List
            return redirect('/klienci/list');
        }
            else 
            {
                $error_message = "Wystąpił problem z walidacją podanych danych! Spróbuj ponownie";
                return view('klienci.message', ['message'=>$error_message, 'type_of_message' => 'Error']);
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
        //prepare data from request
        $klient = Klienci::find($id);

        if($klient != null)
        {
            //delete shipmodule

            $klient->delete();
            return redirect('/klienci/list');
        }
        else 
        {
            $error_message = "Klient o podanym id (".$id.") nie istnieje!";
            return view('klienci.message', ['message'=>$error_message, 'type_of_message'=>'Error']);
        }
    }
}
