<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Mascotum;
use Illuminate\Http\Request;

use App\Models\Tipo;
use App\Models\Raza;
use PDF;




use Alert;

class MascotaController extends Controller
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
            $mascota = Mascotum::where('codigo', 'LIKE', "%$keyword%")
                ->orWhere('tipo_id', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('raza_id', 'LIKE', "%$keyword%")
                ->orWhere('color', 'LIKE', "%$keyword%")
                ->orWhere('f_nac', 'LIKE', "%$keyword%")
                ->orWhere('foto', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $mascota = Mascotum::latest()->paginate($perPage);
        }

        return view('admin.mascota.index', compact('mascota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $tipos=Tipo::All();
        $razas=Raza::All();

        return view('admin.mascota.create',compact('tipos','razas'));
        //return view('admin.mascota.create');
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
        
        Mascotum::create($requestData);
        Alert::alert()->success('Registro agregado','El registro ha
        sido agredo correctamente.');
        //return redirect('admin/tipo')->with('flash_message', 'Tipo added!');

        return redirect('admin/mascota')->with('flash_message', 'Mascotum added!');
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
        $mascotum = Mascotum::findOrFail($id);

        return view('admin.mascota.show', compact('mascotum'));
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
        $mascotum = Mascotum::findOrFail($id);

        return view('admin.mascota.edit', compact('mascotum'));
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
        
        $mascotum = Mascotum::findOrFail($id);
        $mascotum->update($requestData);

        return redirect('admin/mascota')->with('flash_message', 'Mascotum updated!');
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
        Mascotum::destroy($id);

        return redirect('admin/mascota')->with('flash_message', 'Mascotum deleted!');
    }



    public function MostrarMascotaPdf()
                {
                
        //crea el PDF
        $view=\View::make('vistapdf')->render();
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('hola.pdf'); //Archivo de descarga
                }
        
}
