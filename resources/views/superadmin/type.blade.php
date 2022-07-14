<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="{{asset('assets/css/inputControl.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/index_accueil.css')}}">
</head>
<body>
    <form method="POST" action="{{route('abonnement.store')}}" enctype="multipart/form-data">
        <div class="container pt-5 contact_content pb-5">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="row contact_form">
                        <div class="col-6">
                            @if (Session::has('success'))
                                 <div class="alert alert-info">{{ Session::get('success') }}</div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <select name="nom_type" class="form-select input_select" id="type">
                                    <option value="null">Choisissez le type de service...</option>
                                    @foreach ($service as $serv )
                                        <option value = {{$serv->id}}>{{$serv->type_service}}</option>
                                    @endforeach
                                </select><br>

                                @error('nom_type')
                                <div class="col-sm-6">
                                    <span style="color:#ff0000;"> {{$message}} </span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input" name="prix_fixe" id="prix_fixe"  required>
                                <label for="input" class="form-control-placeholder">Prix Fixe</label>
                                @error('prix_fixe')
                                <div class="col-sm-6">
                                    <span style="color:#ff0000;"> {{$message}} </span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input" name="prix_par_employe"  required>
                                <label for="input" class="form-control-placeholder">Prix Par Employe</label>
                                @error('prix_par_employe')
                                <div class="col-sm-6">
                                    <span style="color:#ff0000;"> {{$message}} </span>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="number" class="form-control input" name="min_emp"  required>
                                <label for="input" class="form-control-placeholder">Nombre minimun d'employé</label>
                                @error('objet')
                                <div class="col-sm-6">
                                    <span style="color:#ff0000;"> {{$message}} </span>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="number" class="form-control input" name="max_emp"  required>
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
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script>
    //  $("#type" ).on( "change", function() {
    //     var id_service = $(this).val();
    //     $.ajax({
    //         type: "GET",
    //         url: "{{route('verification')}}",
    //         data:{Id:id_service},
    //         dataType: "html",
    //         success:function(response){
    //             var userData=JSON.parse(response);
    //             console.log(userData);
    //             for (var i = 0; i < userData.length; i++){
    //                 if(userData[i] != null) {
    //                     $('#prix_fixe').attr('disabled','disabled');
    //                     $('#prix_fixe').val(userData[i].prix_fixe);
    //                 }

    //             }

    //         },
    //         error:function(error){
    //             console.log(error)
    //         }
    //     });
    //  });
</script>
</html>
