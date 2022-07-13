<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AbonnementEntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $entreprise_id = $this->fonct->findWhereMultiOne("employers",["user_id"],[Auth::user()->id])->entreprise_id;
        $paie = $request->paie;
        $temps = $request->temps;
        $recrutement = $request->recrutement;
        $personnel = $request->personnel;
        $conge = $request->conge;


        if($paie != null) $this->abonnement->enregistrer_abonnement_entreprise($entreprise_id,$paie);
        if($temps != null) $this->abonnement->enregistrer_abonnement_entreprise($entreprise_id,$temps);
        if($recrutement != null) $this->abonnement->enregistrer_abonnement_entreprise($entreprise_id,$recrutement);
        if($personnel != null) $this->abonnement->enregistrer_abonnement_entreprise($entreprise_id,$personnel);
        if($conge != null) $this->abonnement->enregistrer_abonnement_entreprise($entreprise_id,$conge);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
