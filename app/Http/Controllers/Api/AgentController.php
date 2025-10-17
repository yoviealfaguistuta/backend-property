<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\KategoriProperty;
use App\Models\Property;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Agents",
 *     description="API for managing property agents"
 * )
 *
 * @OA\Get(
 *     path="/api/agents",
 *     tags={"Agents"},
 *     summary="Get all agents",
 *     @OA\Response(response=200, description="List of agents")
 * )
 *
 * @OA\Post(
 *     path="/api/agents",
 *     tags={"Agents"},
 *     summary="Create new agent",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "phone"},
 *             @OA\Property(property="name", type="string", example="John Doe"),
 *             @OA\Property(property="phone", type="string", example="+628123456789"),
 *             @OA\Property(property="email", type="string", example="john@agent.com"),
 *             @OA\Property(property="photo", type="string", example="https://example.com/photo.jpg")
 *         )
 *     ),
 *     @OA\Response(response=201, description="Agent created")
 * )
 *
 * @OA\Get(
 *     path="/api/agents/{id}",
 *     tags={"Agents"},
 *     summary="Get agent by ID",
 *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
 *     @OA\Response(response=200, description="Agent details"),
 *     @OA\Response(response=404, description="Not found")
 * )
 *
 * @OA\Put(
 *     path="/api/agents/{id}",
 *     tags={"Agents"},
 *     summary="Update agent",
 *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
 *     @OA\RequestBody(
 *         @OA\JsonContent(@OA\Property(property="name", type="string", example="Jane Doe"))
 *     ),
 *     @OA\Response(response=200, description="Agent updated")
 * )
 *
 * @OA\Delete(
 *     path="/api/agents/{id}",
 *     tags={"Agents"},
 *     summary="Delete agent",
 *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
 *     @OA\Response(response=200, description="Agent deleted")
 * )
 */

class AgentController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->query('limit');

        if ($limit == 0) {
            $limit = 10;
        }

        $data = Agent::limit($limit)->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar agent',
            'data' => $data
        ]);
    }

    public function detail($id)
    {
        $data = Agent::where('id', $id)->first();

        $data['kategori'] = KategoriProperty::get();
        for ($i=0; $i < count($data['kategori']); $i++) { 
            $countProperty = Property::where('kategori_id', $data['kategori'][$i]->id)
                ->where('agent_id', $id)
                ->count();
            $data['kategori'][$i]->total_property = $countProperty;
        }

        return response()->json([
            'success' => true,
            'message' => 'Daftar agent',
            'data' => $data
        ]);
    }
}
