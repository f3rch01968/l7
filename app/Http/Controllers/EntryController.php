<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); //protegemos de accesos no autorizados
    }
    public function create(){
        return view('entries.create');
    }
    public function store(Request $request){
        // dd($request ->all());  Muestra lo que nos envia el formulario
        // Validar la informacion
        $validatedData = $request->validate([
           'title'=>'required|min:7|max:255|unique:entries',
           'content'=>'required|min:25|max:3000'
        ]);

        $entry = new Entry();
        $entry->title = $validatedData['title'];
        $entry->content = $validatedData['content'];
        $entry->user_id = auth()->id();
        $entry->save(); //INSERT

        $status = 'Tu entrada ha sido publicada saisfactoriamente!!!';


        return back()->with(compact('status'));
    }

    public function edit(Entry $entry)
    {
        return view('entries.edit', compact('entry'));
    }

    public function update(Request $request, Entry $entry)
    {
        // dd($request ->all());  Muestra lo que nos envia el formulario
        // Validar la informacion
        $validatedData = $request->validate([
            'title'=>'required|min:7|max:255|unique:entries,id,'.$entry->id,
            'content'=>'required|min:25|max:3000'
        ]);

        // ToDo: Permitir editar solo al usuario autor de la entrada
        // auth()->id() === $entry ->user_id

        $entry->title = $validatedData['title'];
        $entry->content = $validatedData['content'];
        $entry->save(); //Update

        $status = 'Tu entrada ha sido modificada correctamente!!!';


        return back()->with(compact('status'));
    }

}
