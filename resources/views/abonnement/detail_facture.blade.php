@extends('./layouts/admin')
@section('title')
    <h3 class="text-white ms-5">Détail facture</h3>
@endsection
@section('content')
<link rel="stylesheet" href="{{asset('assets/css/inputControlModules.css')}}">
<style type="text/css">
    .btn_pdf{
        padding: auto 2rem;
        margin-right: 2rem;
        border: none;
        background: #637381;
        color: white;
        border-radius: 5px;
        }
        .btn_pdf:hover{
            color: black;
            background-color: rgb(224, 223, 223);
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        }
        .btn_pdf .bx{
            font-size: 1.3rem;
            position: relative;
            top: .2rem;
        }
        .status{
            color: #637381;
            font-size: 3rem;
            justify-content: end;
        }

        .status span{
            border: 3px solid red;
            padding: .5rem 1rem;
            border-radius: 10px;
        }

        .payer{
            color: #637381;
            font-size: 3rem;
            justify-content: end;
        }
        .payer span{
            border: 3px solid green;
            padding: .5rem 1rem;
            border-radius: 10px;
        }

        .pdf_download{
            background-color: #e73827 !important;
            border-radius: 5px;
            padding: 7px;
        }
        .pdf_download:hover{
            background-color: #af3906 !important;
        }
        .pdf_download button{
            color: #ffffff !important;
        }
