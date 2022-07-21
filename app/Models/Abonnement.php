<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\FonctionGenerique;
use Exception;

class Abonnement extends Model
{

    /**Crud type d'abonnement */
    public function enregistrer_type_abonnement($nom_type,$prix_fixe,$prix_par_employe,$min_emp,$max_emp){

        $fonct = new FonctionGenerique();
        try {
            DB::beginTransaction();
            $test = $fonct->findWhere("autres_types_abonnements",["type_service_id"],[$nom_type]);
            if(count($test)< 1)  DB::insert('insert into autres_types_abonnements (type_service_id,prix_fixe) values (?,?)', [$nom_type,$prix_fixe]);
            $autres_types_abonnements_id = DB::table('autres_types_abonnements')->latest('id')->first()->id;
            DB::insert('insert into limite_autres_abonnements (prix_par_employe,min_emp,max_emp,autres_types_abonnements_id) values (?,?,?,?)', [$prix_par_employe,$min_emp,$max_emp,$autres_types_abonnements_id]);
            DB::commit();
        } catch (Exception $e) {
           DB::rollBack();
           return back()->with('erreur',"Echec de l'insertion");
        }
    }
    public function modifier_type_abonnement($nom_type,$prix_fixe,$prix_par_employe,$min_emp,$max_emp,$id){
        DB::update('update autres_types_abonnements set type_service_id = ?,prix_fixe = ?, prix_par_employe = ?, min_emp = ? where id = ?', [$nom_type,$prix_fixe,$prix_par_employe,$min_emp,$max_emp,$id]);
    }
    public function supprimer_type_abonnement($id){
        DB::delete('delete autres_types_abonnements where id = ?', [$id]);
    }
    /**CRUD abonnement par entreprise */
    public function enregistrer_abonnement_entreprise($entreprise_id,$service){
        $today = Carbon::today()->toDateString();
        DB::insert('insert into entreprise_autres_abonnements (entreprise_id,limite_autres_abonnements_id,date_demande) values (?,?,?)', [$entreprise_id,$service,$today]);
    }

    /**Enregistrer abonnement pour l'offre formation */
    public function enregistrer_abonnement_formation_etp($type_abonnement_id,$entreprise_id){
        DB::insert('insert into abonnements (date_demande,type_abonnement_id,entreprise_id) values (?,?,?) ',[$this->today,$type_abonnement_id,$entreprise_id]);
    }
    public function enregistrer_abonnement_formation_of($type_abonnement_id,$cfp_id){
        DB::insert('insert into abonnements_cfp (date_demande,type_abonnement_id,cfp_id) values (?,?,?) ',[$this->today,$type_abonnement_id,$cfp_id]);
    }
    /**Trouver le dernier num facture */
    public function findMax($nomTab, $nomCol)
    {
        $maxVal =  DB::select('SELECT MAX('.$nomCol.') as id_max from '.$nomTab.'');
        return $maxVal;
    }
    /** insertion de données dans factures_autres_abonnements */
    public function insert_factures_abonnements($id,$entreprise_id,$montant_facture){
      //generation du numero de facture, on verifie le dernier numero de facture
        $max_id = $this->findMax('factures_autres_abonnements','num_facture')[0]->id_max;
        if($max_id == null) $num_facture = 1;
        else $num_facture = $max_id +=  1;
        $today = Carbon::today()->toDateString();
        $due_date = Carbon::today()->addDays(15)->toDateString();
        $statut = "non payé";
        DB::insert('insert into factures_autres_abonnements (entreprise_autres_abonnements_id,entreprise_id,invoice_date,due_date,num_facture,statut,montant_facture) values (?,?,?,?,?,?,?)', [$id,$entreprise_id,$today,$due_date,$num_facture,$statut,$montant_facture]);
    }

}
