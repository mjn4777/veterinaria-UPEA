<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;


use App\Models\Tipo;
use App\Models\Mascotum;
use Illuminate\Http\Request;
use Alert;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $tipo = Tipo::where('descrip', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $tipo = Tipo::latest()->paginate($perPage);
        }

        return view('admin.tipo.index', compact('tipo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tipo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        



        $requestData = $request->all();
        
        //Tipo::create($requestData);

        
        Tipo::create($requestData);
        Alert::alert()->success('Registro agregado','El registro ha
        sido agredo correctamente.');
        return redirect('admin/tipo')->with('flash_message', 'Tipo added!');

        //return redirect('admin/tipo')->with('flash_message', 'Tipo added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $tipo = Tipo::findOrFail($id);

        return view('admin.tipo.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $tipo = Tipo::findOrFail($id);

        return view('admin.tipo.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $tipo = Tipo::findOrFail($id);
        $tipo->update($requestData);

        return redirect('admin/tipo')->with('flash_message', 'Tipo updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        
        Tipo::destroy($id);

        return redirect('admin/tipo')->with('flash_message', 'Tipo deleted!');
    }
}
