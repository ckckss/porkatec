<?php

namespace App\Http\Controllers;

use App\Models\Cubricion;
use App\Models\FichaCerda;
use App\Models\Medicamento;
use App\Models\Nave;
use App\Models\Tratamiento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    public function buscador(Request $request)
    {
        $query = $request->input('query');

        $cerdas = FichaCerda::where('id_cerda', $query)
            ->orWhere('nfc', $query)
            ->get();

        return response()->json($cerdas);
    }

    //****************************************************************************//
    //**                                CERDAS                                   **/
    //****************************************************************************//
    // Recoje todas las cerdas
    public function get_cerdas()
    {
        $cerdas = FichaCerda::all();

        if ($cerdas->isEmpty()) {
            $data = [
                'message' => 'No hay cerdas',
                'status' => 200
            ];
            return response()->json($data, 200);
        }

        return response()->json($cerdas, 200);
    }
    public function get_cerda($id_cerda)
    {
        $cerda = FichaCerda::find($id_cerda);

        if (!$cerda) {
            $data = [
                'message' => 'Cerda no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Cerda encontrada',
            'status' => 200,
            'cerda' => $cerda
        ];
        return response()->json($cerda, 200);
    }
    // Valida datos y guarda una cerda
    public function store_cerda(Request $request)
    {
        // Valida los datos que recojo del request y guarda en la variable true o false
        $validator = Validator::make(request()->all(), [
            'id_nave' => 'required',
            'nfc' => 'required',
        ]);
        // Si el validador falla, se devuelve un mensaje de error y estado 400
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        // Creo la cerda y la guardo en una variable
        $cerda = FichaCerda::create([
            'id_nave' => $request->id_nave,
            'nfc' => $request->nfc
        ]);
        // Si la cerda esta vacia devuelve error y estado 500
        if (!$cerda) {
            $data = [
                'message' => 'Error al crear la cerda',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        // Guardo los datos de la cerda, el mensaje y el estado en $data
        $data = [
            'message' => 'Cerda guardada correctamente',
            'status' => 201,
            'cerda' => $cerda
        ];
        // Devuelvo la respuesta con los datos y el estado 201
        return response()->json($data, 201);
    }

    public function delete_cerda($id)
    {
        $cerda = FichaCerda::find($id);
        //Compruebo que la cerda existe, sino devuelvo mensaje de error con estado 404
        if (!$cerda) {
            $data = [
                'message' => 'Cerda no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        // Elimino cerda
        $cerda->delete();
        // Creo la variable $data para devolverla con la informacion \\
        $data = [
            'message' => 'Cerda eliminada',
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function update_cerda(Request $request, $id)
    {
        $cerda = FichaCerda::find($id);

        //Compruebo que la cerda existe, sino devuelvo mensaje de error con estado 404
        if (!$cerda) {
            $data = [
                'message' => 'Cerda no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make(request()->all(), [
            'id_nave' => 'required',
            'nfc' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $cerda->id_nave = $request->id_nave;
        $cerda->nfc = $request->nfc;

        $cerda->save();

        $data = [
            'message' => 'Informacion de la cerda actualizada con exito',
            'status' => 200,
            'cerda' => $cerda
        ];
        return response()->json($data, 201);
    }

    //****************************************************************************//
    //**                                USUARIOS                                 **/
    //****************************************************************************//
    // Recoje todos los usuarios
    public function get_users()
    {
        // Obtener usuarios con sus roles
        $users = User::with('roles')->get();

        if ($users->isEmpty()) {
            $data = [
                'message' => 'No existen usuarios',
                'status' => 200
            ];
            return response()->json($data, 200);
        }

        // Estructurar la respuesta incluyendo los roles
        $usersData = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->roles->pluck('name')->first() // Suponiendo que cada usuario tiene un solo rol
            ];
        });

        return response()->json($usersData, 200);
    }

    // Recoje un usuario a partir de la id
    public function get_user($id)
    {
        $user = User::find($id);

        if (!$user) {
            $data = [
                'message' => 'Cerda no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Cerda encontrada',
            'status' => 200,
            'cerda' => $user
        ];
        return response()->json($user, 200);
    }

    // Crea y guarda el usuario
    public function store_user(Request $request)
    {
        // Valida los datos que recojo del request y guarda en la variable true o false
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        // Si el validador falla, se devuelve un mensaje de error y estado 400
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $hashedPassword = bcrypt($request->password);
        // Creo el usuario y la guardo en una variable
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
        ]);
        // Si el usuario esta vacia devuelve error y estado 500
        if (!$user) {
            $data = [
                'message' => 'Error al crear el usuario',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        $user->assignRole($request->role);
        // Guardo los datos del usuario, el mensaje y el estado en $data
        $data = [
            'message' => 'Usuario guardada correctamente',
            'status' => 201,
            'user' => $user
        ];
        // Devuelvo la respuesta con los datos y el estado 201
        return response()->json($data, 201);
    }

    // Elimina un usuario a partir de la id
    public function delete_user($id)
    {
        $user = User::find($id);
        // Compruebo que el usuario existe, sino devuelvo mensaje de error con estado 404
        if (!$user) {
            $data = [
                'message' => 'Usuario no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        // Elimino usuario
        $user->delete();
        // Creo la variable $data para devolverla con la informacion \\
        $data = [
            'message' => 'Usuario eliminado',
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    // Actualizo la informacion de un usuario a partir de la id
    public function update_user(Request $request, $id)
    {

        $user = User::find($id);

        //Compruebo que el usuario existe, si no, devuelvo mensaje de error con estado 404
        if (!$user) {
            $data = [
                'message' => 'Usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        $data = [
            'message' => 'Informacion del usuario actualizada con exito',
            'status' => 200,
            'usuario' => $user
        ];
    }


    //****************************************************************************//
    //**                                NAVES                                    **/
    //****************************************************************************//


    // Recoje todas las naves
    public function get_naves()
    {
        $naves = Nave::all();

        if ($naves->isEmpty()) {
            $data = [
                'message' => 'No existen naves',
                'status' => 200
            ];
            return response()->json($data, 200);
        }

        return response()->json($naves, 200);
    }

    // Recoje una nave a partir de la id
    public function get_nave($id)
    {
        $nave = Nave::find($id);

        if (!$nave) {
            $data = [
                'message' => 'Nave no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Nave encontrada',
            'status' => 200,
            'nave' => $nave
        ];
        return response()->json($nave, 200);
    }

    // Crea y guarda la nave
    public function store_nave(Request $request)
    {
        // Valida los datos que recojo del request y guarda en la variable true o false
        $validator = Validator::make(request()->all(), [
            'nombre' => 'required',
        ]);
        // Si el validador falla, se devuelve un mensaje de error y estado 400
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        // Creo la nave y la guardo en una variable
        $nave = Nave::create([
            'nombre' => $request->nombre
        ]);
        // Si la nave esta vacia devuelve error y estado 500
        if (!$nave) {
            $data = [
                'message' => 'Error al crear la nave',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        // Guardo los datos de la nave, el mensaje y el estado en $data
        $data = [
            'message' => 'Nave guardada correctamente',
            'status' => 201,
            'nave' => $nave
        ];
        // Devuelvo la respuesta con los datos y el estado 201
        return response()->json($data, 201);
    }

    // Elimina una nave a partir de la id
    public function delete_nave($id)
    {
        $nave = Nave::find($id);
        // Compruebo que la nave existe, sino devuelvo mensaje de error con estado 404
        if (!$nave) {
            $data = [
                'message' => 'Nave no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        // Elimino nave
        $nave->delete();
        // Creo la variable $data para devolverla con la informacion
        $data = [
            'message' => 'Nave eliminada',
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    // Actualizo la informacion de una nave a partir de la id
    public function update_nave(Request $request, $id)
    {
        $nave = Nave::find($id);

        //Compruebo que la nave existe, si no, devuelvo mensaje de error con estado 404
        if (!$nave) {
            $data = [
                'message' => 'Nave no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make(request()->all(), [
            'nombre' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $nave->nombre = $request->nombre;

        $nave->save();

        $data = [
            'message' => 'Informacion de la nave actualizada con exito',
            'status' => 200,
            'nave' => $nave
        ];
    }

    //****************************************************************************//
    //**                                Cubricion                              **/
    //****************************************************************************//
    // Recoje todas las Cubricion
    public function get_cubriciones()
    {
        $cubricions = Cubricion::all();

        if ($cubricions->isEmpty()) {
            $data = [
                'message' => 'No hay cubricion',
                'status' => 200
            ];
            return response()->json($data, 200);
        }

        return response()->json($cubricions, 200);
    }

    public function get_cubricion($id_cerda)
    {
        $cubricion = Cubricion::where('id_cerda', $id_cerda)->get();

        if (!$cubricion) {
            $data = [
                'message' => 'Cubricion no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Cubricion encontrada',
            'status' => 200,
            'cubricion' => $cubricion
        ];
        return response()->json($cubricion, 200);
    }
    // Valida datos y guarda una cubricion
    public function store_cubricion(Request $request)
    {
        // Valida los datos que recojo del request y guarda en la variable true o false
        $validator = Validator::make(request()->all(), [
            'id_cerda' => 'required',
            'fecha_cubricion' => 'required|date',
        ]);

        // Si el validador falla, se devuelve un mensaje de error y estado 400
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        // Creo la cubricion y la guardo en una variable
        $cubricion = Cubricion::create([
            'id_cerda' => $request->id_cerda,
            'fecha_cubricion' => $request->fecha_cubricion,
            // Resto de campos opcional, se pueden agregar o no dependiendo de la situación
        ]);

        // Guardo los datos de la cubricion, el mensaje y el estado en $data
        $data = [
            'message' => 'Cubricion guardada correctamente',
            'status' => 201,
            'cubricion' => $cubricion
        ];

        // Devuelvo la respuesta con los datos y el estado 201
        return response()->json($data, 201);
    }
    public function delete_cubricion($id)
    {
        $cubricion = Cubricion::find($id);
        //Compruebo que la cubricion existe, sino devuelvo mensaje de error con estado 404
        if (!$cubricion) {
            $data = [
                'message' => 'Cubricion no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        // Elimino cubricion
        $cubricion->delete();
        // Creo la variable $data para devolverla con la informacion \\
        $data = [
            'message' => 'Estudiante eliminado',
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function update_cubricion(Request $request, $id)
    {
        $cubricion = Cubricion::find($id);

        // Compruebo que la cerda existe, sino devuelvo mensaje de error con estado 404
        if (!$cubricion) {
            $data = [
                'message' => 'Cubricion no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make(request()->all(), [
            'fecha_cubricion' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        // Actualizar los campos solo si están presentes en la solicitud
        if ($request->has('fecha_cubricion')) {
            $cubricion->fecha_cubricion = $request->fecha_cubricion;
        }
        if ($request->has('estado')) {
            $cubricion->estado = $request->estado;
        }
        if ($request->has('fecha_parto')) {
            $cubricion->fecha_parto = $request->fecha_parto;
        }
        if ($request->has('nacidos_vivos')) {
            $cubricion->nacidos_vivos = $request->nacidos_vivos;
        }
        if ($request->has('nacidos_muertos')) {
            $cubricion->nacidos_muertos = $request->nacidos_muertos;
        }
        if ($request->has('nacidos_momificados')) {
            $cubricion->nacidos_momificados = $request->nacidos_momificados;
        }
        if ($request->has('num_adoptados')) {
            $cubricion->num_adoptados = $request->num_adoptados;
        }
        if ($request->has('num_cedidos')) {
            $cubricion->num_cedidos = $request->num_cedidos;
        }
        if ($request->has('num_bajas')) {
            $cubricion->num_bajas = $request->num_bajas;
        }
        if ($request->has('fecha_destete')) {
            $cubricion->fecha_destete = $request->fecha_destete;
        }
        if ($request->has('num_destetados')) {
            $cubricion->num_destetados = $request->num_destetados;
        }

        $cubricion->save();

        $data = [
            'message' => 'Informacion de la cubricion actualizada con éxito',
            'status' => 200,
            'cubricion' => $cubricion
        ];
        return response()->json($data, 200);
    }




    //****************************************************************************//
    //**                                Medicamentos                             **/
    //****************************************************************************//
    // Retrieve all Medicamentos
    public function get_medicamentos()
    {
        $medicamentos = Medicamento::all();

        if ($medicamentos->isEmpty()) {
            $data = [
                'message' => 'No hay medicamentos',
                'status' => 200
            ];
            return response()->json($data, 200);
        }

        return response()->json($medicamentos, 200);
    }

    // Retrieve a single Medicamento by ID
    public function get_medicamento($id)
    {
        $medicamento = Medicamento::find($id);

        if (!$medicamento) {
            $data = [
                'message' => 'Medicamento no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Medicamento encontrado',
            'status' => 200,
            'medicamento' => $medicamento
        ];
        return response()->json($data, 200);
    }

    // Validate and store a new Medicamento
    public function store_medicamento(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'dosis' => 'required|string',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $medicamento = Medicamento::create([
            'nombre' => $request->nombre,
            'dosis' => $request->dosis,
        ]);

        if (!$medicamento) {
            $data = [
                'message' => 'Error al crear el medicamento',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'message' => 'Medicamento guardado correctamente',
            'status' => 201,
            'medicamento' => $medicamento
        ];
        return response()->json($data, 201);
    }

    // Delete a Medicamento by ID
    public function delete_medicamento($id)
    {
        $medicamento = Medicamento::find($id);

        if (!$medicamento) {
            $data = [
                'message' => 'Medicamento no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $medicamento->delete();

        $data = [
            'message' => 'Medicamento eliminado',
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    // Update a Medicamento by ID
    public function update_medicamento(Request $request, $id)
    {
        $medicamento = Medicamento::find($id);

        if (!$medicamento) {
            $data = [
                'message' => 'Medicamento no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'sometimes|required|string',
            'dosis' => 'sometimes|required|string',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('nombre')) {
            $medicamento->nombre = $request->nombre;
        }
        if ($request->has('dosis')) {
            $medicamento->dosis = $request->dosis;
        }

        $medicamento->save();

        $data = [
            'message' => 'Información del medicamento actualizada con éxito',
            'status' => 200,
            'medicamento' => $medicamento
        ];
        return response()->json($data, 200);
    }

    //****************************************************************************//
    //**                                Tratamientos                            **//
    //****************************************************************************//
    public function get_tratamientos()
    {
        $tratamientos = Tratamiento::all();

        if ($tratamientos->isEmpty()) {
            $data = [
                'message' => 'No hay medicamentos',
                'status' => 200
            ];
            return response()->json($data, 200);
        }

        return response()->json($tratamientos, 200);
    }

    // Retrieve a single Medicamento by ID
    public function get_tratamiento($id)
    {
        $tratamiento = Tratamiento::find($id);

        if (!$tratamiento) {
            $data = [
                'message' => 'Tratamiento no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Tratamiento encontrado',
            'status' => 200,
            'medicamento' => $tratamiento
        ];
        return response()->json($data, 200);
    }

    public function get_tratamiento_cerda($id)
    {
        $cerda = FichaCerda::find($id);

        if (!$cerda) {
            $data = [
                'message' => 'Cerda no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        // Obtener los tratamientos de la cerda con los nombres de los medicamentos asociados
        $tratamientos = $cerda->tratamientos->map(function ($tratamiento) {
            // Obtener el nombre del medicamento asociado al tratamiento
            if ($tratamiento->medicamento) {
                // Obtener el nombre del medicamento asociado al tratamiento
                $nombreMedicamento = $tratamiento->medicamento->nombre;

                // Agregar el nombre del medicamento al tratamiento
                $tratamiento->nombre_medicamento = $nombreMedicamento;
            } else {
                // Si el medicamento asociado no existe, establecer el nombre como null
                $tratamiento->nombre_medicamento = null;
            }
            return $tratamiento;
        });

        $data = [
            'message' => 'Tratamientos de la cerda encontrados',
            'status' => 200,
            'tratamientos' => $tratamientos
        ];
        return response()->json($data, 200);
    }



    // Validate and store a new Medicamento
    public function store_tratamiento(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_medicamento' => 'nullable|string',
            'id_cerda' => 'required|string',
            'fecha_comienzo' => 'required|date',
            'fecha_conclusion' => 'nullable|date',
            'enfermedad' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        // Si la fecha de comienzo no se proporciona, se establece como la fecha actual
        $fecha_comienzo = $request->fecha_comienzo ? $request->fecha_comienzo : now()->toDateString();

        $tratamiento = Tratamiento::create([
            'id_medicamento' => $request->id_medicamento,
            'id_cerda' => $request->id_cerda,
            'fecha_comienzo' => $fecha_comienzo,
            'fecha_conclusion' => $request->fecha_conclusion,
            'enfermedad' => $request->enfermedad,
        ]);

        if (!$tratamiento) {
            $data = [
                'message' => 'Error al crear el tratamiento',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'message' => 'Tratamiento guardado correctamente',
            'status' => 201,
            'tratamiento' => $tratamiento
        ];
        return response()->json($data, 201);
    }


    // Delete a Medicamento by ID
    public function delete_tratamiento($id)
    {
        $medicamento = Medicamento::find($id);

        if (!$medicamento) {
            $data = [
                'message' => 'Medicamento no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $medicamento->delete();

        $data = [
            'message' => 'Medicamento eliminado',
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    // Update a Medicamento by ID
    public function update_tratamiento(Request $request, $id)
    {
        $tratamiento = Tratamiento::find($id);

        if (!$tratamiento) {
            $data = [
                'message' => 'Tratamiento no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'id_medicamento' => 'sometimes|required|integer|exists:medicamentos,id',
            'fecha_comienzo' => 'sometimes|required|date',
            'fecha_conclusion' => 'sometimes|nullable|date',
            'enfermedad' => 'sometimes|required|string',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('id_medicamento')) {
            $tratamiento->id_medicamento = $request->id_medicamento;
        }
        if ($request->has('fecha_comienzo')) {
            $tratamiento->fecha_comienzo = $request->fecha_comienzo;
        }
        if ($request->has('fecha_conclusion')) {
            $tratamiento->fecha_conclusion = $request->fecha_conclusion;
        }
        if ($request->has('enfermedad')) {
            $tratamiento->enfermedad = $request->enfermedad;
        }

        $tratamiento->save();

        $data = [
            'message' => 'Información del tratamiento actualizada con éxito',
            'status' => 200,
            'tratamiento' => $tratamiento
        ];
        return response()->json($data, 200);
    }
}
