<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%$search%")
                  ->orWhere('last_name', 'like', "%$search%")
                  ->orWhere('username', 'like', "%$search%");
        }

        $users = $query->get();

        // Calculamos la edad y formateamos los datos
        $formattedUsers = $users->map(function ($user) 
        {
            return [
                'nombre' => $user->name,
                'email' => $user->email,
                'activo' => $user->activo,
                'bloqueado' => $user->bloqueado,
                'nombre_persona' => $user->nombre_persona,
                'apellido_persona' => $user->apellido_persona,
                'fecha_nacimiento' => $user->fecha_nacimiento,
                'edad' => $user->fecha_nacimiento->age,
                'perfiles' => $user->perfiles()->pluck('nombre')->toArray()
            ];
        });

        return response()->json($formattedUsers);
    }

    public function update(Request $request)
    {
        $request->validate([
            'password_actual' => 'required|string',
            'password_nuevo' => 'required|string|min:8|max:16',
        ]);

        $user = auth()->user();

        // Verificar si la contraseña actual coincide
        if (!Hash::check($request->password_actual, $user->password)) {
            return response()->json(['error' => 'La contraseña actual es incorrecta.'], 400);
        }

        // Cambiar la contraseña
        $user->password = Hash::make($request->password_nuevo);
        $user->save();

        return response()->json(['message' => 'Contraseña cambiada correctamente.']);
    }

    public function delete()
    {
        // Borrar 100 usuarios al azar
        $usersToDelete = User::inRandomOrder()->limit(100)->get();

        foreach ($usersToDelete as $user) {
            $user->delete();
        }

        return response()->json(['message' => 'Usuarios borrados correctamente.']);
    }
}
