<?php

namespace App\Http\Controllers\Admin\Control\Settings\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SEOController extends Controller
{
    public function index()
    {
        return view('admin.control.settings.pages.seo');
    }

    public function save(Request $request)
    {
        try {
            setting([
                'site_description' => $request->site_description,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'gmaps_link' => $request->gmaps_link
            ])->save();
            return redirect()->back()->with('success', 'Dados atualizados com sucesso!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Não foi possível atualizar as informações:' . $exception->getMessage());
        }
    }
}
