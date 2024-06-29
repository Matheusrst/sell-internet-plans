<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Plan;
use App\Models\SubPlan;

class SaleController extends Controller
{

    public function create(Plan $plan)
    {
        return view('sales.create', compact('plan'));
    }

    public function store(Request $request, $planId)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para comprar um plano.');
        }

        $plan = Plan::findOrFail($planId);

        Sale::create([
            'user_id' => auth()->id(),
            'plan_id' => $plan->id,
            'price' => $plan->base_price,
            'speed' => $plan->base_speed,
        ]);

        return redirect()->route('plans.index')->with('success', 'Plano comprado com sucesso!');
    }

    public function createSubPlan($subPlanId)
    {
        $subPlan = SubPlan::findOrFail($subPlanId);
        return view('subplans.purchase', compact('subPlan'));
    }

    public function storeSubPlan(Request $request, $subPlanId)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para comprar um sub-plano.');
        }

        $subPlan = SubPlan::findOrFail($subPlanId);

        Sale::create([
            'user_id' => auth()->id(),
            'sub_plan_id' => $subPlan->id,
            'price' => $subPlan->price,
            'speed' => $subPlan->speed,
        ]);

        return redirect()->route('plans.index')->with('success', 'Sub-Plano comprado com sucesso!');
    }

    public function purchasedPlans()
    {
        $userId = auth()->id();
        $sales = Sale::where('user_id', $userId)->with('plan', 'subPlan')->get();
        return view('plans.purchased_plans', compact('sales'));
    }
}
