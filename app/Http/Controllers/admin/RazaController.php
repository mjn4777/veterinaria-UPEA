<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Raza;
use Illuminate\Http\Request;
use Alert;

class RazaController extends Controller
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
            $raza = Raza::where('descrip', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $raza = Raza::latest()->paginate($perPage);
        }

        return view('admin.raza.index', compact('raza'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.raza.create');
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
        
        
        Raza::create($requestData);
        Alert::alert()->success('Registro agregado','El registro ha
        sido agredo correctamente.');

        return redirect('admin/raza')->with('flash_message', 'Raza added!');
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
        $raza = Raza::findOrFail($id);

        return view('admin.raza.show', compact('raza'));
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
        $raza = Raza::findOrFail($id);

        return view('admin.raza.edit', compact('raza'));
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
        
        $raza = Raza::findOrFail($id);
        $raza->update($requestData);

        return redirect('admin/raza')->with('flash_message', 'Raza updated!');
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
        Raza::destroy($id);

        return redirect('admin/raza')->with('flash_message', 'Raza deleted!');
    }
}
