<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::latest()->paginate(10);
        return view('agents.index', compact('agents'));
    }

    public function create()
    {
        return view('agents.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nib' => 'required|string|max:255',
            'alamat' => 'required|string',
            'foto_profile' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'nama_perusahaan' => 'required|string|max:255',
            'email' => 'required|email|unique:agents,email',
            'telepon' => 'required|string|max:20',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'aktif' => 'required|boolean'
        ]);
        
        // Upload file foto_profile
        if ($request->hasFile('foto_profile')) {
            $file = $request->file('foto_profile');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image_agents'), $filename);
            $validated['foto_profile'] = 'image_agents/' . $filename;
        }
    
        // Upload foto tambahan ke folder public/agents
        if ($request->hasFile('foto')) {
            $file2 = $request->file('foto');
            $filename2 = time() . '_' . $file2->getClientOriginalName();
            $file2->move(public_path('image_agents'), $filename2);
            $validated['foto'] = 'image_agents/' . $filename2;
        }
        
        $validated['user_id'] = Auth::guard('admin')->user()->id;

        Agent::create($validated);

        return redirect()->route('agents.index')->with('success', 'Agent created successfully.');
    }

    public function edit(Agent $agent)
    {
        return view('agents.edit', compact('agent'));
    }

    public function update(Request $request, Agent $agent)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nib' => 'required|string|max:255',
            'alamat' => 'required|string',
            'foto_profile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nama_perusahaan' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:agents,email,' . $agent->id,
            'telepon' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'aktif' => 'nullable|boolean'
        ]);

        // Upload baru jika ada
        if ($request->hasFile('foto_profile')) {
            $validated['foto_profile'] = $request->file('foto_profile')->store('agents', 'public');
        }

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('agents', 'public');
        }

        $agent->update($validated);

        return redirect()->route('agents.index')->with('success', 'Agent updated successfully.');
    }

    public function destroy(Agent $agent)
    {
        $agent->delete();
        return redirect()->route('agents.index')->with('success', 'Agent deleted successfully.');
    }
}
