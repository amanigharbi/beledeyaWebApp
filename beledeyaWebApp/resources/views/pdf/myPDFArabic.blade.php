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
    font-family: XBRiyaz ;
    /* text-align:right; */
    direction:rtl;
}
    .info_commune{
        display:grid;
      margin-top: -16%;
        margin-right: 10%; 
    }
 .img{
    width: 10%; 
    height: 15%;
 }
  
  .info_user{
    display:grid;
    margin-right: 65%;
  }
 
  .commune{
    margin-right: 65%; 
    display:grid;
  }
    </style>
</head>

<body>

    <img src="{{ $logo }}" alt="Menzel Abdelrahmane" class="img" />
    <div class="info_commune">
        <div>بلدية منزل عبد الرحمان</div>
        <div>  الهاتف 125 570 70 / 295 571 70 </div>
        <div>الفاكس 125 570 70</div>
        <div>communemenzelabderrahmen@gmail.com</div>
        <div>  نهج المنجي سليم 7035 بنزرت </div>
    </div>
    <br><br>
    <div class="info_user">
        <div> السيد/السيدة: {{ $nom }} {{ $prenom }}</div>
        <div>  العنوان: {{ $adr }}</div>
        <div> البريد الالكتروني: {{ $email }} </div>
        <div>  بنزرت في : {{ $date }}</div>

    </div>

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
<br>
    <h4 class="commune">بلدية منزل عبد الرحمان</h4>
<br>
@if ( $exist_doc == true)
<p style="color: red"> لاتمام الاجراءات <b> مع الاوراق التالية </b>  <b> هذه الوثيقة إلى البلدية</b> يرجى إحضار 
</p>
<ul>
    <li type="circle"> test test </li>
    <li type="circle"> test test </li>
    <li type="circle"> test test </li>
</ul>
     <footer style="margin-top:15%;margin-left:45%">http://www.commune-menzel-abderrahmen.gov.tn</footer> 

@else
<footer style="margin-top:35%;margin-left:45%">http://www.commune-menzel-abderrahmen.gov.tn</footer> 
  
@endif

    </body>

</html
