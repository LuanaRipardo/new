<?php

namespace App\Http\Controllers\Admin\Control;

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
        $contacts = Contact::paginate();
        return view('admin.control.contacts.index', compact('contacts'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        if($contact->read == 0) {
            $contact->read = 1;
            $contact->save();
        }
        return view('admin.control.contacts.show', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Contact::find($id)->delete();
            return redirect()->route('admin.contacts.index')->with('success', 'Contato apagado com sucesso!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Não foi possível apagar essa mensagem: ' . $exception->getMessage());
        }
    }
}
