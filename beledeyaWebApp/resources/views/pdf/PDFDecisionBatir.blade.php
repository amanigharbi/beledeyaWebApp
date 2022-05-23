<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" charset="UTF-8">
    <title>{{$title}}</title>
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
        .info_commune{
        display:grid;
        margin-top: -25%;
        float: left; 
    }
 .img{
    width: 20%; 
    height: 25%;
    margin-left: 40%;
}
  .date{
    margin-top: -10%;
    margin-left: 70%;
    text-align: center;
  }
  .info_user{
    display:grid;
        margin-top: 10%;
        text-align: center;

  }
 
  .commune{
    margin-left: 50%; 
    display:grid;
  }
  .encadrer-un-contenu{ border: 1px solid black; padding: 5px; }
    </style>
</head>

<body>


    <img src="{{ $logo }}" alt="Menzel Abdelrahmane" class="img" />
    <div class="info_commune">
        <div>République Tunisienne</div>
        <div> Ministère de l'Intérieur </div>
        <div>Province de Bizerte</div>
        <div>Municipalité de Manzel Abd al-Rahman</div>
    </div>
  
    <div class="date">Menzel Abderrahman le {{ $date }}</div>
 
    <br><br>
    <div class="info_user">
        <div><b>Du</b> maire de la municipalité  d'Abd al-Rahman <b>A</b></div>
        <div> <b>Madame/Monsieur</b>{{ $nom }} {{ $prenom }}</div>
        <div><b>Adresse </b> {{ $adr }}</div>


    </div>
<br><br>

    <h3> Sujet: À propos du dossier de permis de construire</h3>
    <h4 style="font-style: italic;">Monsieur/Madame {{ $nom }} {{ $prenom }} titulaire de cin
        {{ $cin }}</h4>

    <p>Et après, selon le dossier de permis de construire déposé par vous concernant le bien situé dans la maison d'Abd al-Rahman, nous vous informons que votre dossier a été présenté à l'attention de la commission technique régionale des permis de construire lors de la séance tenue le
        {{$date_reunion}} .</p>
    <p>Et celle qui a donné son avis: <b>{{ $descision }} </b>
    </p>
    @if ($descision =="refus")
<p>Pour les raisons suivantes :</p>
<ul>
   
    <li type="circle"><b> {{ $reasons }} </b> </li>
</ul>
@else
<br><br>
<span class="encadrer-un-contenu" style="color: red">Très important.</span><br><br>
<span class="encadrer-un-contenu">Vu l'arrêté du ministre de l'équipement, de l'habitat et de l'aménagement du territoire en date du 17 avril 2007, relatif au contrôle des pièces constituant le dossier de permis de construire, sa durée de validité et sa prorogation, les conditions de son renouvellement, et notamment le chapitre brut de celui-ci, nous vous invitons à retirer le permis de construire dans un délai maximum d'un mois à compter de la date de ce média, faute de quoi il n'est plus valable.</span>
    @endif
    <br><br>
    <h4 class="commune"> Menzel Abderrahman le {{ $date }}</h4>
    <h4 class="commune" style="text-decoration: underline black;margin-left: 55%;"> Maire de la municipalité</h4>

<footer style="margin-top:25%;margin-left:45%">http://www.commune-menzel-abderrahmen.gov.tn</footer> 
  


    </body>

</html
