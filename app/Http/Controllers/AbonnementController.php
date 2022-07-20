<?php

namespace App\Http\Controllers;

use App\Models\FonctionGenerique;
use Illuminate\Support\Facades\DB;

class AbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware(function ($request, $next) {
        //     if(Auth::user()->exists == false) return redirect()->route('sign-in');
        //     return $next($request);
        // });
        $this->fonct = new FonctionGenerique();
    }

    public function listeAbonne()
    {
        $liste = DB::select('select * from v_abonnement_facture_entreprise order by date_demande desc');
        $cfpListe = DB::select('select * from v_abonnement_facture order by date_demande desc');
        $typeAbonnement_etp =$this->fonct->findAll('type_abonnements_etp');
        $typeAbonnement_of =$this->fonct->findAll('type_abonnements_of');
        $liste_coupon = $this->fonct->findAll('coupon');
        return view('superadmin.activation-abonnement', compact('liste_coupon','liste','cfpListe','typeAbonnement_etp','typeAbonnement_of'));
    }

}
