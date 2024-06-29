<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sale;

class UserController extends Controller
{
    /**
     * Lista todos os clientes para o administrador.
     */
    public function index()
    {
        $customers = User::where('user_type', 'customer')->get();
        return view('admin.customers.index', compact('customers'));
    }

     /**
     * Exibe os planos comprados por um cliente específico
     *
     * @param int $customerId
     * @return \Illuminate\View\View
     */
    public function showPurchasedPlans($customerId)
    {
        $customer = User::findOrFail($customerId);
        $sales = Sale::where('user_id', $customer->id)->get();
        
        return view('admin.customers.purchased_plans', compact('customer', 'sales'));
    }
}
