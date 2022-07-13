<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FonctionGenerique;
use App\Models\Abonnement;
use Illuminate\Support\Facades\Auth;

class TypeAbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(Auth::user()->exists == false) return redirect()->route('sign-in');
            return $next($request);
        });
        $this->fonct  = new FonctionGenerique();
        $this->abonnement = new Abonnement();
    }
    public function index()
    {
        $service = $this->fonct->findAll("type_services");
        $liste_type = $this->fonct->findAll("v_type_services_autres_types_abonnements");
        // return view('liste_type_abonnement',compact('liste_type','service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nom_type = $request->nom_type;
        $prix_fixe = $request->prix_fixe;
        $prix_par_employe = $request->prix_par_employe;
        $min_emp = $request->min_emp;
        $max_emp = $request->max_emp;
        $this->abonnement->enregistrer_type_abonnement($nom_type,$prix_fixe,$prix_par_employe,$min_emp,$max_emp);
        return back()->with("Type d'abonnement enregistré avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resultat = $this->fonct->findWhereMulitOne("autres_types_abonnements",["id"],[$id]);
        // return view("modifier_type",compact('resultat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nom_type = $request->nom_type;
        $prix_fixe = $request->prix_fixe;
        $prix_par_employe = $request->prix_par_employe;
        $min_emp = $request->min_emp;
        $max_emp = $request->max_emp;
        $this->abonnement->modifier_type_abonnement($nom_type,$prix_fixe,$prix_par_employe,$min_emp,$max_emp,$id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //on doit d'abord verifier s'il y a déjà des entreprises abonnés à ce type
        $verification = $this->fonct->findWhere("entreprise_autres_abonnements",["autres_types_abonnements_id"],[$id]);
        if(count($verification) > 0) {
            return back()->with("Vous ne pouvez pas supprimer ce type d'abonnement");
        }
        else {
            $this->abonnement->supprimer_type_abonnement($id);
            return back();
        }
    }
}

