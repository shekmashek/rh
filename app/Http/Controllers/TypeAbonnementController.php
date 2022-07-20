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

        $entreprise_id = $this->fonct->findWhereMultiOne("employers",["user_id"],[Auth::user()->id])->entreprise_id;
        $type_etp = $this->fonct->findWhereMultiOne("entreprises",["id"],[$entreprise_id])->type_entreprise_id;
        $type_service = $this->fonct->findAll("v_type_services_autres_types_abonnements");
        $limite_type = $this->fonct->findAll("limite_autres_abonnements");
        $abonnement_etp = $this->fonct->findAll("type_abonnements_etp");
        $abonnement_cfp = $this->fonct->findAll("type_abonnements_of");
         /**on verifie le dernier abonnement de l'entreprise et of */
        $etp_last_ab = DB::select('select * from v_abonnement_facture_entreprise where entreprise_id = ? order by facture_id desc limit 1', [$entreprise_id]);
        $cfp_last_ab = DB::select('select * from v_abonnement_facture where cfp_id = ? order by facture_id desc limit 1', [$entreprise_id]);

        /**Recuperation de la liste des services achetés */
        $liste_service = $this->fonct->findWhere("v_autres_abonnement_entreprises",["entreprise_id"],[$entreprise_id]);
        // $liste_service = DB::select('select *,sum(montant_facture) as total_facture from v_autres_abonnement_entreprises where entreprise_id = ?',[$entreprise_id]);

        $mois_suivant = [];
        $annee_suivant = [];

        for ($i=0; $i < count($liste_service); $i++) {

            if($liste_service[$i]->mois_actuel == 12){
                array_push($mois_suivant,  01);
                array_push($annee_suivant,  ($liste_service[$i]->annee_actuel) + 1);
            }
            else {
                array_push($mois_suivant,  ($liste_service[$i]->mois_actuel) + 1);
                array_push($annee_suivant,  $liste_service[$i]->annee_actuel);
            }
        }
        /**Liste des factures */
        $facture = DB::select("select sum(montant_facture) as total_facture,num_facture,invoice_date,due_date,statut from v_autres_abonnement_entreprises where entreprise_id = ? group by entreprise_id,invoice_date,due_date",[$entreprise_id]);

        return view('abonnement.liste',compact('type_service','limite_type','abonnement_etp','abonnement_cfp','type_etp','etp_last_ab','cfp_last_ab','liste_service','mois_suivant','annee_suivant','facture'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = $this->fonct->findAll("type_services");
        return view('superadmin.type',compact('service'));
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
        return back()->with("success","Type d'abonnement enregistré avec succès");
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
    public function verification(Request $request){
        $idservice = $request->Id;
        $test = $this->fonct->findWhere("autres_types_abonnements",["type_service_id"],[$idservice]);
        return response()->json($test);
    }
}

