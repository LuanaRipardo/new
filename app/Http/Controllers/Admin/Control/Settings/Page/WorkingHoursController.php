<?php

namespace App\Http\Controllers\Admin\Control\Settings\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkingHoursController extends Controller
{
    public function index()
    {
        return view('admin.control.settings.pages.working-hours');
    }

    public function save(Request $request)
    {
        try {
            setting([
                // Abertura
                'w_seg_abertura' => $request->w_seg_abertura,
                'w_seg_fechamento' => $request->w_seg_fechamento,
                'w_ter_abertura' => $request->w_ter_abertura,
                'w_ter_fechamento' => $request->w_ter_fechamento,
                'w_quar_abertura' => $request->w_quar_abertura,
                'w_quar_fechamento' => $request->w_quar_fechamento,
                'w_qui_abertura' => $request->w_qui_abertura,
                'w_qui_fechamento' => $request->w_qui_fechamento,
                'w_sex_abertura' => $request->w_sex_abertura,
                'w_sex_fechamento' => $request->w_sex_fechamento,
                'w_sab_abertura' => $request->w_sab_abertura,
                'w_sab_fechamento' => $request->w_sab_fechamento,
                'w_dom_abertura' => $request->w_dom_abertura,
                'w_dom_fechamento' => $request->w_dom_fechamento,
            ])->save();
            return redirect()->back()->with('success', 'Dados atualizados com sucesso!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Não foi possível atualizar as informações:' . $exception->getMessage());
        }
    }
}
