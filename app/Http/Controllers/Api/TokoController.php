<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TokoResource;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tokos = Toko::latest()->get();
        return response()->json([
            'data' => TokoResource::collection($tokos),
            'message' => 'Fetch all tokos',
            'success' => true
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:155',
            'user_id' => 'required',
            'alamat' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'message' => $validator->errors(),
                'success' => false
            ]);
        }

        $toko = Toko::create([
            'nama' => $request->get('nama'),
            'user_id' => $request->get('user_id'),
            'alamat' => $request->get('alamat'),
        ]);

        return response()->json([
            'data' => new TokoResource($toko),
            'message' => 'Toko created successfully.',
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function show(Toko $toko)
    {
        return response()->json([
            'data' => new TokoResource($toko),
            'message' => 'Data toko found',
            'success' => true
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function edit(Toko $toko)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Toko $toko)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:155',
            'alamat' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'message' => $validator->errors(),
                'success' => false
            ]);
        }

        $toko->update([
            'nama' => $request->get('nama'),
            'alamat' => $request->get('alamat'),
        ]);

        return response()->json([
            'data' => new TokoResource($toko),
            'message' => 'Toko updated successfully',
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toko $toko)
    {
        $toko->delete();

        return response()->json([
            'data' => [],
            'message' => 'Toko deleted successfully',
            'success' => true
        ]);
    }
}
