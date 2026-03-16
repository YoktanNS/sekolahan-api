<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Siswa; 
use Illuminate\Http\Request;
use App\Http\Requests\Siswa\SiswaStoreRequest;
use App\Http\Requests\Siswa\SiswaUpdateRequest;
use App\Http\Resources\SiswaResource;
use App\Http\Resources\SiswaCollection;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')->paginate(10);
        return new SiswaCollection($siswa);
    }

    public function store(SiswaStoreRequest $request) // Gunakan di sini
    {
    $validated = $request->validated();
    $siswa = Siswa::create($validated);
    return new SiswaResource($siswa);
    }
    public function show(Siswa $siswa)
    {
        return new SiswaResource($siswa->load('kelas'));
    }

    public function update(SiswaUpdateRequest $request, Siswa $siswa)
    {
        $siswa->update($request->validated());
        return new SiswaResource($siswa);
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return response()->json(null, 204);
    }
}