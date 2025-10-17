<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KategoriProperty;
use App\Models\Property;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Categories",
 *     description="API for managing property categories"
 * )
 *
 * @OA\Get(
 *     path="/api/categories",
 *     tags={"Categories"},
 *     summary="Get all categories",
 *     @OA\Response(response=200, description="List of categories")
 * )
 *
 * @OA\Post(
 *     path="/api/categories",
 *     tags={"Categories"},
 *     summary="Create category",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name"},
 *             @OA\Property(property="name", type="string", example="Rumah")
 *         )
 *     ),
 *     @OA\Response(response=201, description="Category created")
 * )
 *
 * @OA\Get(
 *     path="/api/categories/{id}",
 *     tags={"Categories"},
 *     summary="Get category by ID",
 *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
 *     @OA\Response(response=200, description="Category data"),
 *     @OA\Response(response=404, description="Not found")
 * )
 *
 * @OA\Put(
 *     path="/api/categories/{id}",
 *     tags={"Categories"},
 *     summary="Update category",
 *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(@OA\Property(property="name", type="string", example="Apartemen"))
 *     ),
 *     @OA\Response(response=200, description="Category updated")
 * )
 *
 * @OA\Delete(
 *     path="/api/categories/{id}",
 *     tags={"Categories"},
 *     summary="Delete category",
 *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
 *     @OA\Response(response=200, description="Category deleted")
 * )
 */

class KategoriPropertyController extends Controller
{
    public function index()
    {
        $data = KategoriProperty::get();
        for ($i=0; $i < count($data); $i++) { 
            $countProperty = Property::where('kategori_id', $data[$i]->id)
                ->count();
            $data[$i]->total_property = $countProperty;
        }
        return response()->json([
            'success' => true,
            'message' => 'Daftar kategori property',
            'data' => $data
        ]);
    }

    public function categoryProperty()
    {
        $kategori = KategoriProperty::limit(4)->get();

        for ($i=0; $i < count($kategori); $i++) { 
            $kategori[$i]['property'] = Property::where('kategori_id', $kategori[$i]->id)->limit(3)->get();
        }

        return response()->json([
            'success' => true,
            'message' => 'Daftar kategori property',
            'data' => $kategori
        ]);
    }
}
