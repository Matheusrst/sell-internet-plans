<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    /**
     * index da paggina de planos
     *
     * @return void
     */
    public function index()
    {
        $plans = Plan::all();
        if (auth()->user()->user_type == 'customer') {
            return view('customer_plans', compact('plans'));
        }
        return view('plans.index', compact('plans'));
    }

    /**
     * redirecionamento para a view de criação de produtos
     *
     * @return void
     */
    public function create()
    {
        return view('plans.create');
    }

    /**
     * função de criação de produtos
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'base_price' => 'required|numeric',
            'base_speed' => 'required|string|max:255'
        ]);

        Plan::create($request->all());

        return redirect()->route('plans.index')->with('success', 'Plano criado com sucesso.');
    }

    /**
     * detalhes do plano para o  admin
     *
     * @param [type] $id
     * @return void
     */
    public function show($id)
    {
        $plan = Plan::findOrFail($id);
        if (auth()->user()->user_type == 'customer') {
            return view('customer_plan_details', compact('plan'));
        }
        return view('plans.show', compact('plan'));
    }

    /**
     * redirecionamento para a view de edição de plano
     *
     * @param Plan $plan
     * @return void
     */
    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        return view('plans.edit', compact('plan'));
    }

    /**
     * função de edição de plano
     *
     * @param Request $request
     * @param Plan $plan
     * @return void
     */
    public function update(Request $request, $id)
    {
        $plan = Plan::findOrFail($id);
        
        $plan->update($request->only(['name', 'description', 'base_price', 'base_speed']));
        
        return redirect()->route('plans.show', $plan->id)->with('success', 'Plano atualizado com sucesso!');
    }

    /**
     * função para visualizar planos comprados
     *
     * @return void
     */
    public function purchasedPlans()
    {
        $user = Auth::user();
        $plans = $user->plans()->get();

        return view('plans.purchased_plans', compact('plans'));
    }

    /**
     * função de exclusão de plano
     *
     * @param Plan $plan
     * @return void
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();

        return redirect()->route('plans.index');
    }
}
