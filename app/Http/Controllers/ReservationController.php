<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ReservationController extends Controller
{
    protected Reservation $model;
    protected string $source;
    protected string $routeName;
    private $disk = 'public';

    //Para proteger nuestras rutas
    public function __construct()
    {
        $this->middleware('auth');
        $this->source = 'Reservaciones/';
        $this->model = new Reservation();
        $this->routeName = 'reservaciones.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Funcion para listar las citas
    public function index()
    {
        $id = Auth::id();
        $user = User::find($id);

        if ($user['tipo'] == 1) {
            return Inertia::render("{$this->source}Index", [
                'reservaciones'        =>  Reservation::all(),
                'titulo'          => 'Gestion de citas',
                'routeName'      => $this->routeName
            ]);
        } else {
            $reservaciones = $user->reservations;
            return Inertia::render("{$this->source}Index", [
                'reservaciones'        =>  $reservaciones,
                'titulo'          => 'Citas',
                'routeName'      => $this->routeName
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservationRequest  $request
     * @return \Illuminate\Http\Response
     */
    //Funcion para guardar las citas
    public function store(StoreReservationRequest $request)
    {
        $id =  Auth::id();
        Reservation::create([
            'nombre_c' => $request->input('nombre_c'),
            'nombre_a' => $request->input('nombre_a'),
            'edad_a' => $request->input('edad_a'),
            'peso_a' => $request->input('peso_a'),
            'raza_a' => $request->input('raza_a'),
            'service_id' => $request->input('service_id'),
            'user_id' => $id,
        ]);
        return redirect()->route("dashboard")->with('message', 'Cita generada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    //Funcion para mostrar las citas
    public function show($id)
    {
        $servicio = Service::find($id);
        return Inertia::render("{$this->source}Create", [
            'titulo'          => 'Agregar cita',
            'routeName'      => $this->routeName,
            'servicio'  => $servicio,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    //Funcion para editar las citas
    public function edit($id)
    {
        $reservacion = Reservation::find($id);
        $servicio = $reservacion->service_id;
        $servicio = Service::find($servicio);
        return Inertia::render("{$this->source}Edit", [
            'titulo'          => 'Editar cita',
            'routeName'      => $this->routeName,
            'reservaciones' => $reservacion,
            'servicio' => $servicio,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationRequest  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    //Funcion para editar las citas (ya lo hace en la bd)
    public function update(UpdateReservationRequest $request)
    {
        $id = $request->id;
        $reservacion = Reservation::find($id);
        $reservacion->update($request->validated());
        return redirect()->route('reservaciones.index')->with('message', 'Cita actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    //Funcion para eliminar las citas
    public function destroy($id)
    {
        $reservacion = Reservation::find($id);
        $reservacion->delete();
        return redirect()->route('reservaciones.index')->with('message', 'Cita eliminada con éxito');;
    }
}
