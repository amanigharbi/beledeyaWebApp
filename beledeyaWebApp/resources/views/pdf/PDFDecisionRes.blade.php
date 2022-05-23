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
        <div>Autorisation d'amener d' <b>{{$type}}</b></div>


    </div>
<br><br>


    <p>Le maire de Menzel Abderrahmane, après examen de la demande présentée par M./Mme <b>{{$nom }} {{$prenom }}</b>, 
        d'approvisionner son commerce
         situé en <b> {{$adr}}</b> en <b>{{$type}}</b>de la <b>{{$type_soc}}</b> .</p>
    
    <p> Et selon la session locale d'attribution des licences de raccordement aux réseaux publics pour les bâtiments construits sans licence, tenue au siège 
        de la municipalité de Manzil Abd al-Rahman le <b>{{$date_reunion}}</b></p>
        <p>Et sur la base de l'approbation de M. Gouverneur de Bizerte en date du <b>{{$date_gouv}}</b>
             et du bordereau d'expédition de l'etat n° 13/972 en date du <b>{{$date_gouv_ar}}</b></p>
  
  <p>Autorisé à M.Mme <b> {{$nom}} {{$prenom}}</b> </p>
       <p> <b> Raccordement de ses locaux précités au réseau public de {{$type_res}}</b></p>
             
<p>Ce certificat a été délivré aux intérêts de la <b>{{$type_soc}}</b></p>
<h5><b>Numéro dossier:</b> {{$num}}</h5>
<br><br>

    <h4 class="commune"> Menzel Abderrahman le {{ $date }}</h4>
    <h4 class="commune" style="text-decoration: underline black;margin-left: 55%;"> Maire de la municipalité</h4>

<footer style="margin-top:25%;margin-left:45%">http://www.commune-menzel-abderrahmen.gov.tn</footer> 
  


    </body>

</html
