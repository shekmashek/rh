<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Employe extends Model
{
    use HasFactory;
    /**Recuperer les informations nécéssaires d'un employé */
    public function employe_info($user_id){
        $req = DB::select('select id,matricule_emp,nom_emp,prenom_emp,date_naissance_emp,cin_emp,email_emp,telephone_emp,fonction_emp,entreprise_id from employers where user_id = ?', [$user_id]);
        return $req[0];
    }
    /**Recuperer les informations nécéssaires d'une entreprise */
    public function entreprise_info($entreprise_id){
        $req = DB::select('select id,nom_etp,email_etp,telephone_etp,statut_compte_id,type_entreprise_id from entreprises where id = ?', [$entreprise_id]);
        return $req[0];
    }
}
