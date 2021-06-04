<?php

namespace App\Http\Controllers\Admin\Control\Settings\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmbedCodeController extends Controller
{
    public function index()
    {
        return view('admin.control.settings.pages.embed');
    }

    public function save(Request $request)
    {
        try {
            setting([
                'embed-360' => $request->em360,
                'embed-gmaps' => $request->emGmaps,
                'embed-pixel' => $request->emPixel,
                'embed-analytics' => $request->emAnalytics,
                'embed-custom' => $request->emCustom
            ])->save();
            return redirect()->back()->with('success', 'Dados atualizados com sucesso!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Não foi possível atualizar os dados: ' . $exception->getMessage());
        }
    }
}
