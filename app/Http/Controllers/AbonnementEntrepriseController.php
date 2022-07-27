<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\FonctionGenerique;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

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

        /**COMMENTENA FOTSINNY TY MBA ANAOVANA TEST NY ABONNEMENT FORMATION */

        for ($i=1; $i <= count($donnees["id_type"]); $i++) {
            if(isset($donnees["services_".$i]) ) {
                $this->abonnement->enregistrer_abonnement_entreprise($entreprise_id,$donnees["services_".$i]);
                $last_entreprise_autres_abonnements_id = DB::table('entreprise_autres_abonnements')->latest('id')->first();
                $detail_abonnement = $this->fonct->findWhereMultiOne("v_type_services_autres_types_abonnements",["id"],[$donnees["services_".$i]]);
                /**calcul facture en fonction du nombre d'employé */
                $prix_en_fonction_employe = $detail_abonnement->prix_par_employe * $nb_emp;
                $montant_total = $prix_en_fonction_employe + $detail_abonnement->prix_fixe;
                $this->abonnement->insert_factures_abonnements($last_entreprise_autres_abonnements_id->id,$last_entreprise_autres_abonnements_id->entreprise_id,$montant_total);
            }
        }

        if(isset($donnees["entreprise"])){
            $this->abonnement->enregistrer_abonnement_formation_etp($donnees["entreprise"],$entreprise_id);
            $ab_id= DB::table('abonnements')->latest('id')->first();
            $abonnement_id = $this->fonct->findWhereMultiOne("v_type_abonnement_etp",["abonnement_id"],[$ab_id->id]);

            $this->abonnement->insert_factures_abonnements_formation($abonnement_id->abonnement_id,$abonnement_id->tarif);
        }
        if(isset($donnees["of"])) $this->abonnement->enregistrer_abonnement_formation_etp($donnees["of"],$entreprise_id);
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
    /**detail de la facture */
    public function detail_facture($num_fact,$id){
        $facture = $this->fonct->findWhereMultiOne("factures_autres_abonnements",["num_facture"],[$num_fact]);
        $liste_service = $this->fonct->findWhere("v_autres_abonnement_entreprises",["invoice_date","entreprise_id"],[$facture->invoice_date,$facture->entreprise_id]);
        $nb_employe = count($this->fonct->findWhere("employers",["entreprise_id"],[$facture->entreprise_id]));
        return view('abonnement.detail_facture',compact('facture','liste_service','nb_employe','id'));
    }
}
