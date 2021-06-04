<?php

namespace App\Http\Controllers\Admin\Control\Bikes;

use App\Models\Bikes\BikeAttribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BikeAttributeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            BikeAttribute::create($request->all());
            connectify('success', 'Detalhe criado', "{$request->name}, foi criado com sucesso");
            return redirect()->back();
        } catch (\Exception $exception) {
            connectify('error', 'Erro ao criar o detalhe', 'Não foi possível criar o detalhe: ' . $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }
    }
    public function destroy($id)
    {
        try {
            BikeAttribute::findOrFail($id)->delete();
            connectify('success', 'Detalhe apagado', 'O detalhe foi apagado com sucesso!');
            return redirect()->back();
        } catch (\Exception $exception) {
            connectify('error', 'Erro ao criar o detalhe', 'Não foi possível apagar o detalhe: ' . $exception->getMessage());
            return redirect()->back();
        }
    }
}