</style>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg w-100">
                <div class="row w-100 g-0 m-0">
                    <div class="col-lg-12">
                        <div class="row g-0 m-0" style="align-items: center">
                            <div class="col-12 d-flex justify-content-between" style="align-items: center">
                                <div class="col" align="right">
                                    <a href="" class="m-0 ps-1 pe-1 pdf_download"><button class="btn"><i class="bx bxs-file-pdf"></i>PDF</button></a>
                                    <a class="mb-2 new_list_nouvelle"   href="{{route('home')}}">
                                        <span class="btn_pdf text-center px-4 py-1" type="button"> Retour à la liste des factures </span>
                                    </a>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="container-fluid my-2">
                            <div class="row p-2">
                                <div class="col-4">
                                    <img src="{{asset('images/upskill.png')}}" alt="logo_cfp" class="img-fluid">
                                </div>
                                @if ($facture->statut== "Non payé")
                                    <div class="status col-4 text-end">
                                        <span>{{$facture->statut}}</span>
                                    </div>
                                @else
                                    <div class="payer col-4 text-end">
                                        <span>{{$facture->statut}}</span>
                                    </div>
                                @endif

                                <div class="col-4 text-end" align="rigth">
                                    <div class="info_cfp">
                                        <h4 class="m-0 nom_cfp">UpSkill</h4>
                                        <p class="m-0 adresse_cfp">contact-mg@upskill-sarl.com</p>
                                        <p class="m-0 adresse_cfp">Lot IIN 60 Analamahitsy 101 Antananarivo Madagascar</p>
                                        <p class="m-0 adresse_cfp">+261 34 81 135 63</p>
                                        <p class="m-0 adresse_cfp">www.formation.mg</p><br>

                                        <p class="m-0 adresse_cfp">NIF : 5011767848 <br> RCS : 2022B00475 <br> Stat : 62011 11 2022 0 10487 <br> Carte Fiscale : N° 0183506/DGI-J</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid my-2">
                            <div class="row">
                                <h5><strong>Facturé à</strong></h5>
                                    <div class="col-md-4">
                                        <div align="left">
                                            <h4 class="m-0 nom_cfp">{{$liste_service[0]->nom_etp}}</h4>
                                            <p class="m-0 adresse_cfp">{{$liste_service[0]->email_etp}}</p>
                                            <p class="m-0 adresse_cfp">{{$liste_service[0]->adresse_rue." ".$liste_service[0]->adresse_quartier}}</p>
                                            <p class="m-0 adresse_cfp">{{$liste_service[0]->adresse_ville." ".$liste_service[0]->adresse_code_postal}}</p>
                                            <p class="m-0 adresse_cfp">{{$liste_service[0]->adresse_region}}</p>
                                            <p class="m-0 adresse_cfp">{{$liste_service[0]->telephone_etp}}</p>
                                            <p class="m-0 adresse_cfp">{{$liste_service[0]->site_etp}}</p><br>

                                            <p class="m-0 adresse_cfp">NIF : {{$liste_service[0]->nif}} <br>RCS : {{$liste_service[0]->rcs}}  <br>Stat : {{$liste_service[0]->stat}}   <br> CIF : {{$liste_service[0]->cif}}</p><br>
                                            <p class="m-0 adresse_cfp">Nombre d'employés: {{$nb_employe}}</p><br>
                                        </div>
                                    </div>


                                <div class="col-md-3"></div>
                                <div class="col-md-5">
                                    <div align="right" class="me-1">
                                        <h5>Facture N°: {{$id}}</h5>
                                        <h6>Date de facturation:  @php echo date("d-m-Y",strtotime($facture->invoice_date)) @endphp  </h6>
                                        <h6>Date d'échéance: @php echo date("d-m-Y",strtotime($facture->due_date)) @endphp   </h6>
                                        {{-- @if ($facture[0]->nom_type != "Gratuit") --}}
                                            <h6>Mode de paiement:
                                                <select class="form-select-lg mb-3" name="" id="paiement">
                                                    <option value="">Choisissez un mode de paiement...</option>
                                                    {{-- @foreach ($mode_paiements as $paiement)
                                                        <option value="{{ $paiement->description }}">{{$paiement->description}}</option>
                                                    @endforeach --}}
                                                </select>
                                            </h6>
                                        {{-- @endif --}}
                                        <span>Si vous avez un coupon, vous obtiendrez une réduction <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#coupon">J'ai un coupon</button></span><br><br>
                                        {{-- modal ajout coupon --}}
                                        <div>
                                            <div class="modal" id="coupon" aria-labelledby="coupon" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form  method="post" action="">
                                                            {{-- <input type="hidden" name="abonnemet_id" value = "{{$facture[0]->abonnement_id}}">
                                                            <input type="hidden" name="facture_id" value = "{{$facture[0]->facture_id}}"> --}}

                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-center">Entrez le code</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control module " name="coupon" required  placeholder="Coupon" style="height: 50px">
                                                                    <label for="coupon" class="form-control-placeholder">Coupon</label>

                                                                </div>
                                                                <div class="text-center">
                                                                    <button type="button" class="btn btn_fermer" id="fermer1" data-bs-dismiss="modal"> <i class='bx bx-block me-1'></i>Fermer</button>
                                                                    <button type="submit" class="btn btn_enregistrer "><i class='bx bx-check me-1'></i>Enregistrer</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                        @endif

                                        @if(session()->has('erreur_coupon'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('erreur_coupon') }}
                                        </div>
                                        @endif
                                        @if(session()->has('valeur'))
                                        <div class="alert alert-success">
                                            Vous aurez une réduction de {{session()->get('valeur')}} %
                                            <input type="hidden" name="valeur" value="{{session()->get('valeur')}}">
                                            <input type="hidden" name = "coupon" value = "{{session()->get('coupon')}}">

                                        </div>
                                        @endif

                                        <div class="card detail_virement" style="width: 32rem;display: none">
                                            <div class="card-body">
                                                <h5 class="card-title">Paiement par virement</h5><br>
                                                <span class="card-text">Veuillez envoyer le virement vers ce compte:<br>
                                                    Titulaire: SOCIETE UPSKILL SARL<br>
                                                    Domiciliation: BNI Antananarivo<br>
                                                    Code banque: 00005 , code guichet : 00012 , compte numéro : 73293520001 , clé RIB : 60
                                                </span>
                                            </div>
                                        </div>

                                        <div class="card detail_cheque" style="width: 32rem;display: none">
                                            <div class="card-body">
                                                <h5 class="card-title">Paiement par chèque</h5>
                                                <span class="card-text">Veuillez envoyer le virement vers ce compte:<br>
                                                    Titulaire: SOCIETE UPSKILL SARL<br>
                                                    Domiciliation: BNI Antananarivo<br>
                                                    Code banque: 00005 , code guichet : 00012 , compte numéro : 73293520001 , clé RIB : 60
                                                </span>
                                            </div>
                                        </div>

                                        <div class="card detail_espece" style="width: 32rem;display: none">
                                            <div class="card-body">
                                                <h5 class="card-title">Paiement par espèce</h5>
                                                <span class="card-text">Veuillez contacter le responsable de UpSkill</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="container-fluid my-4">

                            <div class="row">
                                <table class="table ">
                                    <thead class="table" style="background-color:#acacac ">
                                        <tr>
                                            <th scope="col">Description</th>
                                            <th>Prix fixe</th>
                                            <th>Prix par nombre d'employé</th>
                                            <th> Montant total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="mb-1">


                                            @foreach ($liste_service as $service)
                                            <tr>
                                                <td> {{$service->type_service}}  </td>
                                                <td>  {{number_format($service->prix_fixe, 0, ',', '.')}} Ar </td>
                                                <td> {{number_format($service->prix_par_employe, 0, ',', '.')}} Ar </td>
                                                <td>{{number_format($service->montant_facture, 0, ',', '.')}} Ar </td>
                                            </tr>
                                            @endforeach
                                            @for ($i = 0;$i < count($abonnement_formation); $i++)
                                                <tr>
                                                    <td> {{$abonnement_formation[$i]->nom_type}} (formation.mg)</td>
                                                    <td> {{number_format($abonnement_formation[$i]->tarif, 0, ',', '.')}} Ar </td>
                                                    <td> - </td>
                                                    <td>{{number_format($abonnement_formation[$i]->tarif, 0, ',', '.')}} Ar</td>
                                                </tr>
                                            @endfor
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-3"></div>
                        <div class="col-2"></div>
                        <div class="col-4 ps-5">
                            <p class="ps-5 ms-5">Net à payer : {{number_format($montant_total, 0, ',', '.')}} Ar</p>
                        </div>
                    </div>
                    <p>Arretée la présente facture à la somme de:<strong> {{$lettre_montant}} Ariary</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
