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
        <div> ترخيص في ادخال  <b>{{$type}}</b></div>


    </div>
<br><br>

<p>  ان رئيسة بلدية منزل عبد الرحمان بعد اطلاعها على المطلب الذي تقدم به السيد/السيدة<b> {{$nom }} {{$prenom }} </b>لتزويد محله/ها الكائن ب<b> {{$adr}}</b> ب <b>{{$type}}</b> من طرف <b>{{$type_soc}}</b> </p>
    <p> وتبعا للجلسة المحلية لاسناد تراخيص الربط بالشبكات العمومية للبناءات المشيدة بدون ترخيص المنعقدة بمقر بلدية منزل عبد الرحمان بتاريخ <b>{{$date_reunion}}</b>  
    </p>
    <p>واستنادا لمصادقة السيد والي بنزرت بتاريخ <b>2021</b> و جدول ارسال الولاية عدد 13/972 بتاريخ   
        <b>04 فيفري 2022</b></p>
        <p>و بعد تبعا لمحضر جلسة اللجنة المحلية لاسناد تراخيص الربط بشبكتي الماء الصالح للشراب و النور الكهربائي المنعقدة بتاريخ <b>16/12/2014</b> بمقر بلدية منزل عبد الرحمان</p>
        <p>يرخص للسيد/ة <b> {{$nom}} {{$prenom}}</b>  </p>
        <p> 
             في ربط محله/ها المذكور ب  <b>  {{$type_res}}</b></p>
            <p> سلمت هذه الشهادة للادلاء بها لدى مصالح  <b>{{$type_soc}}</b></p>
            <h5><b> رقم الملف :</b> {{$num}}</h5>
  

<br>

    
    <h4 class="commune"> منزل عبد الرحمان في  {{ $date }}</h4>
    <h4 class="commune" style="text-decoration: underline black;margin-right: 60%;"> رئيس/رئيسة البلدية</h4>

<footer style="margin-top:15%;margin-left:45%">http://www.commune-menzel-abderrahmen.gov.tn</footer> 
  


    </body>

</html
