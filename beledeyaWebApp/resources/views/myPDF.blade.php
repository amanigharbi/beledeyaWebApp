<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" charset="UTF-8">
    <title>Reclamation</title>
    <link rel="icon" href="{{ $logo }}" type="image/x-icon">

    <style>
        .box {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px 2em;
        }

        .box :first-child {
            align-self: center;
        }

    </style>
</head>

<body>
    {{-- <div class="row justify-content-start">
        <div class="col-lg-3">
            <img src="{{ $logo }}" alt="Menzel Abdelrahmane" style="width: 10%; height: 10%"/>
        </div>
    </div> --}}

    <img src="{{ $logo }}" alt="Menzel Abdelrahmane" style="width: 10%; height: 10%" />
    <div style="display:grid;">
        <div>Commune de MANZEL ABDERRAHMAN</div>
        <div> Tel (+216) 72 570 125/ (+216) 72 571 295 </div>
        <div>Fax (+216) 72 570 125</div>
        <div>communemenzelabderrahmen@gmail.com</div>
        <div> Rue El Mongi Slim 7035 menzel abdel rahmen</div>
    </div>
    <br><br>
    <div style="display:grid;float:right">
        <div>Nom et prénom :{{ $nom }} {{ $prenom }}</div>
        <div>Adresse : {{ $adr }}</div>
        <div>Email: {{ $email }}</div>
        <div>Bizerte le {{ $date }}</div>

    </div>

    <br><br><br><br><br>
    <h3> {{ $h3_title }}</h3>
    <h3> Décharge de {{$type_doc}}</h3>
    <h4 style="font-style: italic;">Monsieur/Madame {{ $nom }} {{ $prenom }} titulaire de cin
        {{ $cin }}</h4>
    <p>{{$p1}}
    </p>
    <p>
        Vous pouvez suivre votre {{$type_doc}} a travers ce numéro <b> {{ $num }}</b>
        pour restez en contact de tous.</p>
    <p>Veuillez recevoir, Madame, ou Monsieur ,<b>{{ $nom }} {{ $prenom }}</b> ,
        nos salutations distinguées
    </p>
    <br><br><br>
    <h4 style="display:grid;float:right">Commune de Menzel Abderrahmane</h4>
<br><br><br>
@if ( $exist_doc == true)
<p style="color: red"> Merci d'apporter <b> ce document à la municipalité </b> accompagné <b>des documents suivants </b> pour terminer les procédures </p>
<ul>
    <li type="circle"> test test </li>
    <li type="circle"> test test </li>
    <li type="circle"> test test </li>
</ul>
     <footer style="margin-top:15%;margin-left:50%">http://www.commune-menzel-abderrahmen.gov.tn</footer> 

@else
<footer style="margin-top:35%;margin-left:50%">http://www.commune-menzel-abderrahmen.gov.tn</footer> 
  
@endif

    </body>

</html
