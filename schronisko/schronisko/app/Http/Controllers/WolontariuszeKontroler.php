<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wolontariusze;

class WolontariuszeKontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function allWolontariusze()
    {
        $wolontariuszeZBazy = Wolontariusze::all();
        return view('/wolontariusze/list', ['wolontariusz' => $wolontariuszeZBazy,]);
    }

    public function form()
    {
        return view('/wolontariusze/form');
    }

    public function thanks()
    {
        return view('/wolontariusze/thanks');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'imie' => 'required|min:3|max:20',
            'nazwisko' => 'required|min:3|max:30',
            'nr_tel' => 'required|min:9|max:12|unique:wolontariusze',
            'rola' => 'required|min:3|max:30',
        ]);

        if ($validated)
        {
            //create new ShipModules
            $wolontariusz = new Wolontariusze();

            //prepare data from request
            $wolontariusz->imie = $request->imie;
            $wolontariusz->nazwisko = $request->nazwisko;
            $wolontariusz->nr_tel = $request->nr_tel;
            $wolontariusz->rola = $request->rola;
            
            //save to database
            $wolontariusz->save();

            //if OK then return to Ship Modules List
            return redirect('/wolontariusze/thanks');
        }
        else 
        {
            $error_message = "Wystąpił problem z walidacją podanych danych! Spróbuj ponownie";
            return view('wolontariusze.message', ['message'=>$error_message, 'type_of_message' => 'Error']);
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wolontariusz = Wolontariusze::find($id);

        //check counter
        if($wolontariusz == null)
        {
            $error_message = "Wolontariusz o podanym id (".$id.") nie istnieje!";
            return view('wolontariusze.message', ['message'=>$error_message,'type_of_message' => 'Error']);
        }
        if ($wolontariusz->count() > 0)
        {
            return view('/wolontariusze/delete', ['wolontariusz' => $wolontariusz,]);
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
        $wolontariuszZBazy = Wolontariusze::findWolontariuszById($id);

        //check counter
        if ($wolontariuszZBazy == null)
        {
            $error_message = "Wolontariusz o podanym id (".$id.") nie istnieje!";
            return view('wolontariusze.message', ['message'=>$error_message,'type_of_message' => 'Error']);
        }
        if ($wolontariuszZBazy->count() > 0)
        {
            return view('/wolontariusze/edit', ['wolontariusz' => $wolontariuszZBazy]);
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
            'nr_tel' => 'required|min:9|max:12',
            'rola' => 'required|min:3|max:30',
        ]);

        if ($validated)
        {
            //create new ShipModules
            $wolontariusz = Wolontariusze::findWolontariuszById($id);

            //prepare data from request
            $wolontariusz->imie = $request->imie;
            $wolontariusz->nazwisko = $request->nazwisko;
            $wolontariusz->nr_tel = $request->nr_tel;
            $wolontariusz->rola = $request->rola;
            
            //save to database
            $wolontariusz->save();

            //if OK then return to Ship Modules List
            return redirect('/wolontariusze/list');
        }
            else 
            {
                $error_message = "Wystąpił problem z walidacją podanych danych! Spróbuj ponownie";
                return view('wolontariusze.message', ['message'=>$error_message, 'type_of_message' => 'Error']);
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
        $wolontariusz = Wolontariusze::find($id);

        if($wolontariusz != null)
        {
            //delete shipmodule

            $wolontariusz->delete();
            return redirect('/wolontariusze/list');
        }
        else 
        {
            $error_message = "Wolontariusz o podanym id (".$id.") nie istnieje!";
            return view('wolontariusz.message', ['message'=>$error_message, 'type_of_message'=>'Error']);
        }
    }
}
