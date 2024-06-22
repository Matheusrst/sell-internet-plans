<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Plan;

class SaleController extends Controller
{
    public function create($planId)
    {
        $plan = Plan::findOrFail($planId);
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
        ]);

        return redirect()->route('plans.index')->with('success', 'Plano comprado com sucesso!');
    }
}

