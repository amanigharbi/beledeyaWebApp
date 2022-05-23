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
      margin-top: -16%;
        margin-left: 10%; 
    }
 .img{
    width: 10%; 
    height: 15%;
 }
  
  .info_user{
    display:grid;
    margin-left: 65%;
  }
 
  .commune{
    margin-left: 45%; 
    display:grid;
  }
    </style>
</head>

<body>


    <img src="{{ $logo }}" alt="Menzel Abdelrahmane" class="img" />
    <div class="info_commune">
        <div>Commune de MANZEL ABDERRAHMAN</div>
        <div> <b>Tel</b> (+216) 72 570 125/ (+216) 72 571 295 </div>
        <div><b>Fax</b> (+216) 72 570 125</div>
        <div>communemenzelabderrahmen@gmail.com</div>
        <div> Rue El Mongi Slim 7035 menzel abdel rahmen</div>
    </div>
    <br><br>
    <div class="info_user">
        <div><b>Madame/Monsieur</b>:{{ $nom }} {{ $prenom }}</div>
        <div><b>Adresse</b> : {{ $adr }}</div>
        <div><b>Email</b>: {{ $email }}</div>
        <div><b>Menzel Abderrahman le /<b> {{ $date }}</div>

    </div>
<br><br>
    <h3> {{ $h3_title }}</h3>
    <h3> <b>Décharge de</b> {{$type_doc}}</h3>
    <h4 style="font-style: italic;">Monsieur/Madame {{ $nom }} {{ $prenom }} titulaire de cin
        {{ $cin }}</h4>
    <p>{{$p1}}
    </p>
    <p>
        Vous pouvez suivre votre <b>{{$type_doc}}</b> a travers ce numéro <b> {{ $num }}</b>
        pour restez en contact de tous.</p>
    <p>Veuillez recevoir, Madame, ou Monsieur ,<b>{{ $nom }} {{ $prenom }}</b> ,
        nos salutations distinguées
    </p>
    <br>

@if ( $exist_doc == true)
<p style="color: red"> Merci d'apporter <b> ce document à la municipalité </b> accompagné <b>des documents suivants </b> pour terminer les procédures </p>
<ul>
    <li> {{$doc1}} </li>
    <li> {{$doc2}} </li>
    <li> {{$doc3}} </li>
    <li> {{$doc4}} </li>
    <li> {{$doc5}} </li>
  
</ul>
<br>
<h4 class="commune">Commune de Menzel Abderrahmane</h4>
     <footer style="margin-top:13%;margin-left:45%">http://www.commune-menzel-abderrahmen.gov.tn</footer> 

@else
<br>
<h4 class="commune">Commune de Menzel Abderrahmane</h4>
<footer style="margin-top:35%;margin-left:45%">http://www.commune-menzel-abderrahmen.gov.tn</footer> 
  
@endif

    </body>

</html
