<?php

namespace App\Http\Controllers;

use App\Models\Solicitante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SolicitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['permission:update user'],['only'=>['edit','update']]);
    }
    public function index()
    {
        $usuario = User::all();

        $solicitante = Solicitante::all();

        return view('solicitantes.index', compact('usuario','solicitante'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha'=> 'required',
            'name' => 'required|min:5',
            'apellido' => 'required|min:5',
            'direccion'=> 'required',
            'cel'=> 'required',
            'departamento'=> 'required',
            'municipio'=> 'required',
            'foto'=> 'required|mimes:jpg,png',
            'email' => 'required',
          ]);
        $dato = new Solicitante();
        $Cedula = 0;
        $Cedula = substr(str_shuffle("1234567890"),0,14);
        $dato->fecha = $request->fecha ;
        $dato->name = $request->name ;
        $dato->apellido = $request->apellido ;
        $dato->direccion = $request->direccion ;
        $dato->cel = $request->cel ;
        $departamento = "" ;
        $type = $request['departamento'];

        switch ($type) {
            case 1:
                $departamento = "Alta Verapaz" ;
                break;
            case 2:
                $departamento = "Baja Verapaz" ;
                break;
            case 3:
                $departamento = "Chimaltenango" ;
                break;
            case 4:
                $departamento = "Chiquimula" ;
                break;
            case 5:
                $departamento = "Petén" ;
                break;
            case 6:
                $departamento = "Progreso" ;
                break;
            case 7:
                $departamento = "Quiché" ;
                break;
            case 8:
                $departamento = "Escuintla" ;
                break;
            case 9:
                $departamento = "Guatemala" ;
                break;
            case 10:
                $departamento = "Huehuetenango" ;
                break;
            case 11:
                $departamento = "Izabal" ;
                break;
            case 12:
                $departamento = "Jalapa" ;
                break;
            case 13:
                $departamento = "Jutiapa" ;
                break;
            case 14:
                $departamento = "Quetzaltenango" ;
                break;
            case 15:
                $departamento = "Retalhuleu" ;
                break;
            case 16:
                $departamento = "Sacatepéquez" ;
                break;
            case 17:
                $departamento = "San Marcos" ;
                break;
            case 18:
                $departamento = "Santa Rosa" ;
                break;
            case 19:
                $departamento = "Sololá" ;
                break;
            case 20:
                $departamento = "Suchitepéquez" ;
                break;
            case 21:
                $departamento = "Totonicapán" ;
                break;
            case 22:
                $departamento = "Zacapa" ;
                break;
        }

        $dato->municipio = $request->municipio ;
        $dato->foto = $request->foto ;
        if($request->hasFile('foto')){
            $dato['foto']=$request->file('foto')->store('uploads','public');
       }
        $dato->email = $request->email ;
        $password = "";
        $password = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"),rand(0,61),8);



        $dato = Solicitante::create([
            'Cedula'=>$Cedula,
            'fecha'=>$dato['fecha'],
            'name'=>$dato['name'],
            'apellido'=>$dato['apellido'],
            'direccion'=>$dato['direccion'],
            'cel'=>$dato['cel'],
            'departamento'=>$departamento,
            'municipio'=>$dato['municipio'],
            'foto'=>$dato['foto'],
            'email'=>$dato['email'],
            'password'=>$password,
        ]);

        $dato = new User();
        $dato->name = $request->name ;
        $dato->email = $request->email ;
        $passwordcrypt = Hash::make($password);
        $estado=0;
        $dato = User::create([
            'name'=>$dato['name'],
            'email'=>$dato['email'],
            'password'=>$passwordcrypt,
            'estado'=>$estado,
        ]);

        $dato->roles()->attach(Role::where('name', 'usuario')->first());

        return back()->with('success', 'Guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $dato = User::find($id);
        return view('solicitantes.edit',compact('dato'));
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
        $dato = User::find($id);
        $dato->name = $request->get('name');
        $dato->email = $request->get('email');
        $dato->password = $request->get('password');
        $estado = 0;
        $type = $request['type'];
        switch ($type) {
            case 1:
                $estado = 1;
                break;

            case 2:
                $estado = 2;
                break;

            default:
                $estado = 0;
                break;

                break;
        }

        $dato->estado = $estado;

        $dato->save();

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
