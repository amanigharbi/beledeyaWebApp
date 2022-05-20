<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
       
      /* * { font-family: DejaVu Sans, sans-serif;
      direction: rtl;
    } */
  
    </style>
</head>

<body style="font-family: DejaVu Sans; direction:rtl;">


    <img src="{{ $logo }}" alt="Menzel Abdelrahmane" style="width: 10%; height: 10%" />
    <div style="display:grid;float:right;">
        <div>بلدية منزل عبد الرحمان</div>
        <div>  70 570 125 / 72 571 295 الهاتف </div>
        <div>الفاكس 72 570 125</div>
        <div>communemenzelabderrahmen@gmail.com</div>
        <div>  نهج المنجي سليم 7035 بنزرت </div>
    </div>
    <br><br>
    <div style="display:grid;float:left">
        <div>{{ $nom }} {{ $prenom }} :السيد/السيدة</div>
        <div> {{ $adr }} :ب (ة) القاطن</div>
        <div> {{ $email }} :البريد الالكتروني</div>
        <div> {{ $date }} :بنزرت في </div>

    </div>

    <br><br><br><br><br>
    <h3> {{ $h3_title }}</h3>
    <h3> {{$type_doc}} :ملخص عن</h3>
    <h4 style="font-style: italic;">  {{ $cin }} بطاقة التعريف الوطنية عدد (ة)صاحب {{ $nom }} {{ $prenom }} السيد/السيدة </h4>
    <p>{{$p1}}
    </p>
    <p>
        <b> {{ $num }}</b> عن طريق الرقم <b> {{$type_doc}}<b> يمكنك اتباع شكواك من نوع </p>
    <p>لك اطيب التحيات  {{ $nom }} {{ $prenom }} السيد/السيدة 
       
    </p>
    <br><br><br>
    <h4 style="display:grid;float:left">Commune de Menzel Abderrahmane</h4>
<br><br><br>
@if ( $exist_doc == true)
<p style="color: red"> لاتمام الاجراءات <b> مع الاوراق التالية </b>  <b> هذه الوثيقة إلى البلدية</b> يرجى إحضار 
</p>
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
