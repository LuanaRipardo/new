<?php

namespace App\Http\Controllers\Admin\Control\Bikes;

use App\Http\Controllers\Controller;
use App\Models\Bikes\BikeImage;
use App\Support\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BikeImageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if ($request->hasFile('image_path')) {
                $image = new ImageService($request->image_path, 370, 488);
                $request['path'] = $image->resizeImage('motorcycles', false);

                $thumb = new ImageService($request->image_path, 370, 488);
                $request['thumb_path'] = $thumb->resizeImage('motorcycles', true);
            }
            BikeImage::create($request->all());
            connectify('success', 'Imagem enviada', 'A sua imagem foi registrada com sucesso!');
            return redirect()->back();
        } catch (\Exception $exception) {
            connectify('error', 'Erro ao enviar imagem', 'Não foi possível enviar a imagem: ' . $exception->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $image = BikeImage::findOrFail($id);
            Storage::drive('uploads')->delete($image->path);
            $image->delete();
            connectify('success', 'Imagem apagada', 'A imagem foi apagada com sucesso!');
            return redirect()->back();
        } catch (\Exception $exception) {
            connectify('error', 'Erro ao apagar imagem', 'Não foi possível apagar a imagem: ' . $exception->getMessage());
            return redirect()->back();
        }
    }
}
