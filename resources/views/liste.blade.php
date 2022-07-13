<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{asset('assets/css/inputControl.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/index_accueil.css')}}">

    <style>
    .card{border: none}
    .card .image{
        height: 50%;
    }
    .card img{
        width: 20%;
    }
    .image .card-img-top{
        margin: 0 auto;
    }
    .card select{
        /* border: none */
    }

    .card .select-selected :after{
        border: none
    }
    .description{
        font-size:90%;
    }
    .form-check-input :hover{
        color:none
    }

    </style>
</head>
<body>
<div class="container">
    <h2>Formation.mg</h2>
    <div class="row">
        <div class="card  col-md-5 mt-5">
            <div class="image">
                <img class="card-img-top" src="{{ asset('img/logos_all/iconFormation.webp') }}" alt="Card image cap">
            </div>
            <div class="card-body">
                <h5 class="card-title">organisme de formation</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="of" id="flexRadioDefault0">
                    <label class="form-check-label" for="flexRadioDefault0">aucun</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="of" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        <b>TPE - 100.000ar/mois :</b><span class="description"> 1 utilisateur - 1 formateur - 1 à 9 employés</span> </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="of" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        <b>PME - 200.000ar/mois : </b><span class="description"> 2 utilisateur - 2 formateur - 10 à 49 employés</span></label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="of" id="flexRadioDefault3">
                    <label class="form-check-label" for="flexRadioDefault3">
                        <b>EI - 300.000ar/mois : </b><span class="description"> 3 utilisateur - 4 formateur - 50 à 249 employés</span></label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="of" id="flexRadioDefault4">
                    <label class="form-check-label" for="flexRadioDefault4">
                        <b>GE - 400.000ar/mois : </b><span class="description"> illimité - illimité - illimité</span></label>
                </div>
            </div>
        </div>
        <div class="card  col-md-5 mt-5">
            <div class="image">
                <img class="card-img-top" src="{{ asset('img/logos_all/iconFormation.webp') }}" alt="Card image cap">
            </div>
            <div class="card-body">
                <h5 class="card-title">entreprise</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault0">
                    <label class="form-check-label" for="flexRadioDefault0">aucun</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        <b>TPE - 100.000ar/mois : </b><span class="description"> 1 utilisateur - 1 formateur - 1 à 9 employés</span></label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        <b>PME - 200.000ar/mois : </b><span class="description"> 2 utilisateur - 2 formateur - 10 à 49 employés</span></label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault3">
                    <label class="form-check-label" for="flexRadioDefault3">
                        <b>EI - 300.000ar/mois : </b><span class="description"> 3 utilisateur - 4 formateur - 50 à 249 employés</span></label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="entreprise" id="flexRadioDefault4">
                    <label class="form-check-label" for="flexRadioDefault4">
                        <b>GE - 400.000ar/mois : </b><span class="description"> illimité - illimité - illimité</span></label>
                </div>
            </div>
        </div>
    </div>
    <h2>Autres offres</h2>
    <div class="row">
        <div class="card  col-md-4 mt-5">
            <div class="image">
                <img class="card-img-top" src="{{ asset('img/logos_all/iconPersonel.webp') }}" alt="Card image cap">
            </div>
                <div class="card-body">
                <h5 class="card-title">personnel.mg</h5>
                <p class="card-text"> 100.000ar + 3000ar/Employé</p>
                <input type="checkbox" class="btn-check" id="personnel" name="personnel">
                <label class="btn btn-outline-success" for="personnel">Ajouter au panier</label><br>
            </div>
        </div>
            <div class="card  col-md-4 mt-5">
            <div class="image">
                <img class="card-img-top" src="{{ asset('img/logos_all/iconRecrutement.webp') }}" alt="Card image cap">
            </div>
                <div class="card-body">
                <h5 class="card-title">recrutement.mg</h5>
                <p class="card-text"> 200.000ar + 3000ar/Employé</p>
                <input type="checkbox" class="btn-check" id="recrutement" name="recrutement">
                <label class="btn btn-outline-success" for="recrutement">Ajouter au panier</label><br>
            </div>
        </div>
        <div class="card  col-md-4 mt-5">
            <div class="image">
                <img class="card-img-top" src="{{ asset('img/logos_all/iconConge.webp') }}" alt="Card image cap">
            </div>
                <div class="card-body">
                <h5 class="card-title">conge.mg</h5>
                <p class="card-text"> 200.000ar + 3000ar/Employé</p>
                <input type="checkbox" class="btn-check" id="conge" name="conge">
                <label class="btn btn-outline-success" for="conge">Ajouter au panier</label><br>
            </div>
        </div>
        <div class="card  col-md-4 mt-5">
            <div class="image">
                <img class="card-img-top" src="{{ asset('img/logos_all/iconPaie.webp') }}" alt="Card image cap">
            </div>
                <div class="card-body">
                <h5 class="card-title">paie.mg</h5>
                <p class="card-text"> 100.000ar + 3000ar/Employé</p>
                <input type="checkbox" class="btn-check" id="paie" name="paie">
                <label class="btn btn-outline-success" for="paie">Ajouter au panier</label><br>
            </div>
        </div>
        <div class="card  col-md-4 mt-5">
            <div class="image">
                <img class="card-img-top" src="{{ asset('img/logos_all/iconPersonel.webp') }}" alt="Card image cap">
            </div>
                <div class="card-body">
                <h5 class="card-title">temps.mg</h5>
                <p class="card-text"> 50.000ar + 3000ar/Employé</p>
                <input type="checkbox" class="btn-check" id="temps" name="temps">
                <label class="btn btn-outline-success" for="temps">Ajouter au panier</label><br>
            </div>
        </div>

    </div>

    {{-- <form method="POST" action="{{route('izay tinao')}}" enctype="multipart/form-data"> --}}

    <div class="container pt-5 contact_content pb-5">
        <div class="row mt-5">
            <div class="col-12">
                <div class="row contact_form">
                    <div class="col-6">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control input" name="nom_type" id="input" name="off" required>
                            <label for="input" class="form-control-placeholder">Nom</label>
                            @error('nom_type')
                            <div class="col-sm-6">
                                <span style="color:#ff0000;"> {{$message}} </span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input" name="prix_fixe" name="off" required>
                            <label for="input" class="form-control-placeholder">Prix Fixe</label>
                            @error('prix_fixe')
                            <div class="col-sm-6">
                                <span style="color:#ff0000;"> {{$message}} </span>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input" name="prix_par_employe" name="off" required>
                            <label for="input" class="form-control-placeholder">Prix Par Employe</label>
                            @error('prix_par_employe')
                            <div class="col-sm-6">
                                <span style="color:#ff0000;"> {{$message}} </span>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control input" name="objet" name="off" required>
                            <label for="input" class="form-control-placeholder">Nombre minimun d'employé</label>
                            @error('objet')
                            <div class="col-sm-6">
                                <span style="color:#ff0000;"> {{$message}} </span>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control input" name="objet" name="off" required>
                            <label for="input" class="form-control-placeholder">Nombre maximum d'employé</label>
                            @error('objet')
                            <div class="col-sm-6">
                                <span style="color:#ff0000;"> {{$message}} </span>
                            </div>
                            @enderror
                        </div>
                        <div class="justify-content-right">
                            <button class="btn commencer" type="submit">Enregister</button>
                        </div>
                    </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
