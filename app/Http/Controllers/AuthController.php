<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

/**
 * @OA\Tag(
 *     name="Authentication",
 *     description="API for user and admin authentication"
 * )
 *
 * @OA\Post(
 *     path="/api/go-login",
 *     tags={"Authentication"},
 *     summary="Login as User or Admin",
 *     description="Authenticate user or admin by email and password. Redirects to appropriate route upon success.",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"email", "password"},
 *             @OA\Property(property="email", type="string", format="email", example="user@example.com"),
 *             @OA\Property(property="password", type="string", format="password", example="secret123")
 *         )
 *     ),
 *     @OA\Response(
 *         response=302,
 *         description="Redirects to dashboard or service page depending on role (User/Admin)"
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid email or password"
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error"
 *     )
 * )
 *
 * @OA\Post(
 *     path="/api/logout",
 *     tags={"Authentication"},
 *     summary="Logout current session",
 *     description="Logs out both web and admin guards, then redirects to login route.",
 *     @OA\Response(
 *         response=302,
 *         description="Redirects to login page after logout"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthenticated or session not found"
 *     )
 * )
 */

class AuthController extends Controller
{

    function loginView() {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        // Ambil data login
        $email = $request->input('email');
        $password = $request->input('password');

        // Cek apakah user biasa
        $user = \App\Models\User::where('email', $email)->first();
        $type = 'user';

        // Jika tidak ditemukan di tabel user, cek di admin
        if (!$user) {
            $user = \App\Models\Admin::where('email', $email)->first();
            $type = 'admin';
        }

        // Jika user tidak ditemukan sama sekali
        if (!$user) {
            return back()
                ->withInput()
                ->withErrors(['err' => 'Email or password is incorrect']);
        }

        // Validasi password
        if (decrypt($user->password) !== $password) {
            return back()
                ->withInput()
                ->withErrors(['err' => 'Email or password is incorrect']);
        }

        // Logout semua guard dulu untuk mencegah bentrok session
        Auth::guard('web')->logout();
        Auth::guard('admin')->logout();

        // Login sesuai jenis akun
        if ($type === 'user') {
            Auth::guard('web')->login($user);
            return redirect()->route('service')->with('success', 'Welcome back!');
        } else {
            Auth::guard('admin')->login($user);
            return redirect()->route('dashboard')->with('success', 'Welcome back, Admin!');
        }
    }


    function logout() {
        Auth::guard('web')->logout();
        Auth::guard('admin')->logout();
        return Redirect::route('login');
    }
}
