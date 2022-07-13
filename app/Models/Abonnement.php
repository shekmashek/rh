<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\FonctionGenerique;
class Abonnement extends Model
{
    /**Crud type d'abonnement */
    public function enregistrer_type_abonnement($nom_type,$prix_fixe,$prix_par_employe,$min_emp,$max_emp){
        DB::insert('insert into autres_types_abonnements (type_service_id,prix_fixe,prix_par_employe,min_emp,max_emp) values (?,?,?,?,?)', [$nom_type,$prix_fixe,$prix_par_employe,$min_emp,$max_emp]);
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
        DB::insert('insert into entreprise_autres_abonnements (entreprise_id,autres_types_abonnements_id,date_demande) values (?,?,?)', [$entreprise_id,$service,$today]);
    }
    public function findMax($nomTab, $nomCol)
    {
        $maxVal =  DB::select('SELECT MAX('.$nomCol.') as id_max from '.$nomTab.'');
        return $maxVal;
    }
    /** insertion de données dans factures_abonnements_cfp */
    public function insert_factures_abonnements($id,$invoice_date,$due_date,$montant_facture){
      //generation du numero de facture, on verifie le dernier numero de facture
        $max_id = $this->findMax('factures_autres_abonnements','num_facture')[0]->id_max;

        if($max_id == null) $num_facture = 1;
        else $num_facture = $max_id +=  1;

        $statut = "non payé";
        DB::insert('insert into factures_autres_abonnements (entreprise_autres_abonnements_id,invoice_date,due_date,num_facture,statut,montant_facture) values (?,?,?,?,?,?)', [$id,$invoice_date,$due_date,$num_facture,$statut,$montant_facture]);
    }

}
