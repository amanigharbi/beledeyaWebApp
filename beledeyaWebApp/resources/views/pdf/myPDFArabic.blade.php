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
       
  body{
    font-family: XBRiyaz;
    /* text-align:right; */
    direction:rtl;
  }
    
  
    </style>
</head>

<body>

    <img src="{{ $logo }}" alt="Menzel Abdelrahmane" style="width: 10%; height: 10%" />
    <div style="display:grid;">
        <div>بلدية منزل عبد الرحمان</div>
        <div>  الهاتف 125 570 70 / 295 571 70 </div>
        <div>الفاكس 125 570 70</div>
        <div>communemenzelabderrahmen@gmail.com</div>
        <div>  نهج المنجي سليم 7035 بنزرت </div>
    </div>
    <br><br>
    <div style="display:grid;">
        <div> السيد/السيدة: {{ $nom }} {{ $prenom }}</div>
        <div>  العنوان: {{ $adr }}</div>
        <div> البريد الالكتروني: {{ $email }} </div>
        <div>  بنزرت في : {{ $date }}</div>

    </div>

    <br><br><br><br><br>
    <h3> {{ $h3_title }}</h3>
    <h3> {{$type_doc}}</h3>
    <h4 style="font-style: italic;">  
        السيد او السيدة {{ $nom }} {{ $prenom }} صاحب/صاحبة بطاقة التعريف الوطنية عدد 
        {{ $cin }}   </h4>
    <p>{{$p1}}
    </p>
    <p>
        يمكنك اتباع شكواك من نوع <b>{{$type_doc}}</b> عن طريق الرقم <b> {{ $num }}</b>
        </p>
    <p>السيد/السيدة ,<b>{{ $nom }} {{ $prenom }}</b> ,
        لك اطيب التحيات 
    </p>
  
    <br><br><br>
    <h4 style="display:grid">بلدية منزل عبد الرحمان</h4>
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
