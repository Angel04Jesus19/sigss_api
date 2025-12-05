<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * POST /api/login
     * Campos esperados: email, password
     */
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        // TODO: AJUSTAR nombres de tabla y columnas a tu esquema real
        $user = DB::table('Usuarios')
            ->join('Roles', 'Usuarios.IdRol', '=', 'Roles.IdRol')
            ->select(
                'Usuarios.IdUsuario as id',
                'Usuarios.NombreCompleto as nombre',
                'Usuarios.CorreoInstitucional as email',
                'Roles.NombreRol as rol',
                'Usuarios.PasswordHash as password_hash'
            )
            ->where('Usuarios.CorreoInstitucional', $email)
            ->first();

        if (!$user) {
            return response()->json([
                'ok'    => false,
                'error' => 'Usuario o contraseña incorrectos.',
            ], 401);
        }

        // Si guardas la contraseña en texto plano (NO recomendado), cambia esto por:
        // if ($password !== $user->password_hash) { ... }
        if (!Hash::check($password, $user->password_hash)) {
            return response()->json([
                'ok'    => false,
                'error' => 'Usuario o contraseña incorrectos.',
            ], 401);
        }

        return response()->json([
            'ok'   => true,
            'user' => [
                'id'    => $user->id,
                'name'  => $user->nombre,
                'email' => $user->email,
                'role'  => $user->rol, // por ejemplo: "student", "staff", "head"
            ],
        ]);
    }
}
