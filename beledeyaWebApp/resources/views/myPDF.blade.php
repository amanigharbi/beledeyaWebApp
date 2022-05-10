<!DOCTYPE html>
<html>

<head>
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
    <h3> Numéro réclamation: {{ $numRec }}</h3>
    <h3> Décharge de réclamation de : {{ $type }}</h3>
    <h4 style="font-style: italic;">Monsieur/Madame {{ $nom }} {{ $prenom }} titulaire de cin
        {{ $cin }}</h4>
    <p>Nous avons bien reçu votre réclamation de type <b>{{ $type }}</b> et de description<b> {{ $des}}
       </b>. Nous essayons de corriger le problème dés que possible.
    </p>
    <p>
        Vous pouvez suivre votre réclamation a travers ce numéro <b> {{ $numRec }}</b>
        pour restez en contact de tous.</p>
    <p>Veuillez recevoir, Madame, ou Monsieur ,<b>{{ $nom }} {{ $prenom }}</b> ,
        nos salutations distinguées
    </p>
    <br><br><br>
    <h4 style="display:grid;float:right">Commune de Menzel Abderrahmane</h4>

    <footer style="margin-top:50%;margin-left:50%">http://www.commune-menzel-abderrahmen.gov.tn</footer>
</body>

</html
