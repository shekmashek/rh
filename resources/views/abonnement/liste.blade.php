
@extends('layouts.admin')
@section('title')
    <p class="text_header m-0 mt-1">Service et abonnement</p>
@endsection
@section('content')

<div class="container-fluid">
    <div class="m-4" role="tabpanel">
        <ul class="nav nav-tabs d-flex flex-row navigation_module" id="myTab">
            <li class="nav-item active">
                <a href="#service" class="nav-link active" data-bs-toggle="tab"><i class='bx bx-task'></i>&nbsp;&nbsp;Historique des services</a>
            </li>
            <li class="nav-item">
                <a href="#abonnement" class="nav-link " data-bs-toggle="tab"> <i class='bx bxl-sketch'></i>&nbsp;&nbsp;Abonnements</a>
            </li>
            <li class="nav-item">
                <a href="#facture" class="nav-link" data-bs-toggle="tab"><i class='bx bxs-bank'></i>&nbsp;&nbsp;Factures</a>
            </li>
        </ul>
        <br>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="service">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Date d'inscription</th>
                        <th scope="col">Abonnement</th>
                        <th scope="col">Prochaine facture</th>
                        <th scope="col">Activité</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; @endphp

                        @foreach ($liste_service as $liste)
                            <tr>
                                <td> @php echo date("d-m-Y",strtotime($liste->date_demande)) @endphp</td>
                                <td>{{$liste->type_service}}, {{number_format($liste->montant_facture,0,',','.')}}ar </td>
                                @if($mois_suivant[$i] < 10)
                                    <td> 01-0{{$mois_suivant[$i]}}-{{$annee_suivant[$i]}}</td>
                                @else
                                    <td> 01-{{$mois_suivant[$i]}}-{{$annee_suivant[$i]}}</td>
                                @endif
                                @if($liste->activite == 0)
                                    <td><span style="background-color: orangered;padding:5px;color:white;border-radius:10px">Désactivé</span></td>
                                @else <td><span style="background-color: orangered;padding:5px;color:white;border-radius:10px">Activé</span></td>
                                @endif
                                <td>
                                    @if($liste->activite == 1)
                                    <button class="btn btn-danger" id="dropdownMenuButton1">
                                         Arrêter le service
                                    </button>
                                    @else
                                    <button class="btn btn-secondary" id="dropdownMenuButton1">
                                        Arrêter le service
                                   </button>
                                    @endif
                                </td>
                            </tr>
                            @php $i+=1; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade show" id="abonnement">
                <form action="{{route('inscription_abonnement')}}" method="POST">
                    @csrf
                    @if($etp_last_ab!=null ||  $cfp_last_ab!=null)
                        <div class="col-md-9">
                            <h2>Formation.mg</h2>
                            <p class="w-75">Veillez selectionner les services que vous voulez acheter, en selectionnant l'option pour l'abonnement avec les prix et les avantages affichés ci-dessous.</p>
                            <div class="row row-cols-1 row-cols-md-2 g-5">
                                @if($cfp_last_ab!=null)
                                    @if($cfp_last_ab[0]->type_arret != null)
                                        @if($type_etp == 2)
                                            <div class="col">
                                                <div class="card shadow my-5">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div class="icon">
                                                            <img class="card-img-top" src="{{ asset('img/logos_all/iconFormation.webp') }}" alt="Card image cap">
                                                        </div>
                                                        <div class="ms-2">
                                                            <h6 class="mb-0">Organisme de Formation</h6>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="description_formation card-text"> Le prix de l'abonnement varie en fonction du nombre d'employé, d'utilisateur et de formateur.</p>
                                                        <p>Choisissez votre abonnement:</p>
                                                        @foreach ($abonnement_cfp as $ab_cfp)
                                                            @if($ab_cfp->id != 1)
                                                                <div class="form-check mx-2 my-2">
                                                                    <input class="form-check-input" value = {{$ab_cfp->id}} type="radio" name="of" id="flexRadioDefault1">
                                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                                        @if($ab_cfp->illimite == 0)
                                                                            <b>{{$ab_cfp->nom_type}} -  {{number_format($ab_cfp->tarif,0,',','.')}} ar/mois :</b><span class="description"> {{$ab_cfp->nb_utilisateur}} utilisateurs - {{$ab_cfp->nb_formateur}} formateurs - {{$ab_cfp->nb_projet}} projets</span> </label>
                                                                        @endif
                                                                        @if($ab_cfp->illimite == 1)
                                                                            <b>{{$ab_cfp->nom_type}} - {{number_format($ab_cfp->tarif,0,',','.')}}ar/mois : </b><span class="description"> utilisateurs illimités -  formateurs illimités -  projets illimités</span></label>
                                                                        @endif
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endif
                                @if($etp_last_ab!=null)
                                    @if($etp_last_ab[0]->type_arret != null)
                                        @if($type_etp == 1)
                                            <div class="col">
                                                <div class="card shadow my-5">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div class="icon">
                                                            <img class="card-img-top" src="{{ asset('img/logos_all/iconFormation.webp') }}" alt="Card image cap">
                                                        </div>
                                                        <div class="ms-2">
                                                            <h6 class="mb-0">Entreprise</h6>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="description_formation card-text"> Le prix de l'abonnement varie en fonction du nombre d'employé, d'utilisateur et de formateur.</p>
                                                        <p>Choisissez votre abonnement:</p>
                                                        @foreach ($abonnement_etp as $ab_etp)
                                                            @if($ab_etp->id != 1)
                                                                <div class="form-check mx-2 my-2">
                                                                    <input class="form-check-input" type="radio" value = {{$ab_etp->id}} name="entreprise" id="flexRadioDefault11">
                                                                    <label class="form-check-label" for="flexRadioDefault11">
                                                                        @if($ab_etp->illimite == 0)
                                                                            <b>{{$ab_etp->nom_type}} - {{number_format($ab_etp->tarif,0,',','.')}}ar/mois : </b><span class="description">{{$ab_etp->nb_utilisateur}}  utilisateurs - {{$ab_etp->nb_formateur}} formateurs - {{$ab_etp->min_emp}} à {{$ab_etp->max_emp}} employés</span></label>
                                                                        @endif
                                                                        @if($ab_etp->illimite == 1)
                                                                            <b>{{$ab_etp->nom_type}} - {{number_format($ab_etp->tarif,0,',','.')}}ar/mois : </b><span class="description"> utilisateurs illimités -  formateurs illimités -  employés illimités</span></label>
                                                                        @endif
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endif
                            </div>
                        </div>
                    @endif
                    <br>
                    <div class="col-md-9">
                        <h2>Services RH</h2>
                        <p>Veillez selectionner les abonnements que vous voulez acheter</p>
                        <div class="row row-cols-1 row-cols-md-3 g-5">
                            @foreach ($type_service as $serv )
                                <div class="col">
                                    <div class="card shadow mt-5">
                                        <div class="d-flex flex-row align-items-center">
                                            <div class="icon">
                                                @if($serv->service_id == 1)
                                                    <img class="card-img-top" src="{{ asset('img/logos_all/iconPersonel.webp') }}" alt="Card image cap">
                                                @endif
                                                @if($serv->service_id == 2)
                                                    <img class="card-img-top" src="{{ asset('img/logos_all/iconPaie.webp') }}" alt="Card image cap">
                                                @endif
                                                @if($serv->service_id == 3)
                                                    <img class="card-img-top" src="{{ asset('img/logos_all/iconConge.webp') }}" alt="Card image cap">
                                                @endif
                                                @if($serv->service_id == 4)
                                                    <img class="card-img-top" src="{{ asset('img/logos_all/iconRecrutement.webp') }}" alt="Card image cap">
                                                @endif
                                                @if($serv->service_id == 5)
                                                <img class="card-img-top" src="{{ asset('img/logos_all/iconPaie.webp') }}" alt="Card image cap">
                                                @endif
                                            </div>

                                                <div class="ms-2">
                                                    <h6 class="mb-0">{{$serv->type_service}}.mg</h6>
                                                </div>


                                        </div>
                                        <div class="card-body">
                                            <p class="card-title">
                                                Le tarif de base est de  {{number_format($serv->prix_fixe,0,',','.')}} ar pour tout abonnement et s'ajoute de suite en fonction du nombre d'employé ajouté :
                                            </p>
                                            @foreach ($limite_type as $limite )
                                                @if($limite->autres_types_abonnements_id == $serv->id)
                                                    <div class="form-check mx-3 my-3">
                                                        <input type="hidden" value={{$limite->id}} name = "id_type[]">
                                                        <input class="form-check-input" type="radio" value={{$limite->id}} name="autres_{{$limite->id}}" id="flexRadioDefault44_{{$limite->id}}">
                                                        <label class="form-check-label" for="flexRadioDefault44_{{$limite->autres_types_abonnements_id}}">
                                                            <b>{{number_format($limite->prix_par_employe,0,',','.')}} ar/employé : </b><span class="description">{{$limite->min_emp}} à {{$limite->max_emp}} employés</span></label>
                                                    </div>
                                                @endif
                                            @endforeach


                                            {{-- <input type="checkbox" class="btn-check" id="personnel" name="personnel">
                                            <label class="btn btn-outline-success w-100" for="personnel">Ajouter au panier</label><br> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div><br>
                        <div class="justify-content-right">
                            <button class="btn btn-primary" type="submit">Enregister</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade show" id="facture">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Facture #</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Invoice Date</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Abonnement</th>
                        <th scope="col">Statut</th>

                    </tr>
                    </thead>
                    <tbody>
                            @php $j = 1; @endphp
                            @foreach ($facture as $fact)
                                <tr>
                                    <td><a href="{{route('detail_facture',$fact->num_facture)}}">{{$j}}</a></td>
                                    <td> {{number_format($fact->total_facture,0,',','.')}} Ar</td>
                                    <td>@php echo date("d-m-Y",strtotime($fact->invoice_date)) @endphp</td>
                                    <td>  @php echo date("d-m-Y",strtotime($fact->due_date)) @endphp</td>
                                    <td>@for ($i = 0;$i<count($liste_service);$i++)
                                            @if ($fact->invoice_date == $liste_service[$i]->invoice_date)
                                                @if($i < count($liste_service)-1)
                                                {{$liste_service[$i]->type_service}} ,
                                                @else
                                                {{$liste_service[$i]->type_service}}
                                                @endif
                                            @endif

                                        @endfor
                                    </td>
                                    <td>{{$fact->statut}}</td>
                                    @php $j+=1; @endphp
                                </tr>
                            @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
@endsection
