<!DOCTYPE html>
<html>
<head>
    <title>Liste des services</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <style>
    .container{
        margin: 0 auto;
    }
    .card{
        border:none
    }
    .card-title, .description_formation {
        font-size: 80%
    }
    .description{
        font-size:80%;
    }
    .form-check{
        font-size:95%;
    }

    .icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .icon img{
        width: 60%;
    }

    </style>
</head>
<body>
<div class="container">
    <div class="col-md-9">
        <h2>Formation.mg</h2>
        <p class="w-75">Veillez selectionner les abonnements que vous voulez acheter, en selectionnant l'option pour l'abonnement avec les prix et les avantages affichés ci-dessous.</p>
        <div class="row row-cols-1 row-cols-md-2 g-5">
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
                    <p class="description_formation card-text"> Le prix de l'abonnement varie en fonction du nombre d'employé, d'utilisateur et de formateur que vous aller ajouter prochainement pendant l'utilisation du logiciel.</p>
                    <p>Choisissez votre abonnement:</p>
                    <div class="form-check mx-2 my-2">
                        <input class="form-check-input" type="radio" name="of" id="flexRadioDefault0">
                        <label class="form-check-label" for="flexRadioDefault0">aucun</label>
                    </div>
                    <div class="form-check mx-2 my-2">
                        <input class="form-check-input" type="radio" name="of" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            <b>TPE - 100.000ar/mois :</b><span class="description"> 1 utilisateur - 1 formateur - 1 à 9 employés</span> </label>
                    </div>
                    <div class="form-check mx-2 my-2">
                        <input class="form-check-input" type="radio" name="of" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            <b>PME - 200.000ar/mois : </b><span class="description"> 2 utilisateur - 2 formateur - 10 à 49 employés</span></label>
                    </div>
                    <div class="form-check mx-2 my-2">
                        <input class="form-check-input" type="radio" name="of" id="flexRadioDefault3">
                        <label class="form-check-label" for="flexRadioDefault3">
                            <b>EI - 300.000ar/mois : </b><span class="description"> 3 utilisateur - 4 formateur - 50 à 249 employés</span></label>
                    </div>
                    <div class="form-check mx-2 my-2">
                        <input class="form-check-input" type="radio" name="of" id="flexRadioDefault4">
                        <label class="form-check-label" for="flexRadioDefault4">
                            <b>GE - 400.000ar/mois : </b><span class="description"> illimité - illimité - illimité</span></label>
                    </div>
                </div>
            </div>
            </div>
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
                    <p class="description_formation card-text"> Le prix de l'abonnement varie en fonction du nombre d'employé, d'utilisateur et de formateur que vous aller ajouter prochainement pendant l'utilisation du logiciel.</p>
                    <p>Choisissez votre abonnement:</p>
                    <div class="form-check mx-2 my-2">
                        <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault01">
                        <label class="form-check-label" for="flexRadioDefault01">aucun</label>
                    </div>
                    <div class="form-check mx-2 my-2">
                        <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault11">
                        <label class="form-check-label" for="flexRadioDefault11">
                            <b>TPE - 100.000ar/mois : </b><span class="description"> 1 utilisateur - 1 formateur - 1 à 9 employés</span></label>
                    </div>
                    <div class="form-check mx-2 my-2">
                        <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault22">
                        <label class="form-check-label" for="flexRadioDefault22">
                            <b>PME - 200.000ar/mois : </b><span class="description"> 2 utilisateur - 2 formateur - 10 à 49 employés</span></label>
                    </div>
                    <div class="form-check mx-2 my-2">
                        <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault33">
                        <label class="form-check-label" for="flexRadioDefault33">
                            <b>EI - 300.000ar/mois : </b><span class="description"> 3 utilisateur - 4 formateur - 50 à 249 employés</span></label>
                    </div>
                    <div class="form-check mx-2 my-2">
                        <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault44">
                        <label class="form-check-label" for="flexRadioDefault44">
                            <b>GE - 400.000ar/mois : </b><span class="description"> illimité - illimité - illimité</span></label>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <h2>Autres offres</h2>
        <p>Veillez selectionner les abonnements que vous voulez acheter, en ajoutant le produit au panier.</p>
        <div class="row row-cols-1 row-cols-md-3 g-5">
            @foreach ($type_service as $serv )
            <div class="col">
                <div class="card shadow mt-5">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon">
                            <img class="card-img-top" src="{{ asset('img/logos_all/iconPersonel.webp') }}" alt="Card image cap">
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
                                    <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault44">
                                    <label class="form-check-label" for="flexRadioDefault44">
                                        <b>{{number_format($limite->prix_par_employe,0,',','.')}} ar/employé : </b><span class="description">{{$limite->min_emp}} à {{$limite->max_emp}} employés</span></label>
                                </div>
                            @endif
                        @endforeach


                        <input type="checkbox" class="btn-check" id="personnel" name="personnel">
                        <label class="btn btn-outline-success w-100" for="personnel">Ajouter au panier</label><br>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col">
                <div class="card shadow mt-5">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon">
                            <img class="card-img-top" src="{{ asset('img/logos_all/iconRecrutement.webp') }}" alt="Card image cap">
                        </div>
                        <div class="ms-2">
                            <h6 class="mb-0">recrutement.mg</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-title">
                            Le tarif de base est de 100.000ar pour tout abonnement et s'ajoute de suite en fonction du nombre d'employé ajouté :
                        </p>
                        <div class="form-check mx-3 my-3">
                            <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault44">
                            <label class="form-check-label" for="flexRadioDefault44">
                                <b>3.000ar/employé : </b><span class="description">50 à 249 employés</span></label>
                        </div>
                        <div class="form-check mx-3 my-3">
                            <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault44">
                            <label class="form-check-label" for="flexRadioDefault44">
                                <b>3.000ar/employé : </b><span class="description">50 à 249 employés</span></label>
                        </div>
                        <div class="form-check mx-3 my-3">
                            <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault44">
                            <label class="form-check-label" for="flexRadioDefault44">
                                <b>3.000ar/employé : </b><span class="description">50 à 249 employés</span></label>
                        </div>
                        <input type="checkbox" class="btn-check" id="recrutement" name="recrutement">
                        <label class="btn btn-outline-success w-100" for="recrutement">Ajouter au panier</label><br>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow mt-5">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon">
                            <img class="card-img-top" src="{{ asset('img/logos_all/iconConge.webp') }}" alt="Card image cap">
                        </div>
                        <div class="ms-2">
                            <h6 class="mb-0">conge.mg</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-title">
                            Le tarif de base est de 100.000ar pour tout abonnement et s'ajoute de suite en fonction du nombre d'employé ajouté :
                        </p>
                        <div class="form-check mx-3 my-3">
                            <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault44">
                            <label class="form-check-label" for="flexRadioDefault44">
                                <b>3.000ar/employé : </b><span class="description">50 à 249 employés</span></label>
                        </div>
                        <div class="form-check mx-3 my-3">
                            <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault44">
                            <label class="form-check-label" for="flexRadioDefault44">
                                <b>3.000ar/employé : </b><span class="description">50 à 249 employés</span></label>
                        </div>
                        <div class="form-check mx-3 my-3">
                            <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault44">
                            <label class="form-check-label" for="flexRadioDefault44">
                                <b>3.000ar/employé : </b><span class="description">50 à 249 employés</span></label>
                        </div>
                        <input type="checkbox" class="btn-check" id="conge" name="conge">
                        <label class="btn btn-outline-success w-100" for="conge">Ajouter au panier</label><br>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow mt-5">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon">
                            <img class="card-img-top" src="{{ asset('img/logos_all/iconPaie.webp') }}" alt="Card image cap">
                        </div>
                        <div class="ms-2">
                            <h6 class="mb-0">paie.mg</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-title">
                            Le tarif de base est de 100.000ar pour tout abonnement et s'ajoute de suite en fonction du nombre d'employé ajouté :
                        </p>
                        <div class="form-check mx-3 my-3">
                            <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault44">
                            <label class="form-check-label" for="flexRadioDefault44">
                                <b>3.000ar/employé : </b><span class="description">50 à 249 employés</span></label>
                        </div>
                        <div class="form-check mx-3 my-3">
                            <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault44">
                            <label class="form-check-label" for="flexRadioDefault44">
                                <b>3.000ar/employé : </b><span class="description">50 à 249 employés</span></label>
                        </div>
                        <div class="form-check mx-3 my-3">
                            <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault44">
                            <label class="form-check-label" for="flexRadioDefault44">
                                <b>3.000ar/employé : </b><span class="description">50 à 249 employés</span></label>
                        </div>
                        <input type="checkbox" class="btn-check" id="paie" name="paie">
                        <label class="btn btn-outline-success w-100" for="paie">Ajouter au panier</label><br>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow mt-5">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon">
                            <img class="card-img-top" src="{{ asset('img/logos_all/iconPersonel.webp') }}" alt="Card image cap">
                        </div>
                        <div class="ms-2">
                            <h6 class="mb-0">temps.mg</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-title">
                            Le tarif de base est de 100.000ar pour tout abonnement et s'ajoute de suite en fonction du nombre d'employé ajouté :
                        </p>
                        <div class="form-check mx-3 my-3">
                            <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault44">
                            <label class="form-check-label" for="flexRadioDefault44">
                                <b>3.000ar/employé : </b><span class="description">50 à 249 employés</span></label>
                        </div>
                        <div class="form-check mx-3 my-3">
                            <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault44">
                            <label class="form-check-label" for="flexRadioDefault44">
                                <b>3.000ar/employé : </b><span class="description">50 à 249 employés</span></label>
                        </div>
                        <div class="form-check mx-3 my-3">
                            <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault44">
                            <label class="form-check-label" for="flexRadioDefault44">
                                <b>3.000ar/employé : </b><span class="description">50 à 249 employés</span></label>
                        </div>
                        <input type="checkbox" class="btn-check" id="temps" name="temps">
                        <label class="btn btn-outline-success w-100" for="temps">Ajouter au panier</label><br>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
</div>
</body>
</html>
