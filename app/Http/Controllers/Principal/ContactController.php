<?php

namespace App\Http\Controllers\Principal;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('principal.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Contact::create($request->all());
            connectify('success', 'Mensagem enviada', 'Nós recebemos a sua mensagem, obrigado por entrar em contato');
            return redirect()->back();
        } catch (\Exception $exception) {
            connectify('error', 'Problema ao enviar mensagem', 'Infelizmente não foi possível enviar sua mensagem, tente novamente mais tarde.');
            return redirect()->back();
        }
    }
}
