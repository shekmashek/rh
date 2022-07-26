<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Models\Employe;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GenererFactureController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware(function ($request, $next) {
        //     if(Auth::user()->exists == false) return redirect()->route('sign-in');
        //     return $next($request);
        // });
        $this->employe = new Employe();
        $this->abonnement = new Abonnement();
    }
    public function test(){
        $user_lst = DB::select('select * from users ');
        return $user_lst;
    }
    public function genererFactureParNombreEmploye($entreprise_id){
        // $today = Carbon::today()->toDateString();
        $today = Carbon::now();
        $today_month = $today->month;
        $today_date_string = $today->toDateString();

        /**AMPIANA -1 ilay  $mois_dernier = $today_month REHEFA CLEAN NY CODE FA ANAOVANA TEST FOTSINY TY */

        $mois_dernier = $today_month ;

        /**on va d'abord recuperer les  derniers abonnements de l'entreprise */

        $dernier_abonnement = DB::select('SELECT date_debut,prix_par_employe,prix_fixe,service_id,mois_actuel,annee_actuel,limite_autres_abonnements_id FROM v_autres_abonnement_entreprises WHERE mois_actuel = ? AND entreprise_id = ?',[$mois_dernier,$entreprise_id]);

        if($dernier_abonnement != null){
            /**Recuperer nombre employé ajouter après le dernier abonnement jusqu'à maintenant */
            $nb_employe = DB::select('select count(*) as nb_employe from employers where entreprise_id = ? and date(created_at) between ? and ? ',[$entreprise_id,$dernier_abonnement[0]->date_debut, $today_date_string]);

            $new_prix_personnel = [];
            $new_prix_paie= [];
            $new_prix_conge = [];
            $new_prix_recrutement = [];
            $new_prix_temps = [];

            for ($i=0; $i < count($dernier_abonnement); $i++) {
                if($dernier_abonnement[$i]->service_id == 1) array_push($new_prix_personnel,$dernier_abonnement[$i]->prix_fixe + ($dernier_abonnement[$i]->prix_par_employe * $nb_employe[0]->nb_employe));
                if($dernier_abonnement[$i]->service_id == 2) array_push($new_prix_paie,$dernier_abonnement[$i]->prix_fixe + ($dernier_abonnement[$i]->prix_par_employe * $nb_employe[0]->nb_employe));
                if($dernier_abonnement[$i]->service_id == 3) array_push($new_prix_conge,$dernier_abonnement[$i]->prix_fixe + ($dernier_abonnement[$i]->prix_par_employe * $nb_employe[0]->nb_employe));
                if($dernier_abonnement[$i]->service_id == 4) array_push($new_prix_recrutement,$dernier_abonnement[$i]->prix_fixe + ($dernier_abonnement[$i]->prix_par_employe * $nb_employe[0]->nb_employe));
                if($dernier_abonnement[$i]->service_id == 5) array_push($new_prix_temps,$dernier_abonnement[$i]->prix_fixe + ($dernier_abonnement[$i]->prix_par_employe * $nb_employe[0]->nb_employe));
            }
                /**SOLOINA 01 ny 26 RERHEFA METY TSARA FA TEST FOTSINY TY */
            if($today->day == 26){

                /**On doit d'abord verifier qu'il n'y a pas encore de facture generer à la date d'aujourd'hui*/
                $verification_facture = DB::select('select count(*) as nb_facture from factures_autres_abonnements where invoice_date = ?', [$today_date_string]);
                if($verification_facture[0]->nb_facture < 1) {
                    for ($i=0; $i < count($dernier_abonnement); $i++) {
                        DB::insert('insert into entreprise_autres_abonnements (entreprise_id,limite_autres_abonnements_id,activite) values (?,?,?)', [$entreprise_id,$dernier_abonnement[$i]->limite_autres_abonnements_id,0]);
                        $last_entreprise_autres_abonnements_id = DB::table('entreprise_autres_abonnements')->latest('id')->first();
                        $prix_en_fonction_employe = $dernier_abonnement[$i]->prix_par_employe * $nb_employe[0]->nb_employe;
                        $montant_total = $prix_en_fonction_employe + $dernier_abonnement[$i]->prix_fixe;
                        $this->abonnement->insert_factures_abonnements($last_entreprise_autres_abonnements_id->id,$last_entreprise_autres_abonnements_id->entreprise_id,$montant_total);
                    }
                }

            }
        }
         // On retourne les informations du dernier abonnement en JSON
        return response()->json($dernier_abonnement, 201);
    }
}
