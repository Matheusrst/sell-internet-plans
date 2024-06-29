<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\SubPlan;
use Illuminate\Http\Request;

class SubPlanController extends Controller
{
    public function create(Plan $plan)
    {
        return view('subplans.create', compact('plan'));
    }

    public function show($subplanId)
    {
    $subPlan = SubPlan::findOrFail($subplanId);

    return view('subplans.show', compact('subPlan'));
    }

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

    public function edit($planId, $subPlanId)
    {
        $plan = Plan::findOrFail($planId);
        $subPlan = SubPlan::findOrFail($subPlanId);

        return view('subplans.edit', compact('plan', 'subPlan'));
    }

    public function update(Request $request, $planId, $subPlanId)
    {
        $subPlan = SubPlan::findOrFail($subPlanId);
        $subPlan->update($request->all());

        return redirect()->route('plans.show', $planId)->with('success', 'Sub-plano atualizado com sucesso!');
    }

    public function destroy($planId, $subPlanId)
    {
        $subPlan = SubPlan::findOrFail($subPlanId);
        $subPlan->delete();

        return redirect()->route('plans.show', $planId)->with('success', 'Sub-plano excluído com sucesso!');
    }
}
