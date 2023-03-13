<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zwierzeta;

class ZwierzetaKontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function allZwierzeta()
    {
        $zwierzetaZBazy = Zwierzeta::all();
        return view('/zwierzeta/list', ['zwierze' => $zwierzetaZBazy,]);
    }

    public function allZwierzetaAdmin()
    {
        $zwierzetaZBazy = Zwierzeta::all();
        return view('/zwierzeta/list_admin', ['zwierze' => $zwierzetaZBazy,]);
    }

    public function allKoty()
    {
        $kotyZBazy = Zwierzeta::zwierzetaGatunek('kot');
        return view('/zwierzeta/list_cats', ['kot'=> $kotyZBazy,]);
    }

    public function allPsy()
    {
        $psyZBazy = Zwierzeta::zwierzetaGatunek('pies');
        return view('/zwierzeta/list_dogs', ['pies'=> $psyZBazy,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/zwierzeta/add');
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
                'imie' => 'required|min:3|max:20',
                'gatunek' => 'required',
                'plec' => 'required|min:1|max:2',
                'rasa' => 'required|min:1|max:35',
                'wiek' => 'required|min:1|max:3',
                'historia' => 'required|min:5|max:150',
            ]);
    
            if ($validated)
            {
                //create new Zwierze
                $zwierze = new Zwierzeta();
    
                //prepare data from request
                $zwierze->imie = $request->imie;
                $zwierze->gatunek = $request->gatunek;
                $zwierze->plec = $request->plec;
                $zwierze->rasa = $request->rasa;
                $zwierze->wiek = $request->wiek;
                $zwierze->historia = $request->historia;
                
                //save to database
                $zwierze->save();
    
                //if OK then return to Ship Modules List
                return redirect('/zwierzeta/list_admin');
            }
            else 
            {
                $error_message = "Wystąpił problem z walidacją podanych danych! Spróbuj ponownie";
                return view('zwierzeta.message', ['message'=>$error_message, 'type_of_message' => 'Error']);
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
        $zwierze = Zwierzeta::find($id);

        //check counter
        if($zwierze == null)
        {
            $error_message = "Zwierze o podanym id (".$id.") nie istnieje!";
            return view('zwierzeta.message', ['message'=>$error_message,'type_of_message' => 'Error']);
        }
        if ($zwierze->count() > 0)
        {
            return view('/zwierzeta/delete', ['zwierze' => $zwierze,]);
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
        $zwierzeZBazy = Zwierzeta::find($id);

        //check counter
        if ($zwierzeZBazy == null)
        {
            $error_message = "Zwierze o podanym id (".$id.") nie istnieje!";
            return view('zwierze.message', ['message'=>$error_message,'type_of_message' => 'Error']);
        }
        if ($zwierzeZBazy->count() > 0)
        {
            return view('/zwierzeta/edit', ['zwierze' => $zwierzeZBazy]);
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
            'gatunek' => 'required',
            'plec' => 'required|min:1|max:2',
            'rasa' => 'required|min:1|max:35',
            'wiek' => 'required|min:1|max:3',
            'historia' => 'required|min:5|max:150',
        ]);

        if ($validated)
        {
            //create new Zwierze
            $zwierze = Zwierzeta::find($id);

            //prepare data from request
            $zwierze->imie = $request->imie;
            $zwierze->gatunek = $request->gatunek;
            $zwierze->plec = $request->plec;
            $zwierze->rasa = $request->rasa;
            $zwierze->wiek = $request->wiek;
            $zwierze->historia = $request->historia;
            
            //save to database
            $zwierze->save();

            //if OK then return to Ship Modules List
            return redirect('/zwierzeta/list_admin');
        }
        else 
            {
                $error_message = "Wystąpił problem z walidacją podanych danych! Spróbuj ponownie";
                return view('zwierzeta.message', ['message'=>$error_message, 'type_of_message' => 'Error']);
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
        $zwierze = Zwierzeta::find($id);

        if($zwierze != null)
        {
            //delete shipmodule

            $zwierze->delete();
            return redirect('/zwierzeta/list_admin');
        }
        else 
        {
            $error_message = "Zwierze o podanym id (".$id.") nie istnieje!";
            return view('zwierze.message', ['message'=>$error_message, 'type_of_message'=>'Error']);
        }
    }
}
