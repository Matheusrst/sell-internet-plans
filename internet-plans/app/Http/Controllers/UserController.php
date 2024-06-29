<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
