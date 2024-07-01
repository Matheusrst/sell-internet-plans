<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * controller de manutenção
 */
class MaintenanceController extends Controller
{
    /**
     * retornar a view maintanences index
     *
     * @return void
     */
    public function index()
    {
        $maintenances = Maintenance::all();
        return view('maintenances.index', compact('maintenances'));
    }

    /**
     * retornar formulario para criação de uma manutenção
     *
     * @return void
     */
    public function create()
    {
        $customers = User::where('user_type', 'customer')->get();
        return view('maintenances.create', compact('customers'));
    }

    /**
     * função paara criar uma manutenção
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'scheduled_at' => 'required|date',
        ]);

        Maintenance::create($request->all());

        return redirect()->route('maintenances.index')->with('success', 'Manutenção agendada com sucesso.');
    }

    /**
     * visualizar manutenções
     *
     * @param [type] $id
     * @return void
     */
    public function show($id)
    {
        $maintenance = Maintenance::with('user')->findOrFail($id);
        return view('maintenances.show', compact('maintenance'));
    }

    /**
     * editar manutenções criadas
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $customers = User::where('user_type', 'customer')->get();

        return view('maintenances.edit', compact('maintenance', 'customers'));
    }

    /**
     * salvar edição das manutenções 
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
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

        return redirect()->route('maintenances.index')->with('success', 'Manutenção atualizada com sucesso.');
    }

    /**
     * apagar uma manutenção
     *
     * @param [type] $id
     * @return void
     */
    public function destroy($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->delete();

        return redirect()->route('maintenances.index')->with('success', 'Manutenção excluída com sucesso.');
    }

    /**
     * o usuario poder visualizar suas manutenções agendada
     *
     * @return void
     */
    public function customerMaintenances()
    {
        $user = Auth::user();
        $maintenances = Maintenance::where('user_id', $user->id)->get();

        return view('maintenances.customer_maintenances', compact('maintenances'));
    }
}
