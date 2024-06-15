<?php

namespace App\Http\Controllers;

use App\Mail\NewUserEmail;
use App\Models\Departamento;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function accounts()
    {
        $users = User::with('docentes', 'estudiantes')->get();
        dump($users);
        $departments = Departamento::with('areas')->get();
        //dump($departments);
        return view('admin.accounts')->with(['users' => $users, 'departments' => $departments]);
    }

    public function addUser(Request $request)
    {
        $request->validate(
            [
                'email'         => 'required|email|max:150|unique:Users',
                'name'          => 'required|max:150',
                'apellido'          => 'required|max:150',
                'boleta'        => 'required|digits:10|numeric',
                'rol'           => 'required'
            ],
            [
                'name.required'         => 'El nombre del usuario es requerido',
                'name.max'              => 'Los caracteres máximos para el nombre del usuario es de 150',
                'apellido.required'         => 'El apellido del usuario es requerido',
                'apellido.max'              => 'Los caracteres máximos para el apellido del usuario es de 150',
                'email.required'        => 'El correo electrónico es requerido',
                'email.email'           => 'El correo electrónico debe tener el siguiente formato correo@dominio.algo',
                'email.max'             => 'Los caracteres máximos para el correo electrónico es de 150',
                'email.unique'          => 'El correo electrónico ya existe',
                'boleta.required'       => 'La boleta es requerida',
                'boleta.digits'       => 'La boleta debe contener 10 digitos',
                'boleta.numeric'       => 'La boleta solo contiene digitos',
                'boleta.unique'       => 'La boleta ya esta registrada',
                'rol'                   => 'El tipo de usuario es requerido'
            ]
        );
        //Primero creo el estudiante o docente y luego el user
        $approved_emails = [
            'lopezjared936@gmail.com',
            'redonda.aguilar.edwin@gmail.com',
            'rodriguez.jimenez.jose.ricardo027@gmail.com'
        ];
        switch ($request->rol) {
            case 'Estudiante':
                if (Estudiante::find($request->boleta)) {
                    return badRequest("La boleta ya esta registrada");
                }
                $estudiante = new Estudiante();

                $estudiante->id_estudiante = $request->boleta;
                $estudiante->nombre = $request->name;
                $estudiante->apellido = $request->apellido;

                $estudiante->save();

                $user = new User();

                $user->id_user = sha1($request->email);
                $user->email = $request->email;
                $user->password = $request->boleta;
                $user->id_estudiante = $request->boleta;
                $user->rol = $request->rol;

                $user->save();


                if (in_array($request->email, $approved_emails)) {
                    Mail::to($request->email)->send(new NewUserEmail(user: $user, datos: $estudiante));
                }

                break;
            case 'Docente':
                if (Docente::find($request->boleta)) {
                    return badRequest("La boleta ya esta registrada");
                }
                if ($request->department == null) {
                    return badRequest('El departamento es requerido');
                }
                $docente = new Docente();

                $docente->id_docente = $request->boleta;
                $docente->nombre = $request->name;
                $docente->apellido = $request->apellido;
                $docente->id_departamento = $request->department;

                $docente->save();

                $user = new User();

                $user->id_user = sha1($request->email);
                $user->email = $request->email;
                $user->password = $request->boleta;
                $user->id_docente = $request->boleta;
                $user->rol = $request->rol;

                $user->save();

                if (in_array($request->email, $approved_emails)) {
                    Mail::to($request->email)->send(new NewUserEmail(user: $user, datos: $docente));
                }
                break;
            case 'Administrador':
                $user = new User();

                $user->id_user = sha1($request->email);
                $user->email = $request->email;
                $user->password = $request->boleta;
                $user->rol = $request->rol;

                $user->save();

                break;
        }
        return redirect()->back()->with(['success' => 'Cuenta creada con exito']);
    }

    public function destroyUser(Request $request)
    {
        try {
            switch ($request->rol) {
                case 'Estudiante':
                    $user = User::with('estudiantes')->where('id_user', $request->id_user)->firstOrFail();
                    if ($user) {
                        $user->estudiantes[0]->delete();
                        $user->delete();
                    }
                    break;

                case 'Docente':
                    $user = User::with('docentes')->where('id_user', $request->id_user)->firstOrFail();
                    if ($user) {
                        $user->docentes[0]->delete();
                        $user->delete();
                    }
                    break;
            }
        } catch (Exception $e) {
            return notFound($e->getMessage());
        }

        return redirect()->back()->with(['success' => 'Usuario eliminado con éxito']);
    }

    public function agregarSinodal()
    {
        $trabajosConSinodales = DB::table('sinodal_trabajoacademico')
            ->pluck('id_trabajoAcademico')
            ->toArray();

        // Obtener los trabajos académicos que no están en la tabla de sinodales
        $trabajos = DB::table('trabajoacademico')
            ->whereNotIn('id_trabajoAcademico', $trabajosConSinodales)
            ->get();

        return view('admin.agregarSinodal', ['trabajos' => $trabajos]);
    }
    public function addSinodales(Request $request)
    {
        $ttId = $request->input('tt_id');
        $sinodales = $request->input('sinodales', []);

        foreach ($sinodales as $sinodal) {
            try {
                DB::table('sinodal_trabajoacademico')->insert([
                    'id_sinodal' => $sinodal,
                    'id_trabajoAcademico' => $ttId,
                ]);
                #cambiar el status del trabajo academico
                DB::table('trabajoacademico')
                    ->where('id_trabajoAcademico', $ttId)
                    ->update(['estatus' => 'Sinodales asignados']);
            } catch (\Exception $e) {
                // Manejar errores de inserción, por ejemplo, claves foráneas no válidas
                return redirect()->back()->with('error', 'Error al agregar sinodales: ' . $e->getMessage());
            }
        }
        $sinodalesInfo = DB::table('docente')->whereIn('id_docente', $sinodales)->get();
        return redirect()->route('admin.ttDetails', ['id' => $ttId])
            ->with('success', 'Sinodales agregados correctamente.')->with('sinodales', $sinodalesInfo);
    }
    public function ttDetails($id)
    {
        $trabajo = DB::table('trabajoacademico')->where('id_trabajoAcademico', $id)->first();
        $sinodales = session('sinodales', []);
        return view('admin.ttDetails', ['trabajo' => $trabajo, 'sinodales' => $sinodales]);
    }
}
