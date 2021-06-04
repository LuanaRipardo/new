<?php

namespace App\Http\Controllers\Admin\Control;

use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;
use App\Support\ImageService;
use App\Support\Scopes\MessagesTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class BannerController extends Controller
{
    use MessagesTrait;

    private $nameModel = 'Banner';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::principal()->paginate();
        return view('admin.control.settings.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.control.settings.banners.create');
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
            if ($request->hasFile('image_path')) {

                $image = new ImageService($request->image_path, 778, 585);
                $request['path'] = $image->resizeImage('banners', false);
            }
            Banner::create($request->all());
            connectify('success', 'Banner criado', 'O banner foi criado com sucesso!');
            return redirect()->back();
        } catch (\Exception $exception) {
            connectify('error', 'Falha ao criar banner', $exception->getMessage());
            return redirect()->back()->withInput(Input::all());
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
        $banner = Banner::findOrFail($id);
        return view('admin.control.settings.banners.edit', compact('banner'));
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
        try {
            if ($request->hasFile('image_path')) {

                $image = new ImageService($request->image_path, 778, 585);
                $request['path'] = $image->resizeImage('banners', false);
            }
            Banner::findOrFail($id)->update($request->all());
            connectify('success', 'Banner atualizado', 'O banner foi atualizado com sucesso!');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withInput(Input::all())->with('error', $this->errorUpdateMessage($this->nameModel, $exception));
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
        try {
            Banner::findOrFail($id)->delete();
            connectify('success', 'Banner removido', 'O banner foi removido com sucesso!');
            return redirect()->back();
        } catch (\Exception $exception) {
            connectify('error', 'Não foi possível remover o banner', 'Houve um problema ao tentar remover o banner: ' . $exception->getMessage());
            return redirect()->back();
        }
    }
}
