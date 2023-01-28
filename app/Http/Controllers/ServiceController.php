<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServiceController extends Controller
{
    protected Service $model;
    protected string $source;
    protected string $routeName;
    private $disk = 'public';

    //Para proteger nuestras rutas
    public function __construct()
    {
        $this->middleware('auth');
        $this->source = 'Servicios/';
        $this->model = new Service();
        $this->routeName = 'servicios.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render("{$this->source}Index", [
            'servicios'        =>  $this->model::paginate(100),
            'titulo'          => 'Gestión de servicios',
            'routeName'      => $this->routeName
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render("{$this->source}Create", [
            'titulo'          => 'Agregar Servicios',
            'routeName'      => $this->routeName
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        if($request->hasFile("imagen")){
            $file = $request->file('imagen');
            $nombre = $request->input('nombre').'.'.$file->guessExtension();
            Service::create([
                'nombre' => $request->input('nombre'),
                'precio' => $request->input('precio'), 
                'imagen' => $nombre,                
                $file->storeAs('public/Imagenes', $nombre)
            ]);
        }else{
            Service::create($request->validated());
        }
        return redirect()->route("servicios.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        abort(405);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return Inertia::render("{$this->source}Edit", [
            'titulo'          => 'Editar servicios',
            'routeName'      => $this->routeName,
            'servicios' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update($request->validated());
        return redirect()->route('servicios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->route('servicios.index');
    }

    public function upload(Request $request)
    {
        $id = $request->id;
        $service = Service::find($id);
        
        if($request->hasFile("imagen")){
            $file = $request->file('imagen');
            $nombre = $request->input('nombre').'.'.$file->guessExtension();
            $file->storeAs('public/Imagenes', $nombre);
            
            $requestData = $request->all();
            $requestData['imagen'] = $nombre;
            $service->update($requestData);
        }else{
            $service->update($request->all());
        }
        return redirect()->route('servicios.index');
    }
}
