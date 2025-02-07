<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'role:admin']); // Protection admin
    }

    // Page d'accueil de l'admin
    public function index()
    {
        return response()->json([
            'message' => 'Bienvenue sur le tableau de bord admin',
            'users' => User::all()
        ]);
    }
}

