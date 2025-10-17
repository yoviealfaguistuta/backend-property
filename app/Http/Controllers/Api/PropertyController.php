<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{Property, KategoriProperty, Agent};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Tag(
 *     name="Properties",
 *     description="API for managing properties"
 * )
 *
 * @OA\Get(
 *     path="/api/properties",
 *     tags={"Properties"},
 *     summary="Get all properties",
 *     @OA\Response(response=200, description="List of properties")
 * )
 *
 * @OA\Post(
 *     path="/api/properties",
 *     tags={"Properties"},
 *     summary="Create new property",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"category_id", "agent_id", "title", "price", "whatsapp_number"},
 *             @OA\Property(property="category_id", type="integer", example=1),
 *             @OA\Property(property="agent_id", type="integer", example=2),
 *             @OA\Property(property="title", type="string", example="Rumah Minimalis di Bandung"),
 *             @OA\Property(property="price", type="number", example=250000000),
 *             @OA\Property(property="address", type="string", example="Jl. Cibiru No. 10"),
 *             @OA\Property(property="whatsapp_number", type="string", example="+628123456789"),
 *             @OA\Property(
 *                 property="details",
 *                 type="array",
 *                 @OA\Items(
 *                     @OA\Property(property="key", type="string", example="Kamar Tidur"),
 *                     @OA\Property(property="value", type="string", example="3")
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(response=201, description="Property created")
 * )
 *
 * @OA\Get(
 *     path="/api/properties/{id}",
 *     tags={"Properties"},
 *     summary="Get property by ID",
 *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
 *     @OA\Response(response=200, description="Property details"),
 *     @OA\Response(response=404, description="Not found")
 * )
 *
 * @OA\Put(
 *     path="/api/properties/{id}",
 *     tags={"Properties"},
 *     summary="Update property",
 *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
 *     @OA\RequestBody(
 *         @OA\JsonContent(@OA\Property(property="title", type="string", example="Rumah Baru Bandung"))
 *     ),
 *     @OA\Response(response=200, description="Property updated")
 * )
 *
 * @OA\Delete(
 *     path="/api/properties/{id}",
 *     tags={"Properties"},
 *     summary="Delete property",
 *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
 *     @OA\Response(response=200, description="Property deleted")
 * )
 */

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter dari query string
        $idKategori = $request->query('id_kategori');
        $idAgent = $request->query('id_agent');
        $limit = $request->query('limit');

        if ($limit == 0) {
            $limit = 10;
        }
    
        // Gunakan when() agar filter hanya aktif jika parameter dikirim
        $properties = Property::when($idKategori, function ($query, $idKategori) {
                return $query->where('kategori_id', $idKategori);
            })
            ->when($idAgent, function ($query, $idAgent) {
                return $query->where('agent_id', $idAgent);
            })
            ->limit($limit)
            ->get();
    
        return response()->json([
            'success' => true,
            'message' => 'Daftar property',
            'data' => $properties
        ]);
    }

    public function show($id)
    {
        // Ambil property berdasarkan ID
        $property = Property::with(['kategori', 'agent'])->find($id);

        // Jika property tidak ditemukan
        if (!$property) {
            return response()->json([
                'success' => false,
                'message' => 'Property tidak ditemukan',
            ], 404);
        }

        // Jika ditemukan, kirim datanya
        return response()->json([
            'success' => true,
            'message' => 'Detail property',
            'data' => $property
        ]);
    }
}
