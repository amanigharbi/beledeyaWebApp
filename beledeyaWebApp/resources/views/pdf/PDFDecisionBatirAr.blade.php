<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" charset="UTF-8">
    <title>{{$title}}</title>
    <link rel="icon" href="{{ $logo }}" type="image/x-icon">

    <style>
          body{
    font-family: XBRiyaz ;
    /* text-align:right; */
    direction:rtl;
}
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
        float: right; 
    }
 .img{
    width: 20%; 
    height: 25%;
   margin-right: 40%;
 }
  .date{
    margin-top: -15%;
    margin-right: 60%;
    text-align: center;
  }
  .info_user{
    display:grid;
        margin-top: 10%;
        text-align: center;
  }
 
  .commune{
    margin-right: 50%; 
    display:grid;
  }
  .encadrer-un-contenu{ border: 1px solid black; padding: 5px; }
    </style>
</head>

<body>


    <img src="{{ $logo }}" alt="Menzel Abdelrahmane" class="img" />
    <div class="info_commune">
        <div>الجمهورية التونسية</div>
        <div> وزارة الداخلية </div>
        <div>ولاية بنزرت </div>
        <div>بلدية منزل عبد الرحمان</div>
    </div>

    <div class="date"> منزل عبد الرحمان في  {{ $date }}</div>
   
    <br><br>
    <div class="info_user">
        <div>من رئيس/رئيسة البلدية الى </div>
        <div> السيد/السيدة :{{ $nom }} {{ $prenom }}</div>
        <div> القاطن/القاطنة ب  : {{ $adr }}</div>


    </div>
<br><br>

    <h3>الموضوع: حول ملف رخصة البناء  </h3>
    <h4 style="font-style: italic;">  
        السيد او السيدة {{ $nom }} {{ $prenom }} صاحب/صاحبة بطاقة التعريف الوطنية عدد 
        {{ $cin }}   </h4>
   
    <p>وبعد تبعا لملف رخصة البناء المقدم من طرفكم حول العقار الموجود بمنزل عبد الرحمان نعلمكم انه تم عرض ملفكم على انضار اللجنة الفنية الجهوية لرخص البناء في الجلسة المنعقدة بتاريخ 
        {{$date_reunion}} .</p>
    <p>و التي ابدت رايها ب : ,<b>{{ $descision }} </b>
    </p>
    @if ($descision =="عدم الموافقة")
<p> للاسباب التالية  :</p>
<ul>
   
    <li> {{ $reasons }} </li>
</ul>
@else
<span class="encadrer-un-contenu" style="color: red">هام جدا.</span>
<br><br>
<span class="encadrer-un-contenu">
    بناء على قرار اليدة وزيرة التجهيز و الاكان و التهيئة الترابية المؤرخ في 17 افريل 2007 المتعلق بضبط الوثائق المكونة لملف رخصة البناء و اجل صلاحيتها و التمديد فيها و روط تجديدها و خاصة الفصل الخام منه فاننا ندعوكم الى تلم رخصة البناء في اجل اقصاه هر من تاريخ هذا الاعلام و الا اصبحت غير سارية المفعول</span>
    @endif
    
    <h4 class="commune"> منزل عبد الرحمان في  {{ $date }}</h4>
    <h4 class="commune" style="text-decoration: underline black;margin-right: 60%;"> رئيس/رئيسة البلدية</h4>

<footer style="margin-top:25%;margin-left:45%">http://www.commune-menzel-abderrahmen.gov.tn</footer> 
  


    </body>

</html
