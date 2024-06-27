<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\User;

class MaintenanceController extends Controller
{
    public function index()
    {
        $maintenances = Maintenance::with('user')->get();
        return view('maintenances.index', compact('maintenances'));
    }

    public function create()
    {
        $customers = User::where('user_type', 'customer')->get();
        return view('maintenances.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'scheduled_at' => 'required|date',
        ]);

        Maintenance::create($request->all());

        return redirect()->route('maintenances.index')->with('success', 'Manutenção agendada com sucesso!');
    }

    public function show($id)
    {
        $maintenance = Maintenance::with('user')->findOrFail($id);
        return view('maintenances.show', compact('maintenance'));
    }

    public function edit($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $customers = User::where('user_type', 'customer')->get();
        return view('maintenances.edit', compact('maintenance', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'scheduled_at' => 'required|date',
        ]);

        $maintenance = Maintenance::findOrFail($id);
        $maintenance->update($request->all());

        return redirect()->route('maintenances.index')->with('success', 'Manutenção atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->delete();

        return redirect()->route('maintenances.index')->with('success', 'Manutenção excluída com sucesso!');
    }
}
