<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $plan = Plan::create($validated);

        return redirect()->route('plans.index');
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
    public function edit(Plan $plan)
    {
        return view('plans.edit', compact('plan'));
    }

    /**
     * função de edição de plano
     *
     * @param Request $request
     * @param Plan $plan
     * @return void
     */
    public function update(Request $request, Plan $plan)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric|min:0',
        ]);

        $plan->update($validated);

        return redirect()->route('plans.index');
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
