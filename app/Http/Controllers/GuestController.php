<?php

namespace App\Http\Controllers;

Use App\Entry;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
     //   dd('GuestController');
     //   $entries = Entry::all();   Sin paginaciòn
        $entries = Entry::with('user')
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate(5);
        return view('welcome', compact('entries'));
    }

    public function show(Entry $entry)
    {
       return view('entries.show',compact('entry'));
    }
}
