<?php

namespace App\Http\Controllers\Admin\Control\Settings\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    public function index()
    {
        return view('admin.control.settings.pages.general');
    }

    public function save(Request $request)
    {
        try {
            setting(['address' => $request->address, 'phone' => $request->phone, 'email' => $request->email, 'about' => $request->about])->save();
            return redirect()->back()->with('success', 'Dados atualizados com sucesso!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Não foi possível atualizar os dados: ' . $exception->getMessage());
        }
    }
}
