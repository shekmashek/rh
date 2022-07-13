<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
}
