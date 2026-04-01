<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function index()
    {
        $user = User::paginate(10);
        return new UserCollection($user);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:admin,guru',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        $user = new User();
        $user->type = $request->type;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();

        return (new UserResource($user))->response()->setStatusCode(201);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:admin,guru',
            'username' => 'required|string|unique:users,username,' . $user->id,
            'password' => 'nullable|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        $user->type = $request->type;
        $user->username = $request->username;
        
        if ($request->has('password') && !empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Username atau password salah'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Gagal membuat token'], 500);
        }

        return response()->json([
            'message' => 'Login berhasil',
            'token' => $token
        ]);
    }

    /**
     * Ambil data user yang sedang login (me)
     */
    public function me()
    {
        return response()->json(auth()->guard('api')->user());
    }

    /**
     * Fungsi Logout
     */
    public function logout()
    {
        // Hancurkan token
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json([
            'message' => 'Berhasil Logout'
        ]);
    }
}