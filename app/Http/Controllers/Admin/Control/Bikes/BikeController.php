<?php

namespace App\Http\Controllers\Admin\Control\Bikes;

use App\Models\Bikes\Bike;
use App\Models\Bikes\BikeCategory;
use App\Support\ImageService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bikes = Bike::paginate();
        return view('admin.control.bikes.index', compact('bikes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BikeCategory::all();
        return view('admin.control.bikes.create', compact('categories'));
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
            if($request->price != null) {
                $request['price'] = $this->currencyBR($request->price);
            }

            if ($request->hasFile('image_path')) {
                $image = new ImageService($request->image_path, 370, 488);
                $request['path'] = $image->resizeImage('motorcycles', false);
            }

            $bike = Bike::create($request->all());
            connectify('success', 'Moto criada', 'A moto foi criada com sucesso!');
            return redirect()->route('admin.bikes.edit', $bike->id);
        } catch (\Exception $exception) {
            connectify('error', 'Erro ao criar a moto', 'Ocorreu um erro ao criar a moto: ' . $exception->getMessage());
            return redirect()->back()->withInput($request->all());
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
        $bike = Bike::findOrFail($id);
        $attributes = $bike->attributes()->paginate(7);
        $images = $bike->images()->paginate(12);
        $categories = BikeCategory::all();
        return view('admin.control.bikes.edit', compact('bike', 'attributes', 'images', 'categories'));
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
            if($request->price != null) {
                $request['price'] = $this->currencyBR($request->price);
            }
            if ($request->hasFile('image_path')) {
                $image = new ImageService($request->image_path, 370, 488);
                $request['path'] = $image->resizeImage('motorcycles', false);
            }

            Bike::findOrFail($id)->update($request->all());
            connectify('success', 'Moto atualizada', 'A moto foi atualizada com sucesso!');
            return redirect()->back();
        } catch (\Exception $exception) {
            connectify('error', 'Erro ao atualizar moto', 'Não foi possível atualizar a moto: ' . $exception->getMessage());
            return redirect()->back();
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
            Bike::findOrFail($id)->delete();
            connectify('success', 'Moto apagada', 'A moto foi apagada com sucesso!');
            return redirect()->back();
        } catch (\Exception $exception) {
            connectify('error', 'Erro ao apagar moto', 'Não foi possível apagar a moto:' . $exception->getMessage());
        }
    }

    private function currencyBR($getValue) {
        $str = str_replace('.', '', $getValue); // remove o ponto
        $price = str_replace(',', '.', $str); // troca a vírgula por ponto
        $price = substr($price, 3);
        return $price;
    }
}
