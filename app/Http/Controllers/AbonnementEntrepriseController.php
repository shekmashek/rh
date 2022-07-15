<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\FonctionGenerique;
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
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware(function ($request, $next) {
        //     if(Auth::user()->exists == false) return redirect()->route('sign-in');
        //     return $next($request);
        // });
        $this->fonct  = new FonctionGenerique();
        $this->abonnement = new Abonnement();
    }
    public function index()
    {

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
        $nb_emp = count($this->fonct->findWhere("employers",["entreprise_id"],[$entreprise_id]));
        $donnees = $request->all();

        for ($i=1; $i < count($donnees["id_type"]); $i++) {
            if(isset($donnees["autres_".$i]) ) {
                $this->abonnement->enregistrer_abonnement_entreprise($entreprise_id,$donnees["autres_".$i]);
                $last_entreprise_autres_abonnements_id = DB::table('entreprise_autres_abonnements')->latest('id')->first()->id;
                $detail_abonnement = $this->fonct->findWhereMultiOne("v_autres_abonnement_limite",["id"],[$donnees["autres_".$i]]);
                /**calcul facture en fonction du nombre d'employé */
                $prix_en_fonction_employe = $detail_abonnement->prix_par_employe * $nb_emp;
                $montant_total = $prix_en_fonction_employe + $detail_abonnement->prix_fixe;
                $this->abonnement->insert_factures_abonnements($last_entreprise_autres_abonnements_id,$montant_total);
            }
        }
        if(isset($donnees["entreprise"])) $this->fonct->enregistrer_abonnement_formation_etp($donnees["entreprise"],$entreprise_id);
        if(isset($donnees["of"])) $this->fonct->enregistrer_abonnement_formation_etp($donnees["of"],$entreprise_id);
        return back();
        // if($request->entreprise != null)  $this->abonnement->enregistrer_abonnement_formation_etp($entreprise_id,$request->entreprise);
        // if($request->of != null)  $this->abonnement->enregistrer_abonnement_formation_of($entreprise_id,$request->entreprise);



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
