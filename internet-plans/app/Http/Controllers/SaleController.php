<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Plan;
use App\Models\SubPlan;
use App\Models\User;

class SaleController extends Controller
{
    /**
     * comprar um novo plano
     *
     * @param Plan $plan
     * @return void
     */
    public function create(Plan $plan)
    {
        return view('sales.create', compact('plan'));
    }

    /**
     * salvar a compra no banco de dados
     *
     * @param Request $request
     * @param [type] $planId
     * @return void
     */
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

    /**
     * comprar um sub-plano
     *
     * @param [type] $subPlanId
     * @return void
     */
    public function createSubPlan($subPlanId)
    {
        $subPlan = SubPlan::findOrFail($subPlanId);
        return view('subplans.purchase', compact('subPlan'));
    }

    /**
     * salvara compra de um sub-pplano no banco de dados
     *
     * @param Request $request
     * @param [type] $subPlanId
     * @return void
     */
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

    /**
     *diferenciar a compra entre um plano base e um sub-plano e salvar no banco de dados
     *
     * @return void
     */
    public function purchasedPlans()
    {
        $userId = auth()->id();
        $sales = Sale::where('user_id', $userId)->with('plan', 'subPlan')->get();
        return view('plans.purchased_plans', compact('sales'));
    }

    /**
     * Exibir os planos comprados por um cliente específico.
     */
    public function customerPurchasedPlans($customerId)
    {
        $user = User::findOrFail($customerId);
        $sales = Sale::where('user_id', $customerId)->with('plan', 'subPlan')->get();
        return view('admin.customer_purchased_plans', compact('user', 'sales'));
    }

    /**
     * Exibir o formulário de edição de um plano comprado.
     */
    public function editPurchasedPlan($saleId)
    {
        $sale = Sale::with('plan', 'subPlan')->findOrFail($saleId);
        return view('admin.edit_purchased_plan', compact('sale'));
    }

    /**
     * Atualizar os detalhes de um plano comprado.
     */
    public function updatePurchasedPlan(Request $request, $saleId)
    {
        $sale = Sale::findOrFail($saleId);
        $sale->update($request->only(['price', 'speed']));

        return redirect()->route('admin.customer.purchased.plans', $sale->user_id)
                         ->with('success', 'Detalhes do plano comprados atualizados com sucesso!');
    }
}
