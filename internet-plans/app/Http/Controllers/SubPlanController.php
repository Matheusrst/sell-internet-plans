<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\SubPlan;
use Illuminate\Http\Request;

/**
 * controller dos sub-planos
 */
class SubPlanController extends Controller
{
    /**
     * formulario de criação de sub-planos
     *
     * @param Plan $plan
     * @return void
     */
    public function create(Plan $plan)
    {
        return view('subplans.create', compact('plan'));
    }

    /**
     * visualização para o menu do sub-plano
     *
     * @param [type] $subplanId
     * @return void
     */
    public function show($subplanId)
    {
    $subPlan = SubPlan::findOrFail($subplanId);

    return view('subplans.show', compact('subPlan'));
    }

    /**
     * salvar e validar criação de sub-planos
     *
     * @param Request $request
     * @param Plan $plan
     * @return void
     */
    public function store(Request $request, Plan $plan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'speed' => 'required|string|max:255'
        ]);

        $plan->subPlans()->create($request->all());

        return redirect()->route('plans.show', $plan->id)->with('success', 'Sub-plano criado com sucesso.');
    }

    /**
     * formulario de edição de sub-planos
     *
     * @param [type] $planId
     * @param [type] $subPlanId
     * @return void
     */
    public function edit($planId, $subPlanId)
    {
        $plan = Plan::findOrFail($planId);
        $subPlan = SubPlan::findOrFail($subPlanId);

        return view('subplans.edit', compact('plan', 'subPlan'));
    }

    /**
     * salvar edição dos sub-planos
     *
     * @param Request $request
     * @param [type] $planId
     * @param [type] $subPlanId
     * @return void
     */
    public function update(Request $request, $planId, $subPlanId)
    {
        $subPlan = SubPlan::findOrFail($subPlanId);
        $subPlan->update($request->all());

        return redirect()->route('plans.show', $planId)->with('success', 'Sub-plano atualizado com sucesso!');
    }

    /**
     * apagar sub-planos
     *
     * @param [type] $planId
     * @param [type] $subPlanId
     * @return void
     */
    public function destroy($planId, $subPlanId)
    {
        $subPlan = SubPlan::findOrFail($subPlanId);
        $subPlan->delete();

        return redirect()->route('plans.show', $planId)->with('success', 'Sub-plano excluído com sucesso!');
    }
}
