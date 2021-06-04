<?php

namespace App\Http\Controllers\Admin\Control\Bikes;

use App\Models\Bikes\BikeCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BikeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BikeCategory::paginate();
        return view('admin.control.bikes-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.control.bikes-category.create');
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
            BikeCategory::create($request->all());
            connectify('success', 'Categoria criada', 'Categoria criado com sucesso!');
            return redirect()->back();
        } catch (\Exception $exception) {
            connectify('error', 'Erro ao criar categoria', 'Não foi possível criar essa categoria: ' . $exception->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = BikeCategory::findOrFail($id);
        return view('admin.control.bikes-category.edit', compact('category'));
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
            BikeCategory::findOrFail($id)->update($request->all());
            connectify('success', 'Categoria atualizada', 'A categoria foi atualizada com sucesso!');
            return redirect()->back();
        } catch (\Exception $exception) {
            connectify('error', 'Erro ao atualizar a categoria', 'Não foi possível atualizar essa categoria: ' . $exception->getMessage());
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
            BikeCategory::findOrFail($id)->delete();
            connectify('succes', 'Categoria apagada', 'A categoria foi apagada com sucesso');
            return redirect()->back();
        } catch (\Exception $exception) {
            connectify('error', 'Erro ao apagar a categoria', 'Não foi possível apagar essa categoria: ' . $exception->getMessage());
            return redirect()->back();
        }
    }
}
