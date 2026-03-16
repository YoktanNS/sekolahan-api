<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Requests\Kelas\KelasStoreRequest;
use App\Http\Requests\Kelas\KelasUpdateRequest;
use App\Http\Resources\KelasResource;
use App\Http\Resources\KelasCollection;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::paginate(10);
        return new KelasCollection($kelas);
    }

    public function store(KelasStoreRequest $request)
    {
        $kelas = Kelas::create($request->validated());
        return (new KelasResource($kelas))->response()->setStatusCode(201);
    }

    public function show(Kelas $kelas)
    {
        return new KelasResource($kelas);
    }

    public function update(KelasUpdateRequest $request, Kelas $kelas)
    {
        $kelas->update($request->validated());
        return new KelasResource($kelas);
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return response()->json(null, 204);
    }
}