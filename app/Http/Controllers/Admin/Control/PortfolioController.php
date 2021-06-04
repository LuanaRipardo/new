<?php

namespace App\Http\Controllers\Admin\Control;

use App\Models\Blog\Post;
use App\Models\Portfolio;
use App\Support\ImageService;
use App\Support\Scopes\MessagesTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    use MessagesTrait;

    protected $nameModel = 'Imagem';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Portfolio::paginate();
        return view('admin.control.portfolio.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.control.portfolio.create');
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
                $image = new ImageService($request->image_path, 900, 900);
                $request['path'] = $image->resizeImage('portfolio', false);
            }
            Portfolio::create($request->all());
            return redirect()->back()->with('success', $this->successCreatedMessage($this->nameModel));
        } catch (\Exception $exception) {
            return redirect()->back()->withInput(Input::all())->with('error', $this->errorCreatedMessage($this->nameModel, $exception));
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
            $port = Portfolio::findOrFail($id);
            Storage::drive('uploads')->delete($port->image);
            $port->delete();
            return redirect()->back()->with('success', 'Imagem apagada com sucesso!');
        } catch (\Exception $exception) {
            return redirect()->back()->withInput(Input::all())->with('error', 'Não foi possível apagar esta imagem:' . $exception->getMessage());
        }
    }
}
