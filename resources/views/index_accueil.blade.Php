<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- Lien font awesome icons --}}
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="shortcut icon" href="{{asset('img/logos_all/iconRecrutement.webp') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('assets/css/index_accueil.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <title> RH.mg - Logiciel de gestion de temps </title>
</head>

<body>
    <button type="button" class="btn btn-floating btn-lg" id="btn-back-to-top">
        <i class="fa fa-arrow-up"></i>
    </button>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top pb-0">
            <div class="container-fluid">
                <div class="left_menu ms-2">
                    <a href="{{route('accueil_perso')}}">
                        <p class="titre_text m-0 p-0">
                            <img class="img-fluid" src="{{ asset('img/logos_all/iconRecrutement.webp') }}" alt="logo">
                            RH.mg
                        </p>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown icon_background">
                            <a class="nav-link dropdown-toggle links" href="" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Solutions</a>
                            <ul class="dropdown-menu p-3" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item pt-2" href="#" rel="noopener noreferrer"><i
                                            class="far fa-mouse-pointer center icon_back"></i> &nbsp; Gestion collaborative de formation </a></li>
                                <li><a class="dropdown-item pt-2" href="#" rel="noopener noreferrer"><i
                                            class="fad fa-clipboard icon_back6"></i> &nbsp; Gestion de salaire</a></li>
                                <li><a class="dropdown-item pt-2" href="#" rel="noopener noreferrer"><i
                                            class="far fa-user icon_back5"></i> &nbsp; Suivie d'heure de travail</a></li>
                                <li><a class="dropdown-item pt-2" href="#" rel="noopener noreferrer"><i
                                            class="fad fa-file-alt icon_back2"></i> &nbsp; Gestion de congée</a>
                                </li>
                                <li><a class="dropdown-item pt-2" href="#" rel="noopener noreferrer"><i
                                            class="fad fa-calendar-check icon_back4"></i> &nbsp; Gestion du personnel</a></li>
                                <li><a class="dropdown-item pt-2" href="#" rel="noopener noreferrer"><i
                                            class="fad fa-search icon_back9"></i> &nbsp; Recrutement </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item ms-2">
                            <a class="nav-link links " href="{{url('tarifs')}}" target="_blank" rel="noopener noreferrer">Tarifs</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link links" href="#apropos">À propos</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link links" href="{{url('contact')}}" target="_blank" rel="noopener noreferrer">Contactez-nous</a>
                        </li>

                    </ul>
                    <div class="menu_action">
                        <ul class="d-flex">
                            <li class="nav-item">
                                <a href="{{ route('sign-in') }}" class="btn_login me-2" role="button">Se connecter</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="">
        <div class="container-fluid g-0 p-0">
            <section class="section1 mb-5">
                <div class="row h-100">
                    <div class="container p-0 g-0">
                        <div class="col-6 section1_text g-0 m-0">
                            <h1>Le Logiciel qui vous aide à gérer votre entreprise</h1>
                            <p class="pt-5 pe-5">Planifiez les formations de vos employés en collaborant avec plusieurs organismes de formations,
                                Gérez les congés, les salaires, et leurs heures de travails. <br>
                                Dès leur recrutement jusqu'à leur sortie. RH.mg est là pour vous aider !
                            </p>
                            <a href="{{ route('sign-in') }}" role="button" class="commencer">Commencer</a>
                        </div>
                    </div>
                </div>
            </section>
            <div id="apropos"></div>
            <section class="section2">
                <div class="row">
                    <div class="container">
                        <h2 class="text-center mt-3">Gérez votre personnel où vous voulez.</h2>
                        <div class="text_about">
                            <p >RH.mg offre la meilleur de l'innovation numérique aux
                                différentes petites et grandes entreprises.
                                <br> Vous travaillez depuis chez vous ou en déplacement ? <br>
                                Nos solutions sont à vos côtés partout où vous en avez besoin. Aucune installation ni aucun
                                téléchargement ne sont requis. Tout ce dont vous avez besoin pour gérer votre personnel
                                est ici, dans votre navigateur Internet.
                            </p>
                        </div>
                        <div class="col-12 section2_img">
                            <lottie-player src="{{asset('lottie/home.json')}}" background="transparent"  speed="0.6"  style="width: 100%;" loop autoplay></lottie-player>
                        </div>
                    </div>
                </div>
            </section>
            <div class="gray-background">
            <section class="section4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 text">
                            <h2 class="mb-5">Une solution qui s'adapte à vos besoins et non l'inverse</h2>
                            <p>Adaptez RH.mg aux besoins de votre entreprise. Tableaux de bord et flux de travail personnalisés?
                                Automatisation sur mesure pour les équipes afin de simplifier les processus ? RH.mg vous offre tout
                                ce dont vous avez besoin pour travailler à votre manière.
                            </p>
                            <p>
                                Personne d'autre n'offre une telle polyvalence...
                            </p>

                        </div>
                        <div class="col-6 image">
                            <img src="{{asset('images/background_images/16section7 - copie.webp')}}" alt="image1" class="img-fluid">
                        </div>
                    </div>
                </div>
            </section>
        </div>
            <section class="section6">
                <div class="row">
                    <div class="container">
                        <h2 class="text-center mb-5">Notre large gamme de solution</h2>
                        <div class="text_about mb-5">
                            <p >
                                Vous pouvez nous confier uniquement la gestion collaboratif de formation, mais aussi vous faire accompagner
                                sur la gestion des salaires, des congés et absences, et du personnel.
                            </p>
                        </div><div class="card_fonctions mt-5">
                            <div class="container">
                                <div class="row mb-5">
                                    <div class="col-4 card_content">
                                        <a href="https://formation.mg/" target="_blank" rel="noopener noreferrer">
                                            <div class="icon text-center">
                                                <img class="img-fluid" src="{{ asset('img/logos_all/iconFormation.webp') }}" alt="logo">
                                            </div>
                                            <h4 class="mt-4 text-center">Formations et compétences</h4>
                                            <p class="text-center">Collaborez avec des organismes de formations et gérez vos propres formations en entreprises.</p>
                                        </a>
                                    </div>
                                    <div class="col-4 card_content">
                                        <a href="http://paie.mg/" target="_blank" rel="noopener noreferrer">
                                            <div class="icon text-center">
                                                <img class="img-fluid" src="{{ asset('img/logos_all/iconPaie.webp') }}" alt="logo">
                                            </div>
                                            <h4 class="mt-4 text-center">Calculateur de Salaire</h4>
                                            <p class="text-center">Distribuez facilement le salaire de vos employés avec notre logiciel de Paie.</p>
                                        </a>
                                    </div>
                                    <div class="col-4 card_content">
                                        <a href="http://temps.mg/" target="_blank" rel="noopener noreferrer">
                                            <div class="icon text-center">
                                                <img class="img-fluid" src="{{ asset('img/logos_all/iconPersonel.webp') }}" alt="logo">
                                            </div>
                                            <h4 class="mt-4 text-center">Logiciel de Pointage</h4>
                                            <p class="text-center">Gérez l'entre et sortie de vos personnels ainsi que leurs heures supplémentaires et complémentaires.</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-4 card_content">
                                        <a href="http://conge.mg/" target="_blank" rel="noopener noreferrer">
                                            <div class="icon text-center">
                                                <img class="img-fluid" src="{{ asset('img/logos_all/iconConge.webp') }}" alt="logo">
                                            </div>
                                            <h4 class="mt-4 text-center">Congée et abscences</h4>
                                            <p class="text-center">Listez les abscences de chaque employés et comparez en faveur de leur congés restants.</p>
                                        </a>
                                    </div>
                                    <div class="col-4 card_content">
                                        <a href="http://personnel.mg/" target="_blank" rel="noopener noreferrer">
                                            <div class="icon text-center">
                                                <img class="img-fluid" src="{{ asset('img/logos_all/iconPersonel.webp') }}" alt="logo">
                                            </div>
                                            <h4 class="mt-4 text-center">Gestion Du Personnel</h4>
                                            <p class="text-center">Stockez tous ce qui concerne votre entreprise, vos employés et leurs informations personnels nécessaires.</p>
                                        </a>
                                    </div>
                                    <div class="col-4 card_content">
                                        <a href="http://recrutement.mg/" target="_blank" rel="noopener noreferrer">
                                            <div class="icon text-center">
                                                <img class="img-fluid" src="{{ asset('img/logos_all/iconRecrutement.webp') }}" alt="logo">
                                            </div>
                                            <h4 class="mt-4 text-center">Recrutement</h4>
                                            <p class="text-center">Gérez facilement l'entrée des candidats, l'envoie de CV et les differents tests d'aptitudes qu'ils doivent faire.</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 text">
                            <h2 class="mb-5 text-center text-white">Parlons de vos projets !</h2>
                        </div>
                        <div class="col-6 image text-center">
                            <a href="{{url('contact')}}" target="_blank" rel="noopener noreferrer" role="button" class="commencer">Nous contacter</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section7">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-4 image ps-5">
                            <lottie-player src="{{asset('lottie/temps.json')}}" background="transparent"  speed="0.6"  style="width: 75%;" loop autoplay></lottie-player>
                        </div>
                        <div class="col-8 text">
                            <h1 class="mb-5">Simplifiez votre quotidien avec RH.mg</h1>
                            <p>Votre métier nécessite une gestion administrative et une organisation sans faille.<br>
                                Découvrez comment RH.mg peut vous aider à atteindre vos objectifs plus facilement.
                            </p>
                            <a href="{{ route('sign-in') }}" role="button" class="commencer">Commencer</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section8">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text d-flex flex-column">
                            <a href="{{url('contact')}}" class="text-uppercase text-center mb-3" rel="noopener noreferrer" target="_blank">contact@formation.mg</a>
                            <a href="{{url('contact')}}" target="_blank" rel="noopener noreferrer" class="text-uppercase text-center">034&nbsp;03&nbsp;876&nbsp;09</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <footer>
        <section class="section9">
            <div class="container-fluid">
                <div class="row d-flex flex-column">
                    <div class="d-flex mb-3">
                        <div class="bordure">&copy; Copyright 2022</div>
                        <div class="bordure"><a href="{{url('info_legale')}}" target="_blank" rel="noopener noreferrer">Informations légales</a></div>
                        <div class="bordure"><a href="{{url('contact')}}" target="_blank" rel="noopener noreferrer">Contactez-nous</a></div>
                        <div class="bordure"><a href="{{url('politique_confidentialites')}}" target="_blank" rel="noopener noreferrer">Politique de
                                confidentialités</a></div>

                        <div class="bordure">
                            <a href="{{route('condition_generale_de_vente')}}" target="_blank" rel="noopener noreferrer">
                                Condition
                                d'utilisation
                            </a>
                        </div>
                        <div class="bordure"> <a href="{{url('tarifs')}}" target="_blank" rel="noopener noreferrer"> Tarifs</a></div>
                        <div class="bordure"><a href="#" target="_blank" rel="noopener noreferrer">Crédits</a></div>
                        <div class="ps-3 version">V 1.0.9</div>
                    </div>
                    <div class="droits">2022 @ RH.mg - Tous les droits sont réservés -
                        <span>
                        <a href="{{route('condition_generale_de_vente')}}" target="_blank" rel="noopener noreferrer">
                            CGU
                        </a>
                        </span>
                    </div>
                </div>
            </div>
        </section>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
        let mybutton = document.getElementById("btn-back-to-top");
        window.onscroll = function () {
            scrollFunction();
        };
        function scrollFunction() {
        if (
            document.body.scrollTop > 300 ||
            document.documentElement.scrollTop > 300
        ) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }
        mybutton.addEventListener("click", backToTop);
        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>

</html>
