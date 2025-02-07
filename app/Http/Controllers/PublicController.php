<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        return response()->json([
            'title' => 'Bienvenue sur FirmtiOnline',
            'description' => 'FirmtiOnline est une plateforme où les entreprises peuvent s\'inscrire et proposer leurs services aux clients.',
            'client_benefits' => 'Réservez facilement des services en ligne.',
            'firm_benefits' => 'Ajoutez votre entreprise et atteignez plus de clients.'
        ]);
    }
}
