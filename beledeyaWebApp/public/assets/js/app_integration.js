/**
 * initialisation des variables necessaires
 * declaraction de speechRecognition
 */


 var language = "";




 var id = 1;
 var chatRepId = 1;
 var test = "";
 var now = new Date();
 var heure = now.getHours();
 var minute = now.getMinutes();
 var jour = now.getUTCDate();
 var mois = now.getUTCMonth()+1;
 var annee = now.getFullYear();
 var nomRec = "";
 var prenomRec = "";
 var cinRec = "";
 var emailRec = "";
 var adrRec = "";
 var descRec = "";
 var typeRec = "";
 var NumRec = "";
 var NomDoc="";
let file="";
var nameFile="";
var num_rec ="";
var nomBatir = "";
 var prenomBatir = "";
 var cinBatir = "";
 var emailBatir = "";
 var adrBatir = "";
 var cmntrBatir = "";
 var typeBatir = "";
 var NumBatir = "";
 var surfaceBatir=""
 var etatBatir="";
var num_dos_batir="";
var nomRes = "";
var prenomRes = "";
var cinRes = "";
var emailRes = "";
var adrRes = "";
var cmntrRes = "";
var typeRes = "";
var NumRes = "";
var descRes=""
var etatRes="";
var num_dos_Res="";
var type_soc="";
var type_res="";
 var v = 0;
 
 args = {
    //  openButton: document.querySelector(".chatbox__button"),
     chatBox_integration: document.querySelector(".chatbox__support"),
     sendButton_integration: document.querySelector(".send__button_integration"),
 };
 messages = new Array();
 state = false;
 
 const { chatBox_integration, sendButton_integration } = args;
 //ajouter les evenements des boutons 
//  openButton.addEventListener("click", () => toggleState(chatBox_integration));
sendButton_integration.addEventListener("click", () => onSendButton_integration(chatBox_integration));
 /**
  * 
  * fonctin modifyLanguage nous permet de changer la langue on a 3 bouton francais / anglais/arabe
  * si on click sur arabe la langue devienne arabe et le robot parle en arabe
  * si on click sur francais la langue devienne francais et le robot parle en francais
  * si on click sur anglais la langue devienne anglais et le robot parle en anglais
  */
 
 /**
  * 
  * la fonction toggleState c'est celui qu'on va mettre les actions selon statys de chatbox (ouvert/fermé)
  * Si ouvert on va questionner l'utilisateur de langue désiré
  * sinon on va vider tous
  */
//  function toggleState(chatbox) {
//      this.state = !this.state;
 
//      if (this.state) {
//          chatbox.classList.add("chatbox--active");
 
     
//      } else {
//          chatbox.classList.remove("chatbox--active");
//          for (let index = 0; index < messages.length; index++) {
//              messages = [];
//                          language = "";

//          }
//      }
//  }
/**function to get documents (consommation api suiviAllDocuments)
**/
function getDocument(){
    var list = [];
//     var nameFile="";
//     var file="";
    var url = "http://127.0.0.1:8080/work/consommation%20api/viewAllDocuments.php";
    $.ajax({
        type: 'GET',
        url: url,
        mode: 'no-cors',
        headers: {
            "Access-Control-Allow-Origin": "127.0.0.1",
            "Access-Control-Allow-Credentials": "true",
            "Access-Control-Allow-Headers": "*"
        },
        success: function (response, status, xhr) {
           
            var jsonData = JSON.parse(response);
for (var i = 0; i < jsonData.length; i++) {
    var counter = jsonData[i];
    list.push(counter);
}
list.forEach(element => {
    if(element.name.includes(NomDoc)){
nameFile=element.name;
file=element.file;
console.log("file ",file.toString());    

}
  
});
if(nameFile !== ""){
    console.log("ok ",nameFile);
    console.log("name ",nameFile);
// console.log("file ",file.toString());    
    switch (language) {
        case "anglais":
            ChatBot("Attachment exists:"+nameFile, chatBox_integration);
            break;
        case "francais":
            ChatBot("Piéce jointe existe :"+nameFile, chatBox_integration);
            break;
        case "arabe":
            ChatBot(nameFile+"المستند موجود", chatBox_integration);
            break;
        case "tn":
            ChatBot("Piéce jointe existe :"+nameFile, chatBox_integration);
            break;
    }
 
    delay(3000).then(() => open("http://192.168.1.6:8000/storage/"+file));

    
}
else{
    switch (language) {
        case "anglais":
            ChatBot("document not found try again!!", chatBox_integration);
            break;
        case "francais":
            ChatBot("document introuvale réessayer!!", chatBox_integration);
                        break;
        case "arabe":
            ChatBot("لم يتم العثور على المستند حاول مرة أخرى", chatBox_integration);
            break;
        case "tn":
            ChatBot("document mouch mawjoud", chatBox_integration);
            break;
    }
    
}

         
        },
        error: function (xhr, status, error) {
            console.log("Something went wrong!");
        }
    });
}
function delay(time) {
    return new Promise(resolve => setTimeout(resolve, time));
  }
 /**
  * 
  * function to validate email
  */
 function validateEmail(email) {
     var re = /\S+@\S+\.\S+/;
     return re.test(email);
 }
 //message voicebot
 function ChatBot(msg, chatbox) {
     let msg2 = { name: "Sam", message: msg };
     messages.push(msg2);
     updateChatText(chatbox);
 }

 //consommation api ajout rec
 function ajoutRecChatBot(){
     for (var i = 1; i < 9; i++) {
         NumRec += Math.floor(Math.random() * 9);;
     }
     console.log(NumRec);
 
     var data = {
         'nom': nomRec,
         'prenom': prenomRec,
         'email': emailRec,
         'cin': cinRec,
         'address': adrRec,
         'type': typeRec,
         'description': descRec,
         'num_rec': NumRec,
     };
 
     var url = "http://127.0.0.1:8080/work/consommation%20api/ajoutrec.php";
     $.ajax({
         type: 'POST',
         url: url,
         data: data,
         dataType: 'JSON',
         encode: true,
         mode: 'no-cors',
         headers: {
             "Access-Control-Allow-Origin": "*",
             "Access-Control-Allow-Credentials": "true",
             "Access-Control-Allow-Headers": "*"
         },
         success: function (response, status, xhr) {
             switch (language) {
                     case "tn":
                     ChatBot("bien récalamtion mt3k tsajlet 3indna tw nklmok f a9reb wa9et", chatBox_integration);
                     getPDF(adrRec,nomRec,prenomRec,cinRec,emailRec,typeRec,descRec,NumRec);
                     NumRec = "";

                     break;
                 case "anglais":
                     ChatBot("Complaint request registered. your waiver iss uploded", chatBox_integration);
                     getPDF(adrRec,nomRec,prenomRec,cinRec,emailRec,typeRec,descRec,NumRec);
                     NumRec = "";
                     break;
                 case "francais":
                     ChatBot("Demande de réclamation enregistré. votre décharge à été télécharger", chatBox_integration);
                     getPDF(adrRec,nomRec,prenomRec,cinRec,emailRec,typeRec,descRec,NumRec);
                     NumRec = "";

                     break;
                 case "arabe":
                     ChatBot(" تم تسجيل طلب الشكوى", chatBox_integration);
                     getPDF(adrRec,nomRec,prenomRec,cinRec,emailRec,typeRec,descRec,NumRec);
                     NumRec = "";

                     break;
 
                 default:
                     ChatBot("Demande de réclamation enregistré. Merci de télécharger votre décharge", chatBox_integration);
                     getPDF(adrRec,nomRec,prenomRec,cinRec,emailRec,typeRec,descRec,NumRec);
                     NumRec = "";

                     break;

             }
         },
         error: function (xhr, status, error) {
             console.log("Something went wrong!");
         }
     });
 
 
    }
    // consommation api ajout demande de batir
 function ajoutBatirChatBot(){
    for (var i = 1; i < 9; i++) {
        NumBatir += Math.floor(Math.random() * 9);;
    }
    console.log(NumBatir);
    var data = {
        'nom': nomBatir,
        'prenom': prenomBatir,
        'email': emailBatir,
        'cin': cinBatir,
        'address': adrBatir,
        'surface': surfaceBatir,
        'prop': typeBatir,
        'num_autor': NumBatir,
    };

    var url = "http://127.0.0.1:8080/work/consommation%20api/add_autorisation_batir.php";
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        dataType: 'JSON',
        encode: true,
        mode: 'no-cors',
        headers: {
            "Access-Control-Allow-Origin": "*",
            "Access-Control-Allow-Credentials": "true",
            "Access-Control-Allow-Headers": "*"
        },
        success: function (response, status, xhr) {
            switch (language) {
                    case "tn":
                    ChatBot("bien demande mt3k tsajlet 3indna tw nklmok f a9reb wa9et", chatBox_integration);
                    getPDFBatir(adrBatir,nomBatir,prenomBatir,cinBatir,emailBatir,surfaceBatir,NumBatir)
                    NumBatir = "";

                    break;
                case "anglais":
                    ChatBot("build request registered. your waiver iss uploded", chatBox_integration);
                    getPDFBatir(adrBatir,nomBatir,prenomBatir,cinBatir,emailBatir,surfaceBatir,NumBatir)
                    NumBatir = "";

                    break;
                case "francais":
                    ChatBot("Demande de batir enregistré. votre décharge à été télécharger", chatBox_integration);

                    getPDFBatir(adrBatir,nomBatir,prenomBatir,cinBatir,emailBatir,surfaceBatir,NumBatir)
                    NumBatir = "";

                    break;
                case "arabe":
                    ChatBot(" تم تسجيل طلب  رخصة البناء ", chatBox_integration);
                    getPDFBatir(adrBatir,nomBatir,prenomBatir,cinBatir,emailBatir,surfaceBatir,NumBatir)

                    NumBatir = "";

                    break;

                default:
                    ChatBot("Demande de batir enregistré. Merci de télécharger votre décharge", chatBox_integration);
                    getPDFBatir(adrBatir,nomBatir,prenomBatir,cinBatir,emailBatir,surfaceBatir,NumBatir)

                    NumBatir = "";
                    break;
            }
        },
        error: function (xhr, status, error) {
            console.log("Something went wrong!");
        }
    });


   }
//    ajout demande de branchement aux réseaux publics
function ajoutResChatBot(){
 
    for (var i = 1; i < 9; i++) {
        NumRes += Math.floor(Math.random() * 9);;
    }
    console.log(NumRes);
cmntrRes="No comment";
etatRes="0";
    var data = {
      
        'nomRes':  nomRes,
        'prenomRes' :  prenomRes,
        'emailRes': emailRes,
        'cinRes': cinRes,
        'adrRes': adrRes,
        'typeRes': typeRes,
        'descRes': descRes,
        'num_branch': NumRes,
    };

    var url = "http://127.0.0.1:8080/work/consommation%20api/adddemendebranchement.php";
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        dataType: 'JSON',
        encode: true,
        mode: 'no-cors',
        headers: {
            "Access-Control-Allow-Origin": "*",
            "Access-Control-Allow-Credentials": "true",
            "Access-Control-Allow-Headers": "*"
        },
        success: function (response, status, xhr) {
            switch (language) {
                    case "tn":
                    ChatBot("bien demande mt3k tsajlet 3indna tw nklmok f a9reb wa9et", chatBox_integration);
                    getPDFResPublic(adrRes,nomRes,prenomRes,cinRes,emailRes,typeRes,descRes,NumRes)
                    NumRes = "";
                    break;
                case "anglais":
                    ChatBot("network request registered. your waiver iss uploded", chatBox_integration);
                    getPDFResPublic(adrRes,nomRes,prenomRes,cinRes,emailRes,typeRes,descRes,NumRes)
                    NumRes = "";
                    break;
                case "francais":
                    ChatBot("Demande de branchement aux réseaux publics enregistré. votre décharge à été télécharger", chatBox_integration);
                    getPDFResPublic(adrRes,nomRes,prenomRes,cinRes,emailRes,typeRes,descRes,NumRes)
                    NumRes = "";
                    break;
                case "arabe":
                    ChatBot(" تم تسجيل طلبكم ", chatBox_integration);
                    getPDFResPublic(adrRes,nomRes,prenomRes,cinRes,emailRes,typeRes,descRes,NumRes)
                    NumRes = "";
                    break;

                default:
                    ChatBot("Demande de branchement aux réseaux publics enregistré. Merci de télécharger votre décharge", chatBox_integration);
                    getPDFResPublic(adrRes,nomRes,prenomRes,cinRes,emailRes,typeRes,descRes,NumRes)
                    NumRes = "";
                    break;
            }
        },
        error: function (xhr, status, error) {
            console.log("Something went wrong!");
        }
    });


   }

//  consommation api suivi rec
function suiviRecChatBot(num_rec,cin,chatbox) {
    console.log(num_rec);
    console.log(cin);
    var url = "http://127.0.0.1:8080/work/consommation%20api/suiviRec.php";
    $.ajax({
        type: 'POST',
        url: url,
        data: { 'num_rec': num_rec ,'cin':cin},
        dataType: 'JSON',
        encode: true,
        mode: 'no-cors',
        headers: {
            "Access-Control-Allow-Origin": "*",
            "Access-Control-Allow-Credentials": "true",
            "Access-Control-Allow-Headers": "*"
        },
        success: function (response, status, xhr) {
            console.log(response);
            console.log(status);
            switch (language) {
                    case "tn":
                    switch(response['status']){
                            
                        case "0".toString:
                            ChatBot("Mr/ Mlle "+response['last_name'] +' '+ response['first_name']+" réclamation mte3k mezelt en attente ", chatbox);
                            break;
                            case "1":
                                ChatBot("Mr/Mlle "+response['last_name'] +' '+ response['first_name']+" réclamation mte3k en cours de traitement", chatbox);
                            break;
                            case "2":
                                ChatBot("Mr/Mrs "+response['last_name'] +' '+ response['first_name']+" réclamation mte3k c bon résolu ", chatbox);
                            break;
                    }
                     
                    break;
                case "anglais":
                    switch(response['status']){
                        case "0":
                            ChatBot("Mr or Mrs "+response['last_name'] +' '+ response['first_name']+" your claim is delivered but not yet processed ", chatbox);
                            break;
                            case "1":
                                ChatBot("Mr or Mrs "+response['last_name'] +' '+ response['first_name']+" your complaint is being processed ", chatbox);
                            break;
                            case "2":
                                ChatBot("Mr or Mrs "+response['last_name'] +' '+ response['first_name']+" your complaint is resolved ", chatbox);
                            break;
                    }
                     
                    break;
                case "francais":
                    console.log("data ",response['first_name']);
                    console.log("status ",response['status']);
                    var status = response['status'];
                    switch(response['status']){
                        case "0":
                            ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+" votre réclamation est delivré mais pas encore traité ", chatbox);
                            break;
                            case "1":
                                ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+" votre réclamation est en cours de traitement ", chatbox);
                            break;
                            case "2":
                                ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+" votre réclamation est résolu ", chatbox);
                            break;
                    }
                   
                    break;
                case "arabe":
                    switch(response['status']){
                        case "0":
                            ChatBot("السيد او السيدة  "+response['last_name'] +' '+ response['first_name']+" تم تسليم مطالبتك ولكن لم تتم معالجتها بعد ", chatbox);
                            break;
                            case "1":
                                ChatBot("السيد او السيدة  "+response['last_name'] +' '+ response['first_name']+" شكواك قيد المعالجة ", chatbox);
                            break;
                            case "2":
                                ChatBot("السيد او السيدة  "+response['last_name'] +' '+ response['first_name']+" تم حل شكواك ", chatbox);
                            break;
                    }
                  
                    break;

                default:
                    switch(response['status']){
                        case "0":
                            ChatBot("Mr/Mlle"+response['last_name'] +' '+ response['first_name']+" votre réclamation est delivré mais pas encore traité ", chatbox);
                            break;
                            case "1":
                                ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+" votre réclamation est en cours de traitement ", chatbox);
                            break;
                            case "2":
                                ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+" votre réclamation est résolu ", chatbox);
                            break;
                    }
                    
                    break;
            }
        },
        error: function (xhr, status, error) {
            console.log("Something went wrong!");
        }
    });
} 
// suivi demande de batir 
function suiviBatirChatBot(num_dos_batir,cin,chatbox) {
    console.log(num_dos_batir);
    console.log(cin);
    var url = "http://127.0.0.1:8080/work/consommation%20api/SuiviAutorisationBatir.php";
    $.ajax({
        type: 'POST',
        url: url,
        data: { 'num_autor': num_dos_batir ,'cin':cin},
        dataType: 'JSON',
        encode: true,
        mode: 'no-cors',
        headers: {
            "Access-Control-Allow-Origin": "*",
            "Access-Control-Allow-Credentials": "true",
            "Access-Control-Allow-Headers": "*"
        },
        success: function (response, status, xhr) {
            console.log(response);
            console.log(status);
            switch (language) {
                    case "tn":
                    switch(response['status']){
                            
                        case "0": 
                            ChatBot("Mr/ Mlle "+response['last_name'] +' '+ response['first_name']+" demande mt3 ro5sot bin2 mezelt en attente ", chatbox);
                            break;
                            case "1":
                                ChatBot("Mr/Mlle "+response['last_name'] +' '+ response['first_name']+" demande mt3 ro5sot bin2  en cours de traitement", chatbox);
                            break;
                            case "2":
                                ChatBot("Mr/Mrs "+response['last_name'] +' '+ response['first_name']+" demande mt3 ro5sot bin2 7adhra",chatbox);
                                                            getPDFAcceptBatir(response['last_name'],response['first_name'],response['adresse']);

                            break;
                            case "3":
                                ChatBot("Mr/Mrs "+response['last_name'] +' '+ response['first_name']+"demande mt3 ro5sot bin2 marfoudha",chatbox);
                                                            getPDFRefusBatir(response['last_name'],response['first_name'],response['adresse'],response['commentaire']);

                            break;
                    }
                     
                    break;
                case "anglais":
                    switch(response['status']){
                        case "0":
                            ChatBot("Mr or Mrs "+response['last_name'] +' '+ response['first_name']+"your building request is delivered but not yet processed ", chatbox);
                            break;
                            case "1":
                                ChatBot("Mr or Mrs "+response['last_name'] +' '+ response['first_name']+"your building request is being processed", chatbox);
                            break;
                            case "2":
                                ChatBot("Mr or Mrs "+response['last_name'] +' '+ response['first_name']+"your request to build is approved", chatbox);
                                                                                        getPDFAcceptBatir(response['last_name'],response['first_name'],response['adresse']);

                            break;
                               case "3":
                                ChatBot("Mr ou Mrs"+response['last_name'] +' '+ response['first_name']+"your request to build is rejected", chatbox);
                                                                                        getPDFRefusBatir(response['last_name'],response['first_name'],response['adresse'],response['commentaire']);

                            break;
                    }
                     
                    break;
                case "francais":
                    console.log("data ",response['first_name']);
                    console.log("status ",response['status']);
                    var status = response['status'];
                    switch(response['status']){
                        case "0":
                            ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+"votre demande de batir est délivré mais n'est pas encore traité ", chatbox);
                            break;
                            case "1":
                                ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+"votre demande de bâtir est en cours de traitement ", chatbox);
                            break;
                            case "2":
                                ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+"votre demande de bâtir est approuvé", chatbox);
                                                                                                                    getPDFAcceptBatir(response['last_name'],response['first_name'],response['adresse']);

                            break;
                            case "3":
                                ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+"votre demande de bâtir est rejeté", chatbox);
                                                                                                                    getPDFRefusBatir(response['last_name'],response['first_name'],response['adresse'],response['commentaire']);

                            break;
                    }
                   
                    break;
                case "arabe":
                    switch(response['status']){
                        case "0":
                            ChatBot("السيد او السيدة  "+response['last_name'] +' '+ response['first_name']+" تم تسليم مطالبتك ولكن لم تتم معالجتها بعد ", chatbox);
                            break;
                            case "1":
                                ChatBot("السيد او السيدة  "+response['last_name'] +' '+ response['first_name']+" مطالبتك قيد المعالجة ", chatbox);
                            break;
                            case "2":
                                ChatBot("السيد او السيدة  "+response['last_name'] +' '+ response['first_name']+" تم الموافقة على رخصة البناء الخاصة بك  ", chatbox);
                                                                                                                                                getPDFAcceptBatir(response['last_name'],response['first_name'],response['adresse']);

                            break;
                                 case "3":
                                ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+"تم رفض طلب  رخصة البناء الخاصة بك ", chatbox);
                                                                                                                    getPDFRefusBatir(response['last_name'],response['first_name'],response['adresse'],response['commentaire']);

                            break;
                    }
                  
                    break;

                default:
                                     switch(response['status']){
                        case "0":
                            ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+"votre demande de batir est délivré mais n'est pas encore traité ", chatbox);
                            break;
                            case "1":
                                ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+"votre demande de bâtir est en cours de traitement ", chatbox);
                            break;
                            case "2":
                                ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+"votre demande de bâtir est approuvé", chatbox);
                                                                                                                    getPDFAcceptBatir(response['last_name'],response['first_name'],response['adresse']);

                            break;
                            case "3":
                                ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+"votre demande de bâtir est rejeté", chatbox);
                                                                                                                    getPDFRefusBatir(response['last_name'],response['first_name'],response['adresse'],response['commentaire']);

                            break;
                    }
                   
                    break;
            }
        },
        error: function (xhr, status, error) {
            console.log("Something went wrong!");
        }
    });
}
// suivi demande de branchement
function suiviResChatBot(num_dos_Res,cin,chatbox) {
    console.log(num_dos_Res);
    console.log(cin);
    var url = "http://127.0.0.1:8080/work/consommation%20api/suiviDemandeBranchement.php";
    $.ajax({
        type: 'POST',
        url: url,
        data: { 'num_branch': num_dos_Res ,'cin':cin},
        dataType: 'JSON',
        encode: true,
        mode: 'no-cors',
        headers: {
            "Access-Control-Allow-Origin": "*",
            "Access-Control-Allow-Credentials": "true",
            "Access-Control-Allow-Headers": "*"
        },
        success: function (response, status, xhr) {
            console.log(response);
            console.log(status);
            switch (language) {
                    case "tn":
                    switch(response['status']){
                            
                        case "0": 
                            ChatBot("Mr/ Mlle "+response['last_name'] +' '+ response['first_name']+" demande mt3 ro5sot chabaket 3ama  mezelt en attente ", chatbox);
                            break;
                            case "1":
                                ChatBot("Mr/Mlle "+response['last_name'] +' '+ response['first_name']+" demande mt3 ro5sot chabaket 3ama   en cours de traitement", chatbox);
                            break;
                            case "2":
                                ChatBot("Mr/Mrs "+response['last_name'] +' '+ response['first_name']+" demande mt3 ro5sot chabaket 3ama 7adhra",chatbox);
                                if ((response['type']== 'Sonede') || (response['type']== 'الماء')) {
                                    type = 'eau potable';
                                    type_soc ='Société nationale d`exploitation et de distribution des eaux';
                                    type_res ='réseau public de distribution d`eau';
                                }
                                if ((response['type'] == 'Steg') || (response['type']== 'الكهرباء و الغاز')) {
                                    type = 'eclairage public';
                                    type_soc ='Société tunisienne de l`électricité et du gaz';
                                    type_res ='réseau public de distribution de l`électricité';
                                }  
                        getPDFResPublicAccept(type,response['last_name'],response['first_name'],response['adresse'],type_soc,type_res,num_dos_Res)
                            break;
                            case "3":
                                ChatBot("Mr/Mrs "+response['last_name'] +' '+ response['first_name']+"demande mt3 ro5sot chabaket 3ama  marfoudha",chatbox);
                                                            getPDFRefusBatir(response['last_name'],response['first_name'],response['adresse'],response['commentaire']);

                            break;
                    }
                     
                    break;
                case "anglais":
                    switch(response['status']){
                        case "0":
                            ChatBot("Mr or Mrs "+response['last_name'] +' '+ response['first_name']+"your request for connection to public networks is delivered but not yet processed ", chatbox);
                            break;
                            case "1":
                                ChatBot("Mr or Mrs "+response['last_name'] +' '+ response['first_name']+"your request for connection to public networks is being processed", chatbox);
                            break;
                            case "2":
                                ChatBot("Mr or Mrs "+response['last_name'] +' '+ response['first_name']+"your request for connection to public networks is approved", chatbox);
                                if ((response['type']== 'Sonede') || (response['type']== 'الماء')) {
                                    type = 'eau potable';
                                    type_soc ='Société nationale d`exploitation et de distribution des eaux';
                                    type_res ='réseau public de distribution d`eau';
                                }
                                if ((response['type'] == 'Steg') || (response['type']== 'الكهرباء و الغاز')) {
                                    type = 'eclairage public';
                                    type_soc ='Société tunisienne de l`électricité et du gaz';
                                    type_res ='réseau public de distribution de l`électricité';
                                }  
                        getPDFResPublicAccept(type,response['last_name'],response['first_name'],response['adresse'],type_soc,type_res,num_dos_Res) ;                                                   

                            break;
                               case "3":
                                ChatBot("Mr ou Mrs"+response['last_name'] +' '+ response['first_name']+"your request for connection to public networks is rejected", chatbox);

                            break;
                    }
                     
                    break;
                case "francais":
                    console.log("data ",response['first_name']);
                    console.log("status ",response['status']);
                    var status = response['status'];
                    switch(response['status']){
                        case "0":
                            ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+"votre demande de branchement aux réseaux publics est délivré mais n'est pas encore traité ", chatbox);
                            break;
                            case "1":
                                ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+"votre demande de branchement aux réseaux publics est en cours de traitement ", chatbox);
                            break;
                            case "2":
                                ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+"votre demande de branchement aux réseaux publics est approuvé", chatbox);
                                if ((response['type']== 'Sonede') || (response['type']== 'الماء')) {
                                    type = 'eau potable';
                                    type_soc ='Société nationale d`exploitation et de distribution des eaux';
                                    type_res ='réseau public de distribution d`eau';
                                }
                                if ((response['type'] == 'Steg') || (response['type']== 'الكهرباء و الغاز')) {
                                    type = 'eclairage public';
                                    type_soc ='Société tunisienne de l`électricité et du gaz';
                                    type_res ='réseau public de distribution de l`électricité';
                                }  
                        getPDFResPublicAccept(type,response['last_name'],response['first_name'],response['adresse'],type_soc,type_res,num_dos_Res) ;

                            break;
                            case "3":
                                ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+"votre demande de branchement aux réseaux publics est rejeté", chatbox);

                            break;
                    }
                   
                    break;
                case "arabe":
                    switch(response['status']){
                        case "0":
                            ChatBot("السيد او السيدة  "+response['last_name'] +' '+ response['first_name']+" تم تسليم مطالبتك ولكن لم تتم معالجتها بعد ", chatbox);
                            break;
                            case "1":
                                ChatBot("السيد او السيدة  "+response['last_name'] +' '+ response['first_name']+" مطالبتك قيد المعالجة ", chatbox);
                            break;
                            case "2":
                                ChatBot("السيد او السيدة  "+response['last_name'] +' '+ response['first_name']+" تم الموافقة على رخصة الاتصال بالشبكات العامة الخاصة بك  ", chatbox);
                                if ((response['type']== 'Sonede') || (response['type']== 'الماء')) {
                                    type = 'eau potable';
                                    type_soc ='Société nationale d`exploitation et de distribution des eaux';
                                    type_res ='réseau public de distribution d`eau';
                                }
                                if ((response['type'] == 'Steg') || (response['type']== 'الكهرباء و الغاز')) {
                                    type = 'eclairage public';
                                    type_soc ='Société tunisienne de l`électricité et du gaz';
                                    type_res ='réseau public de distribution de l`électricité';
                                }  
                        getPDFResPublicAccept(type,response['last_name'],response['first_name'],response['adresse'],type_soc,type_res,num_dos_Res) ;

                            break;
                                 case "3":
                                ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+"تم رفض طلب  رخصة الاتصال بالشبكات العامة الخاصة بك ", chatbox);

                            break;
                    }
                  
                    break;

                default:
                                     switch(response['status']){
                        case "0":
                            ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+"votre demande de branchement aux réseaux publics est délivré mais n'est pas encore traité ", chatbox);
                            break;
                            case "1":
                                ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+"votre demande de branchement aux réseaux publics est en cours de traitement ", chatbox);
                            break;
                            case "2":
                                ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+"votre demande de branchement aux réseaux publics est approuvé", chatbox);
                                if ((response['type']== 'Sonede') || (response['type']== 'الماء')) {
                                    type = 'eau potable';
                                    type_soc ='Société nationale d`exploitation et de distribution des eaux';
                                    type_res ='réseau public de distribution d`eau';
                                }
                                if ((response['type'] == 'Steg') || (response['type']== 'الكهرباء و الغاز')) {
                                    type = 'eclairage public';
                                    type_soc ='Société tunisienne de l`électricité et du gaz';
                                    type_res ='réseau public de distribution de l`électricité';
                                }  
                        getPDFResPublicAccept(type,response['last_name'],response['first_name'],response['adresse'],type_soc,type_res,num_dos_Res) ;

                            break;
                            case "3":
                                ChatBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+"votre demande de branchement aux réseaux publics est rejeté", chatbox);

                            break;
                    }
                   
                    break;
            }
        },
        error: function (xhr, status, error) {
            console.log("Something went wrong!");
        }
    });
}

 function getNumLet(s) {
     switch (s) {
         case 'واحد':
             return 1;
         case 'اثنان':
             return 2;
         case 'ثلاثه':
             return 3;
         case 'اربعه':
             return 4;
         case 'خمسه':
             return 5;
         case 'سته':
             return 6;
         case 'سبعه':
             return 7;
         case 'ثمانيه':
             return 8;
         case 'تسعه':
             return 9;
         case 'صفر':
             return 0;
     }
 }
 

 /**
  * 
  * onSendButton(chatbox) nous permet d'envoyer les messages
  * la première chose c'est de définir la langue de recognition selon la langue séléctionné par user
  * aprés user parle et on récupère le message
  * envoyer ce message sous forme json au api flask pour récupérer la réponse retourner en json depuis python
  * (en utilisant fetch)
  * a chaque fois on enregistre le message dans le tableau messages qu'on va le récupère après  
  */
  function onSendButton_integration(chatbox) {
    var textField = chatbox.querySelector('input');
       const date = new Date();
       let heures = date.getHours();
       let minutes = date.getMinutes();
       let text1 = textField.value
 
       if (text1 === "") {
           return;
       }
 
       let msg1 = { name: "User", message: text1, date: heures.toString()+":"+ minutes.toString() }
       this.messages.push(msg1);
       this.updateChatText(chatbox);
 
 switch (textField.value) {
case "suivi réclamation":
                  v=8;

         console.log("suivi");
         language="francais";
         ChatBot("Salut envoyez moi le numéro de réclamation que vous voullez suivre ",chatbox);
         textField.value  = '';
               
         break;
     case "check complaint":
                  v=8;

         console.log("check");
         language="anglais";
         ChatBot("Hi send me the claim number you want to track",chatbox);
         textField.value  = '';
               
         break;
     case "اتباع":
                  v=8;

         console.log("je suis la");
         language="arabe";
         ChatBot("مرحبًا ، أرسل لي رقم المطالبة الذي تريد تتبعه ",chatbox);
         textField.value  = '';
               
         break; 
     case "motaba3t chakwa":
                  v=8;

         console.log("je suis la");
         language="tn"; 
         ChatBot("3aslema ab3thli num réclamation");
         textField.value  = '';
               
         break;
          case "documents administratifs":
                  v=10;

         console.log("documents administratifs");
         language="francais";
         ChatBot("Salut envoyez moi le nom du document ",chatbox);
         textField.value  = '';
               
         break; 
         case "administrative documents":
                  v=10;

         console.log("administrative documents");
         language="anglais";
         ChatBot("Hi send me the name of the document",chatbox);
         textField.value  = '';
               
         break;
     case "وثائق إدارية":
                  v=10;

         console.log("je suis la");
         language="arabe";
         ChatBot("مرحبًا ، أرسل لي رقم المطالبة الذي تريد تتبعه ",chatbox);
         textField.value  = '';
               
         break; 
          case "document":
                  v=10;

         console.log("document");
         language="tn";
         ChatBot("marhbe bik , ekteb esm document ",chatbox);
         textField.value  = '';
               
         break; 
         case "suivi demande de batir":
                  v=18;

         console.log("suivi");
         language="francais";   
         ChatBot("Salut envoyez moi le numéro de demande que vous voullez suivre ",chatbox);
         textField.value  = '';
               
         break;
     case "check build request":
                  v=18;

         console.log("check");
         language="anglais"; 
         ChatBot("Hi send me the request number you want to track",chatbox);
         textField.value  = '';
               
         break;
     case "اتباع رخصة بناء":
                  v=18;

         console.log("je suis la");
         language="arabe";
         ChatBot("مرحبًا ، أرسل لي رقم طلب رخصة البناء الذي تريد تتبعه ",chatbox);
         textField.value  = '';
               
         break;
     case "motaba3t ro5sot bin2":
                  v=18;

         console.log("je suis la");
         language="tn"; 
         ChatBot("3aslema ab3thli num ro5sot bin2" ,chatbox);
         textField.value  = '';
               
         break;
         case "suivi demande de branchement aux réseaux publics":
            v=27;

   console.log("suivi");
   language="francais";   
   ChatBot("Salut envoyez moi le numéro de demande que vous voullez suivre ",chatbox);
   textField.value  = '';
         
   break;
case "check request for connection to public networks":
            v=27;

   console.log("check");
   language="anglais"; 
   ChatBot("Hi send me the request number you want to track",chatbox);
   textField.value  = '';
         
   break;
case "اتباع رخصة الاتصال بالشبكات العامة":
            v=27;

   console.log("je suis la");
   language="arabe";
   ChatBot("أرسل لي رقم طلبك للاتصال بالشبكات العامة",chatbox);
   textField.value  = '';
         
   break;
case "motaba3t ro5sot chabaket 3ama":
            v=27;

   console.log("je suis la");
   language="tn"; 
   ChatBot("3aslema ab3thli num demande" ,chatbox);
   textField.value  = '';
         
   break;
     case "réclamation":
                  v=1;

         console.log("je suis la");
         language="francais";
         ChatBot("bonjour , bienvenue dans l'espace de réclamation . Envoyer votre nom ",chatbox);
         textField.value  = '';
               
         break;
         case "complaint":
                  v=1;

             language="anglais";
             ChatBot("hello .please send me your Last Name ",chatbox);
textField.value  = '';         
             break;
             case "chakwa":
                  v=1;

                 language="tn";
                 ChatBot("marhbe bik . ab3theli la9abek",chatbox);
textField.value  = '';         
                 break;
                  case "شكوى":
                  v=1;

                     language="arabe";
                     ChatBot("مرحبا في فضاء الشكايات من فضلك ارسل لي اسم العائلة ",chatbox);
 
textField.value  = ''; 
case "demande de branchement aux réseaux publics":
                  v=20;

         console.log("je suis la");
         language="francais";
         ChatBot("bonjour , bienvenue dans l'espace des demandes de branchement aux réseaux publics. Envoyer votre nom ",chatbox);
         textField.value  = '';
               
         break;
         case "request for connection to public networks":
                  v=20;

             language="anglais";
             ChatBot("hello .please send me your Last Name ",chatbox);
textField.value  = '';         
             break;
             case "ro5sot chabaka 3ama":
                  v=20;

                 language="tn";
                 ChatBot("marhbe bik . ab3theli la9abek",chatbox);
textField.value  = '';         
                 break;
                  case "طلب الاتصال بالشبكات العامة":
                  v=20;

                     language="arabe";
                     ChatBot("مرحبا في فضاء الشكايات من فضلك ارسل لي اسم العائلة ",chatbox);
 
textField.value  = '';                 
                     break;
                     case "demande de batir":
                  v=11;

         console.log("je suis la");
         language="francais";
         ChatBot("bonjour , bienvenue dans l'espace des demandes d'autorisation de batir . Envoyer votre nom ",chatbox);
         textField.value  = '';
               
         break;
         case "request to build":
                  v=11;

             language="anglais";
             ChatBot("hello .please send me your Last Name ",chatbox);
textField.value  = '';         
             break;
             case "ro5sot bin2":
                  v=11;

                 language="tn";
                 ChatBot("marhbe bik . ab3theli la9abek",chatbox);
textField.value  = '';         
                 break;
                  case "طلب بناء ":
                  v=11;

                     language="arabe";
                     ChatBot("مرحبا في فضاء الشكايات من فضلك ارسل لي اسم العائلة ",chatbox);
 
textField.value  = '';                 
                     break;
     
 }
    
console.log(v); 
       switch(v){
           case 0:
                       fetch('http://127.0.0.1:5000/predict', {
           method: 'POST',
           body: JSON.stringify({ message: text1 }),
           mode: 'cors',
           headers: {
             'Content-Type': 'application/json'
           },
         })
         .then(r => r.json())
         .then(r => {
                       textField.value="";    
           let msg2 = { name: "Sam", message: r.answer,  date: heures.toString()+":"+ minutes.toString() };
           this.messages.push(msg2);
           this.updateChatText(chatbox);
text1 = ''; 
       }).catch((error) => {
           console.error('Error:', error);
           this.updateChatText(chatbox);
text1 = '';         });
   
               break;
       case 1:
           if (textField.value  !== "") {
                   nomRec = textField.value;
               console.log(nomRec);
                   if ( nomRec.trim().length >= 4) {
                       switch (language) {
                           case "anglais":
                                                    

                             ChatBot(" Mr or Mrs " + nomRec + " please send me your first name ",chatbox);
                               
                               
                               break;
                           case "francais":

      ChatBot("Monsieur ou Madame " + nomRec + " s`il vous plait envoyer moi votre prénom",chatbox);
                                
                
                               break;
                                                             

                           case "arabe":

                               ChatBot("السيد او السيدة  " + nomRec + "  ارسل لي اسمك",chatbox);
                          
                               break;

                               case "tn":

                                   ChatBot("ab3theli esmk ",chatbox);
                               
                               break;

                        default:
                                ChatBot("Monsieur ou Madame " + nomRec + " s`il vous plait envoyer moi votre prénom", chatbox);
                                break;
                        }
                        v = 2;
                    }
                    else {
                        switch (language) {
                                case "tn":
                                ChatBot("la9ab ghalet", chatbox);
                                break;
                            case "anglais":
                                ChatBot("Invalid name", chatbox);
                                break;
                            case "francais":
                                ChatBot("Nom non valide", chatbox);
                                break;
                            case "arabe":
                                ChatBot("اسم عائلة غير صحيح", chatbox);
                                break;

                            default:
                                ChatBot("Nom non valide", chatbox);
                                break;
                        }

                     }
                 
             }
               break;
                case 2:
                if (textField.value !== "") {
                    prenomRec = textField.value;

                    if ( prenomRec.trim().length >= 3) {
                        switch (language) {
                            case "anglais":
                                ChatBot("Mr or Mrs " + nomRec + " " + prenomRec + " send me your identity card number", chatbox);
                                break;
                            case "français":
                                ChatBot("Monsieur ou Madame " + nomRec + " " + prenomRec + " envoyer moi votre numéro de carte d`identité", chatbox);
                                break;
                            case "arabe":
                                ChatBot("السيد او السيدة  " + nomRec + " " + prenomRec + "ارسل لي رقم بطاقة   هويتك ", chatbox);
                                break;
                                case "tn":
                                ChatBot("d'accors ab3thli tw num cin ", chatbox);
                                break;

                            default:
                                ChatBot("Monsieur ou Madame " + nomRec + " " + prenomRec + " envoyer moi votre numéro de carte d`identité", chatbox);
                                break;
                        }
                        v = 3;
                    }
                    else {
                        switch (language) {
                            case "anglais":
                                ChatBot("write a real name please", chatbox);
                                break;
                            case "francais":
                                ChatBot("ecrire un vrai prénom s`il vous plait", chatbox);
                                break;
                            case "arabe":
                                ChatBot("قل الاسم الحقيقي من فضلك", chatbox);
                                break;
                                case "tn":
                                ChatBot("ekteb esmk b shyh", chatbox);
                                break;

                            default:
                                ChatBot("ecrie un vrai prénom s`il vous plait", chatbox);
                                break;
                        }

                    }
                }

                break;
                case 3:
                if (textField.value !== "") {
                    cinRec = "";
                    if (language == "arabe") {
                        var cinArray = textField.value.split(' ');
                        for (let i = 0; i < cinArray.length; i++) {
                            cinRec = cinRec + getNumLet(cinArray[i]);
                        }
                    } else {
                        cinRec = textField.value.replaceAll(' ', '');
                    }

                    console.log("cin " + cinRec);
                    if (cinRec.length == 8) {
                        switch (language) {
                                case "tn":
                                ChatBot("c'est bien tw ab3theli adresse mt3k", chatbox);
                                break;
                            case "anglais":
                                ChatBot("Great now what is your address", chatbox);
                                break;
                            case "français":
                                ChatBot("Génial maintenant c`est quoi votre adresse", chatbox);
                                break;
                            case "arabe":
                                ChatBot("عظيم الآن ما هو عنوانك", chatbox);
                                break;

                            default:
                                ChatBot("Génial maintenant c`est quoi votre adresse", chatbox);
                                break;
                        }
                        v = 4;
                    }
                    else {
                        switch (language) {
                                case "tn":
                                ChatBot("num cin lezem ykoun fih 8 ar9am", chatbox);
                                break;
                            case "anglais":
                                ChatBot("The identity card number must be an 8-digit number", chatbox);
                                break;
                            case "francais":
                                ChatBot("Le numéro de carte d`identité doit etre un nombre de 8 chiffres", chatbox);
                                break;
                            case "arabe":
                                ChatBot("يجب أن يتكون رقم بطاقة الهوية من 8 أرقام", chatbox);
                                break;

                            default:
                                ChatBot("Le numéro de carte d`identité doit etre un nombre de 8 chiffres", chatbox);
                                break;
                        }
                    }
                }

                break;
                case 4:
                if (textField.value !== "") {
                    adrRec = textField.value;

                    if ( adrRec.trim().length >= 4) {
                        switch (language) {
                                case "tn":
                                ChatBot("chniya adresse email mte3k ?", chatbox);
                                break;
                            case "anglais":
                                ChatBot("what is your email", chatbox);
                                break;
                            case "francais":
                                ChatBot("c`est quoi Votre email", chatbox);
                                break;
                            case "arabe":
                                ChatBot("ماهو بريدك الإلكتروني", chatbox);
                                
                                break;

                            default:
                                ChatBot("c`est quoi Votre email", chatbox);
                                break;
                        }
                        v = 5;
                    }
                    else {
                        switch (language) {
                                case "tn":
                                ChatBot("email ghalet 3awed ab3thli mara o5ra", chatbox);
                                break;
                            case "anglais":
                                ChatBot("there is an error try again", chatbox);
                                break;
                            case "francais":
                                ChatBot("il y a une erreur réessayer", chatbox);
                                break;
                            case "arabe":
                                ChatBot("هناك خطأ ما حاول مرة أخرى", chatbox);
                                break;

                            default:
                                ChatBot("il y a une erreur réessayer", chatbox);
                                break;
                        }
                    }
                }

                break;
               case 5:
                if (textField.value !== "") {
                    
                    emailRec = textField.value
                    console.log("email " + emailRec);
                    if (validateEmail(emailRec)) {
                        switch (language) {
                                case "tn":
                                ChatBot("a5tar ra9em m liste : \n 1 ken 3indek mochkla m3a idara \n 2 ken mochkla f bine2 fawdhawi \n 3 ken probleme f tanwir 3omomi \n 4 ken 3indek mockla f ta9a \n 5 espaces vertes \n 6 tana9el \n w 8 ken 3indk mochkla f 7aja o5ra", chatbox);
                                break;
                            case "anglais":
                                ChatBot("Choose a type from this list say 1 if the complaint is of the administration type 2 if of the anarchic construction type 3 if of the public lighting type 4 if of the energy type 5 if of the green space type 6 mobility 7 health and hygiene and 8 if it is another kind", chatbox);
                                break;
                            case "francais":
                                ChatBot("Choisir un type parmi cette liste dire 1 si la réclamation de type administration 2 si de type construction anarchique 3 si de type éclairage publique 4 si de type énergie 5 si de type espace verts 6 mobilité 7 santé et hiégiéne et 8 si c est une autre type", chatbox);
                                break;
                            case "arabe":
                                ChatBot("اختر نوعًا من هذه القائمة قل 1 إذا كانت الشكوى من نوع الإدارة 2 إذا كانت من نوع البناء الفوضوي 3 إذا كانت من نوع الإضاءة العامة من النوع 4 إذا كانت من نوع الطاقة 5 إذا كانت من المساحة الخضراء من النوع 6 التنقل 7 الصحة والنظافة 8 إذا كان من نوع آخر", chatbox);
                                break;

                            default:
                                ChatBot("Choisir un type parmi cette liste dire 1 si la réclamation de type administration 2 si de type construction anarchique 3 si de type éclairage publique 4 si de type énergie 5 si de type espace verts 6 mobilité 7 santé et hiégiéne et 8 si c est une autre type", chatbox);
                                break;
                        }
                        v = 6;
                    }
                    else {
                        switch (language) {
                                case "tn":
                                ChatBot("email ghalet 3awed ab3thli mara o5ra lezem email ykoun fih @ w .", chatbox);
                                break;
                            case "anglais":
                                ChatBot("invalid email try again", chatbox);
                                break;
                            case "francais":
                                ChatBot("email non valide réessayer", chatbox);
                                break;
                            case "arabe":
                                ChatBot(" البريد الإلكتروني غير صالح حاول مرة أخرى", chatbox);
                                break;

                            default:
                                ChatBot("email non valide réessayer", chatbox);
                                break;
                        }

                    }
                }
                break;
                case 6:
                    if (textField.value !== "") {
                        if(language=="arabe"){
                        switch (getNumLet(textField.value)) {
                            case "1":
                                typeRec = "administration";
                                break;
                            case "2":
                                typeRec = "construction anarchiques";
                                break;
                            case "3":
                                typeRec = "Eclairage publique";
                                break;
                            case "4":
                                typeRec = "Energie";
                                break;
                            case "5":
                                typeRec = "Espaces Verts";
                                break;
                            case "6":
                                typeRec = "Mobilité";
                                break;
                            case "7":
                                typeRec = "Santé et Higiéne";
                                break;
                            case "8":
                                typeRec = "Autres Réclamations ";
                                break;
                            default:
                                switch (language) {

                                    case "tn":
                                        ChatBot("3awed ekteb type mara o5ra", chatbox);
                                        break;
                                    case "anglais":
                                        ChatBot("Unknown type try again", chatbox);
                                        break;
                                    case "francais":
                                        ChatBot("Type non connue réessayer", chatbox);
                                        break;
                                    case "arabe":
                                        ChatBot("نوع غير معروف حاول مرة أخرى", chatbox);
                                        break;
    
                                    default:
                                        ChatBot("Type non connue réessayer", chatbox);
                                        break;
                                }
                                break;
                        }
                    }
                    else{
                        switch (textField.value) {
                            case "1":
                                typeRec = "administration";
                                break;
                            case "2":
                                typeRec = "construction anarchiques";
                                break;
                            case "3":
                                typeRec = "Eclairage publique";
                                break;
                            case "4":
                                typeRec = "Energie";
                                break;
                            case "5":
                                typeRec = "Espaces Verts";
                                break;
                            case "6":
                                typeRec = "Mobilité";
                                break;
                            case "7":
                                typeRec = "Santé et Higiéne";
                                break;
                            case "8":
                                typeRec = "Autres Réclamations ";
                                break;
                            default:
                                switch (language) {
                                    case "tn":
                                        ChatBot("3awed ekteb type mara o5ra", chatbox);
                                        break;
                                    case "anglais":
                                        ChatBot("Unknown type try again", chatbox);
                                        break;
                                    case "francais":
                                        ChatBot("Type non connue réessayer", chatbox);
                                        break;
                                    case "arabe":
                                        ChatBot("نوع غير معروف حاول مرة أخرى", chatbox);
                                        break;
    
                                    default:
                                        ChatBot("Type non connue réessayer", chatbox);
                                        break;
                                }
                                break;
                        }
                    }
                        switch (language) {
                            case "tn":
                                ChatBot("d'accord tawa ab3thli une petite dexription lel mochkl mt3k ", chatbox);
                                break;
                            case "anglais":
                                ChatBot("Please send me a short description of your complaint", chatbox);
                                break;
                            case "francais":
                                ChatBot("Merci de m`envoyer une petite description de votre réclamation", chatbox);
                                break;
                            case "arabe":
                                ChatBot("من فضلك أرسل لي وصفا موجزا لشكواك", chatbox);
                                break;
    
                            default:
                               ChatBot("Merci de m`envoyer une petite description de votre réclamation", chatbox);
                                break;
                        }
    
    
                        v = 7;
    
                    }break;
                    case 7:
                        if (textField.value !== "") {
                            descRec = textField.value;
        
                            if (descRec.trim().length >= 10) {
                                console.log("nom " +
                                    nomRec +
                                    " prenom " +
                                    prenomRec +
                                    " cin " +
                                    cinRec +
                                    " email " +
                                    emailRec +
                                    " adr " +
                                    adrRec +
                                    " type " +
                                    typeRec +
                                    " description " +
                                    descRec);
                                ajoutRecChatBot();

                                // getPDF(adrRec,nomRec,prenomRec,cinRec,emailRec,typeRec,descRec,NumRec);
                                
                                //v = 8;
                            }
                            else {
                                switch (language) {
                                    case "tn":
                                        ChatBot("zid faser akther mochkla mt3k", chatbox);
                                        break;
                                    case "anglais":
                                        ChatBot("Say a correct description", chatbox);
                                        break;
                                    case "francais":
                                        ChatBot("Dire une correcte description", chatbox);
                                        break;
                                    case "arabe":
                                        ChatBot("قل وصفا صحيحا", chatbox);
                                        break;
        
                                    default:
                                       ChatBot("Dire une correcte description", chatbox);
                                        break;
                                }
        
                            }
                        }
        
                        break;
                case 8:
                   
                    if (textField.value !== "") {
                        console.log("je suis la");
                         num_rec = textField.value;
                        console.log("nummm", num_rec);
                        if (num_rec.length == 8) {
                            switch (language) {
                                case "anglais":
                                    ChatBot("Hi send me your identity card number", chatbox);
                                    textField = "";
                                    v = 9;
                                    break;
                                case "francais":
                                    ChatBot("Salut envoyez moi votre numéro de carte d`identité", chatbox);
                                    textField = "";
                                    v = 9;
                                    break;
                                case "arabe":
                                    ChatBot("مرحبًا ، أرسل لي رقم بطاقة هويتك", chatbox);
                                    textField = "";
                                    v = 9;
                                    break;
                                    case "tn":
                                        ChatBot("مرحبًا ، أرسل  لي رقم بطاقة هويتك  ", chatbox);
                                        textField = "";
                                        v = 9;
                                        break;
                            }                        }
                        else {
                           switch (language) {
                                    case "tn":
                                        ChatBot("num réclamation ghalet . 3aweb ab3thli", chatbox);
                                        break;
                                    case "anglais":
                                        ChatBot("write a correct complaint number", chatbox);
                                        break;
                                    case "francais":
                                        ChatBot("ecrire une correcte numéro de réclamation.Revérifier", chatbox);
                                        break;
                                    case "arabe":
                                        ChatBot("قل وصفا صحيحا", chatbox);
                                        break;
        
                                    default:
                                       ChatBot("ecrire une correcte numéro de réclamation.Revérifier", chatbox);
                                        break;
                                }
                        }
                    }
                    break;
                    case 9 :
            if (textField.value!== "") {
                cin="";
                            cin=textField.value;


               
             
                console.log("je suis la");
                console.log(cin);
                
                
                if (cin.length == 8) {
                    suiviRecChatBot(num_rec,cin,chatbox);
               
                }
                else {
                    switch(language){
                        case "anglais":
                            ChatBot("recheck", chatbox);
                            break;
                        case "francais":
                            ChatBot("Revérifier", chatbox);
                            break;
                        case "arabe":
                            ChatBot("حاول مرة اخرى", chatbox);
                            break;
                            case "tn":
                                ChatBot("حاول مرة اخرى", chatbox);
                                break;
                        default:
                            ChatBot("Revérifier", chatbox);
                            break;
                    }
                  
                }
            }
            break;
               case 10:
           
                   if (textField.value !== "") {
                       NomDoc =textField.value;
                           console.log("na9ra f ",NomDoc);
                            getDocument(NomDoc);
                  
                   
           
                   } 
           break;
           case 11:
            if (textField.value  !== "") {
                    nomBatir = textField.value;
                console.log(nomBatir);
                    if ( nomBatir.trim().length >= 4) {
                        switch (language) {
                            case "anglais":
                                                     
 
                              ChatBot(" Mr or Mrs " + nomBatir + " please send me your first name ",chatbox);
                                
                                
                                break;
                            case "francais":
 
       ChatBot("Monsieur ou Madame " + nomBatir + " s`il vous plait envoyer moi votre prénom",chatbox);
                                 
                 
                                break;
                                                              
 
                            case "arabe":
 
                                ChatBot("السيد او السيدة  " + nomBatir + "  ارسل لي اسمك",chatbox);
                           
                                break;
 
                                case "tn":
 
                                    ChatBot("ab3theli esmk ",chatbox);
                                
                                break;
 
                         default:
                                 ChatBot("Monsieur ou Madame " + nomBatir + " s`il vous plait envoyer moi votre prénom", chatbox);
                                 break;
                         }
                         v = 12;
                     }
                     else {
                         switch (language) {
                                 case "tn":
                                 ChatBot("la9ab ghalet", chatbox);
                                 break;
                             case "anglais":
                                 ChatBot("Invalid name", chatbox);
                                 break;
                             case "francais":
                                 ChatBot("Nom non valide", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("اسم عائلة غير صحيح", chatbox);
                                 break;
 
                             default:
                                 ChatBot("Nom non valide", chatbox);
                                 break;
                         }
 
                      }
                  
              }
                break;
                 case 12:
                 if (textField.value !== "") {
                     prenomBatir = textField.value;
 
                     if ( prenomBatir.trim().length >= 3) {
                         switch (language) {
                             case "anglais":
                                 ChatBot("Mr or Mrs " + nomBatir + " " + prenomBatir + " send me your identity card number", chatbox);
                                 break;
                             case "français":
                                 ChatBot("Monsieur ou Madame " + nomBatir + " " + prenomBatir + " envoyer moi votre numéro de carte d`identité", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("السيد او السيدة  " + nomBatir + " " + prenomBatir + "ارسل لي رقم بطاقة   هويتك ", chatbox);
                                 break;
                                 case "tn":
                                 ChatBot("d'accors ab3thli tw num cin ", chatbox);
                                 break;
 
                             default:
                                 ChatBot("Monsieur ou Madame " + nomRec + " " + prenomRec + " envoyer moi votre numéro de carte d`identité", chatbox);
                                 break;
                         }
                         v = 13;
                     }
                     else {
                         switch (language) {
                             case "anglais":
                                 ChatBot("write a real name please", chatbox);
                                 break;
                             case "francais":
                                 ChatBot("ecrire un vrai prénom s`il vous plait", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("قل الاسم الحقيقي من فضلك", chatbox);
                                 break;
                                 case "tn":
                                 ChatBot("ekteb esmk b shyh", chatbox);
                                 break;
 
                             default:
                                 ChatBot("ecrie un vrai prénom s`il vous plait", chatbox);
                                 break;
                         }
 
                     }
                 }
 
                 break;
           case 13:
                 if (textField.value !== "") {
                     cinBatir = "";
                     if (language == "arabe") {
                         var cinArray = textField.value.split(' ');
                         for (let i = 0; i < cinArray.length; i++) {
                             cinBatir = cinBatir + getNumLet(cinArray[i]);
                        }
                     } else {
                         cinBatir = textField.value.replaceAll(' ', '');
                     }
 
                     console.log("cin " + cinBatir);
                     if (cinBatir.length == 8) {
                         switch (language) {
                                 case "tn":
                                 ChatBot("c'est bien tw ab3theli adresse mt3k", chatbox);
                                 break;
                             case "anglais":
                                 ChatBot("Great now what is your address", chatbox);
                                 break;
                             case "français":
                                 ChatBot("Génial maintenant c`est quoi votre adresse", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("عظيم الآن ما هو عنوانك", chatbox);
                                 break;
 
                             default:
                                 ChatBot("Génial maintenant c`est quoi votre adresse", chatbox);
                                 break;
                         }
                         v = 14;
                     }
                     else {
                         switch (language) {
                                 case "tn":
                                 ChatBot("num cin lezem ykoun fih 8 ar9am", chatbox);
                                 break;
                             case "anglais":
                                 ChatBot("The identity card number must be an 8-digit number", chatbox);
                                 break;
                             case "francais":
                                 ChatBot("Le numéro de carte d`identité doit etre un nombre de 8 chiffres", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("يجب أن يتكون رقم بطاقة الهوية من 8 أرقام", chatbox);
                                 break;
 
                             default:
                                 ChatBot("Le numéro de carte d`identité doit etre un nombre de 8 chiffres", chatbox);
                                 break;
                         }
                     }
                 }
 
                 break;
                 case 14:
                 if (textField.value !== "") {
                     adrBatir = textField.value;
 
                     if ( adrBatir.trim().length >= 4) {
                         switch (language) {
                                 case "tn":
                                 ChatBot("chniya adresse email mte3k ?", chatbox);
                                 break;
                             case "anglais":
                                 ChatBot("what is your email", chatbox);
                                 break;
                             case "francais":
                                 ChatBot("c`est quoi Votre email", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("ماهو بريدك الإلكتروني", chatbox);
                                 
                                 break;
 
                             default:
                                 ChatBot("c`est quoi Votre email", chatbox);
                                 break;
                         }
                         v = 15;
                     }
                     else {
                         switch (language) {
                                 case "tn":
                                 ChatBot("fama ghalta ab3thli mara o5ra", chatbox);
                                 break;
                             case "anglais":
                                 ChatBot("there is an error try again", chatbox);
                                 break;
                             case "francais":
                                 ChatBot("il y a une erreur réessayer", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("هناك خطأ ما حاول مرة أخرى", chatbox);
                                 break;
 
                             default:
                                 ChatBot("il y a une erreur réessayer", chatbox);
                                 break;
                         }
                     }
                 }
 
                 break;
                 case 15:
                 if (textField.value !== "") {
                     emailBatir = textField.value;
 
                     if (validateEmail(emailBatir)) {
                         switch (language) {
                                 case "tn":
                                 ChatBot("9adech kober ardh li bch tebni feha?", chatbox);
                                 break;
                             case "anglais":
                                 ChatBot("What is the area of ​​the land that will be built?", chatbox);
                                 break;
                             case "francais":
                                 ChatBot("Quelle est la superficie du terrain qui sera construit?", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("ما هي مساحة الأرض التي سيتم بناؤها؟", chatbox);
                                 
                                 break;
 
                             default:
                                 ChatBot("Quelle est la superficie du terrain qui sera construit?", chatbox);
                                 break;
                         }
                         v = 16;
                     }
                     else {
                         switch (language) {
                                 case "tn":
                                 ChatBot("email ghalet ab3thli b shyh", chatbox);
                                 break;
                             case "anglais":
                                 ChatBot("there is an error try again", chatbox);
                                 break;
                             case "francais":
                                 ChatBot("il y a une erreur réessayer", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("هناك خطأ ما حاول مرة أخرى", chatbox);
                                 break;
 
                             default:
                                 ChatBot("il y a une erreur réessayer", chatbox);
                                 break;
                         }
                     }
                 }
 
                 break;
                 case 16:
                 if (textField.value !== "") {
                     surfaceBatir = textField.value;
 
                     if (surfaceBatir.trim().length >= 2) {
                         switch (language) {
                                 case "tn":
                                 ChatBot("ardh eli bch tebni feha mawjouda b jnab milk 3omomi ?", chatbox);
                                 break;
                             case "anglais":
                                 ChatBot("Is the land next to public property?  ", chatbox);
                                 break;
                             case "francais":
                                 ChatBot("Le terrain est-il à coté d'une propriété publique ?", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("هل الأرض بجوار ملكية عامة؟ ", chatbox);
                                 
                                 break;
 
                             default:
                                 ChatBot("Le terrain est-il à coté d'une propriété publique ?", chatbox);
                                 break;
                         }
                         v = 17;
                     }
                     else {
                         switch (language) {
                                 case "tn":
                                 ChatBot("réponse ghalta ab3thli b shyh", chatbox);
                                 break;
                             case "anglais":
                                 ChatBot("there is an error try again", chatbox);
                                 break;
                             case "francais":
                                 ChatBot("il y a une erreur réessayer", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("هناك خطأ ما حاول مرة أخرى", chatbox);
                                 break;
 
                             default:
                                 ChatBot("il y a une erreur réessayer", chatbox);
                                 break;
                         }
                     }
                 }
 
                 break;
                 case 17:
                    if (textField.value !== "") {
    
                        if (textField.value.includes("oui")||textField.value.includes("ey")||textField.value.includes("yes")||textField.value.includes("نعم")) {

                       typeBatir=textField.value;
                       ajoutBatirChatBot();
                        }
                        if(textField.value.includes("non")||textField.value.includes("le")||textField.value.includes("no")||textField.value.includes("لا")) {
                           typeBatir= textField.value
                            ajoutBatirChatBot();

                        }
                        else{
                            switch (language) {
                                case "tn":
                                ChatBot("réponse ghalta ab3thli b shyh(ey wele le)", chatbox);
                                break;
                            case "anglais":
                                ChatBot("there is an error try again(write yes or no)", chatbox);
                                break;
                            case "francais":
                                ChatBot("il y a une erreur réessayer(écrire oui ou non)", chatbox);
                                break;
                            case "arabe":
                                ChatBot("(نعم أو لا)هناك خطأ ما حاول مرة أخرى", chatbox);
                                break;

                            default:
                                ChatBot("il y a une erreur réessayer'écrire oui ou non)", chatbox);
                                break;
                        }
                        }
                    }
    
                    break;
           case 18:
                   
                    if (textField.value !== "") { 
                        console.log("je suis la");
                         num_dos_batir = textField.value;
                        console.log("nummm", num_dos_batir);
                        if (num_dos_batir.length == 8) {
                            switch (language) {
                                case "anglais":
                                    ChatBot("Hi send me your identity card number", chatbox);
                                    textField = "";
                                    v = 19;
                                    break;
                                case "francais":
                                    ChatBot("Salut envoyez moi votre numéro de carte d`identité", chatbox);
                                    textField = "";
                                    v = 19;
                                    break;
                                case "arabe":
                                    ChatBot("مرحبًا ، أرسل لي رقم بطاقة هويتك", chatbox);
                                    textField = "";
                                    v = 19;
                                    break;
                                    case "tn":
                                        ChatBot("ab3thli nul cin ",chatbox);
                                        textField = "";
                                        v = 19;
                                        break;
                            }                        }
                        else {
                           switch (language) { 
                                    case "tn":
                                        ChatBot("num  ghalet . 3aweb ab3thli", chatbox);
                                        break;
                                    case "anglais":
                                        ChatBot("write a correct request number", chatbox);
                                        break;
                                    case "francais":
                                        ChatBot("ecrire une correcte numéro de demande de batir.Revérifier", chatbox);
                                        break;
                                    case "arabe":
                                        ChatBot("قل وصفا صحيحا", chatbox);
                                        break;
        
                                    default:
                                       ChatBot("ecrire une correcte numéro de demande de batir.Revérifier", chatbox);
                                        break;
                                }
                        }
                    }
                    break;
                    case 19:
            if (textField.value!== "") {
                cin="";
                            cin=textField.value;


               
             
                console.log("je suis la");
                console.log(cin);
                
                
                if (cin.length == 8) {
                    suiviBatirChatBot(num_dos_batir,cin,chatbox);
               
                }
                else {
                    switch(language){
                        case "anglais":
                            ChatBot("recheck", chatbox);
                            break;
                        case "francais": 
                            ChatBot("Revérifier", chatbox);
                            break;
                        case "arabe":
                            ChatBot("حاول مرة اخرى", chatbox);
                            break;
                            case "tn":
                                ChatBot("3awed ab3thli num cin", chatbox);
                                break;
                        default:
                            ChatBot("Revérifier", chatbox);
                            break;
                    }
                  
                }
            }
            break;
            case 20:
            if (textField.value  !== "") {
                    nomRes = textField.value;
                console.log(nomRes);
                    if ( nomRes.trim().length >= 4) {
                        switch (language) {
                            case "anglais":
                                                     
 
                              ChatBot(" Mr or Mrs " + nomRes + " please send me your first name ",chatbox);
                                
                                
                                break;
                            case "francais":
 
       ChatBot("Monsieur ou Madame " + nomRes + " s`il vous plait envoyer moi votre prénom",chatbox);
                                 
                 
                                break;
                                                              
 
                            case "arabe":
 
                                ChatBot("السيد او السيدة  " + nomRes + "  ارسل لي اسمك",chatbox);
                           
                                break;
 
                                case "tn":
 
                                    ChatBot("ab3theli esmk ",chatbox);
                                
                                break;
 
                         default:
                                 ChatBot("Monsieur ou Madame " + nomRes + " s`il vous plait envoyer moi votre prénom", chatbox);
                                 break;
                         }
                         v =21;
                     }
                     else {
                         switch (language) {
                                 case "tn":
                                 ChatBot("la9ab ghalet", chatbox);
                                 break;
                             case "anglais":
                                 ChatBot("Invalid name", chatbox);
                                 break;
                             case "francais":
                                 ChatBot("Nom non valide", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("اسم عائلة غير صحيح", chatbox);
                                 break;
 
                             default:
                                 ChatBot("Nom non valide", chatbox);
                                 break;
                         }
 
                      }
                  
              }
                break;
                 case 21:
                 if (textField.value !== "") {
                     prenomRes = textField.value;
 
                     if ( prenomRes.trim().length >= 3) {
                         switch (language) {
                             case "anglais":
                                 ChatBot("Mr or Mrs " + nomRes + " " + prenomRes + " send me your identity card number", chatbox);
                                 break;
                             case "français":
                                 ChatBot("Monsieur ou Madame " + nomRes + " " + prenomRes + " envoyer moi votre numéro de carte d`identité", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("السيد او السيدة  " + nomRes + " " + prenomRes + "ارسل لي رقم بطاقة   هويتك ", chatbox);
                                 break;
                                 case "tn":
                                 ChatBot("d'accors ab3thli tw num cin ", chatbox);
                                 break;
 
                             default:
                                 ChatBot("Monsieur ou Madame " + nomRes + " " + prenomRes + " envoyer moi votre numéro de carte d`identité", chatbox);
                                 break;
                         }
                         v = 22;
                     }
                     else {
                         switch (language) {
                             case "anglais":
                                 ChatBot("write a real name please", chatbox);
                                 break;
                             case "francais":
                                 ChatBot("ecrire un vrai prénom s`il vous plait", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("قل الاسم الحقيقي من فضلك", chatbox);
                                 break;
                                 case "tn":
                                 ChatBot("ekteb esmk b shyh", chatbox);
                                 break;
 
                             default:
                                 ChatBot("ecrie un vrai prénom s`il vous plait", chatbox);
                                 break;
                         }
 
                     }
                 }
 
                 break;
           case 22:
                 if (textField.value !== "") {
                     cinRes = "";
                     if (language == "arabe") {
                         var cinArray = textField.value.split(' ');
                         for (let i = 0; i < cinArray.length; i++) {
                             cinRes = cinRes + getNumLet(cinArray[i]);
                        }
                     } else {
                         cinRes = textField.value.replaceAll(' ', '');
                     }
 
                     console.log("cin " + cinRes);
                     if (cinRes.length == 8) {
                         switch (language) {
                                 case "tn":
                                 ChatBot("c'est bien tw ab3theli adresse mt3k", chatbox);
                                 break;
                             case "anglais":
                                 ChatBot("Great now what is your address", chatbox);
                                 break;
                             case "francais":
                                 ChatBot("Génial maintenant c`est quoi votre adresse", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("عظيم الآن ما هو عنوانك", chatbox);
                                 break;
 
                             default:
                                 ChatBot("Génial maintenant c`est quoi votre adresse", chatbox);
                                 break;
                         }
                         v = 23;
                     }
                     else {
                         switch (language) {
                                 case "tn":
                                 ChatBot("num cin lezem ykoun fih 8 ar9am", chatbox);
                                 break;
                             case "anglais":
                                 ChatBot("The identity card number must be an 8-digit number", chatbox);
                                 break;
                             case "francais":
                                 ChatBot("Le numéro de carte d`identité doit etre un nombre de 8 chiffres", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("يجب أن يتكون رقم بطاقة الهوية من 8 أرقام", chatbox);
                                 break;
 
                             default:
                                 ChatBot("Le numéro de carte d`identité doit etre un nombre de 8 chiffres", chatbox);
                                 break;
                         }
                     }
                 }
 
                 break;
                 case 23:
                 if (textField.value !== "") {
                     adrRes = textField.value;
 
                     if ( adrRes.trim().length >= 4) {
                         switch (language) {
                                 case "tn":
                                 ChatBot("chniya adresse email mte3k ?", chatbox);
                                 break;
                             case "anglais":
                                 ChatBot("what is your email", chatbox);
                                 break;
                             case "francais":
                                 ChatBot("c`est quoi Votre email", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("ماهو بريدك الإلكتروني", chatbox);
                                 
                                 break;
 
                             default:
                                 ChatBot("c`est quoi Votre email", chatbox);
                                 break;
                         }
                         v = 24;
                     }
                     else {
                         switch (language) {
                                 case "tn":
                                 ChatBot("fama ghalta ab3thli mara o5ra", chatbox);
                                 break;
                             case "anglais":
                                 ChatBot("there is an error try again", chatbox);
                                 break;
                             case "francais":
                                 ChatBot("il y a une erreur réessayer", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("هناك خطأ ما حاول مرة أخرى", chatbox);
                                 break;
 
                             default:
                                 ChatBot("il y a une erreur réessayer", chatbox);
                                 break;
                         }
                     }
                 }
 
                 break;
                 case 24:
                 if (textField.value !== "") {
                     emailRes = textField.value;
 
                     if (validateEmail(emailRes)) {
                         switch (language) {
                                 case "tn":
                                 ChatBot("ekteb 1 ken bch ta3ml ro5set STeg w 2 ken Sonede", chatbox);
                                 break;
                             case "anglais":
                                 ChatBot("write 1 if your request is Steg type and 2 if it is Sonede type", chatbox);
                                 break;
                             case "francais":
                                 ChatBot("écrire 1 si votre demande est de type Steg et 2 s'il est de type Sonede", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("اكتب 1 إذا كان طلبك من نوع Steg و 2 إذا كان من نوع Sonede", chatbox);
                                 
                                 break;
 
                             default:
                                ChatBot("écrire 1 si votre demande est de type Steg et 2 s'il est de type Sonede", chatbox);
                                break;
                         }
                         v = 25;
                     }
                     else {
                         switch (language) {
                                 case "tn":
                                 ChatBot("email ghalet ab3thli b shyh", chatbox);
                                 break;
                             case "anglais":
                                 ChatBot("there is an error try again", chatbox);
                                 break;
                             case "francais":
                                 ChatBot("il y a une erreur réessayer", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("هناك خطأ ما حاول مرة أخرى", chatbox);
                                 break;
 
                             default:
                                 ChatBot("il y a une erreur réessayer", chatbox);
                                 break;
                         }
                     }
                 }
 
                 break;
                 case 25:
                 if (textField.value !== "") {
                     
 
                     if (textField.value.includes("1")) {
                        typeRes="Steg"
                        switch (language) {
                            case "tn":
                            ChatBot("ekteb description l demande mt3k", chatbox);
                            break;
                        case "anglais":
                            ChatBot("write a short description", chatbox);
                            break;
                        case "francais":
                            ChatBot("écrire une petite description", chatbox);
                            break;
                        case "arabe":
                            ChatBot("اكتب وصفا موجزا", chatbox);
                            
                            break;

                        default:
                            ChatBot("écrire une petite description", chatbox);
                            break;
                    }
                    v = 26;
                }else if(textField.value.includes("2")){
                            typeRes="Sonede"
                            switch (language) {
                                case "tn":
                                ChatBot("ekteb description l demande mt3k", chatbox);
                                break;
                            case "anglais":
                                ChatBot("write a short description", chatbox);
                                break;
                            case "francais":
                                ChatBot("écrire une petite description", chatbox);
                                break;
                            case "arabe":
                                ChatBot("اكتب وصفا موجزا", chatbox);
                                
                                break;

                            default:
                                ChatBot("écrire une petite description", chatbox);
                                break;
                        }
                        v = 26;
                                            }
                        
                     else {
                         switch (language) {
                                 case "tn":
                                 ChatBot("réponse ghalta ab3thli b shyh", chatbox);
                                 break;
                             case "anglais":
                                 ChatBot("there is an error try again", chatbox);
                                 break;
                             case "francais":
                                 ChatBot("il y a une erreur réessayer", chatbox);
                                 break;
                             case "arabe":
                                 ChatBot("هناك خطأ ما حاول مرة أخرى", chatbox);
                                 break;
 
                             default:
                                 ChatBot("il y a une erreur réessayer", chatbox);
                                 break;
                         }
                     
                 }
                }
                 break;
                 case 26:
                    if (textField.value !== "") {
    
                        

                        descRes=textField.value;
                       if (descRes.trim().length >= 10) {
                        
                       ajoutResChatBot();

                     } else{
                            switch (language) {
                                case "tn":
                                ChatBot("zid faser akther", chatbox);
                                break;
                            case "anglais":
                                ChatBot("there is an error try again", chatbox);
                                break;
                            case "francais":
                                ChatBot("il y a une erreur réessayer", chatbox);
                                break;
                            case "arabe":
                                ChatBot("هناك خطأ ما حاول مرة أخرى", chatbox);
                                break;

                            default:
                                ChatBot("il y a une erreur réessayer", chatbox);
                                break;
                        }
                        }
                    }
    
                    break;
                    case 27:
                   
                        if (textField.value !== "") { 
                            console.log("je suis la");
                             num_dos_Res = textField.value;
                            console.log("nummm", num_dos_Res);
                            if (num_dos_Res.length == 8) {
                                switch (language) {
                                    case "anglais":
                                        ChatBot("Hi send me your identity card number", chatbox);
                                        textField = "";
                                        v = 28;
                                        break;
                                    case "francais":
                                        ChatBot("Salut envoyez moi votre numéro de carte d`identité", chatbox);
                                        textField = "";
                                        v = 28;
                                        break;
                                    case "arabe":
                                        ChatBot("مرحبًا ، أرسل لي رقم بطاقة هويتك", chatbox);
                                        textField = "";
                                        v = 28;
                                        break;
                                        case "tn":
                                            ChatBot("ab3thli nul cin ",chatbox);
                                            textField = "";
                                            v = 28;
                                            break;
                                }                        }
                            else {
                               switch (language) { 
                                        case "tn":
                                            ChatBot("num  ghalet . 3aweb ab3thli", chatbox);
                                            break;
                                        case "anglais":
                                            ChatBot("write a correct request number", chatbox);
                                            break;
                                        case "francais":
                                            ChatBot("ecrire une correcte numéro de demande de branchement aux réseaux publics.Revérifier", chatbox);
                                            break;
                                        case "arabe":
                                            ChatBot("قل وصفا صحيحا", chatbox);
                                            break;
            
                                        default:
                                           ChatBot("ecrire une correcte numéro de demande de branchement aux réseaux publics.Revérifier", chatbox);
                                            break;
                                    }
                            }
                        }
                        break;
                        case 28:
                if (textField.value!== "") {
                    cin="";
                                cin=textField.value;
    
    
                   
                 
                    console.log("je suis la");
                    console.log(cin);
                    
                    
                    if (cin.length == 8) {
                        suiviResChatBot(num_dos_Res,cin,chatbox);
                   
                    }
                    else {
                        switch(language){
                            case "anglais":
                                ChatBot("recheck", chatbox);
                                break;
                            case "francais": 
                                ChatBot("Revérifier", chatbox);
                                break;
                            case "arabe":
                                ChatBot("حاول مرة اخرى", chatbox);
                                break;
                                case "tn":
                                    ChatBot("3awed ab3thli num cin", chatbox);
                                    break;
                            default:
                                ChatBot("Revérifier", chatbox);
                                break;
                        }
                      
                    }
                }
                break;
            }
            

     
        }
 
//  les PDFs
function getPDF(AdrRec,NomRec,PrenomRec,NumCin,EmailRec,TypeRec,DescRec,NumRec){
   
var doc = new jsPDF();


if((language=="arabe")|| (language=="tn")){
   

doc.addFileToVFS('Amiri-Regular-normal.ttf', font);
doc.addFont('Amiri-Regular-normal.ttf', 'Amiri-Regular', 'normal');
doc.addFileToVFS('Amiri-Italic-normal.ttf', fontItalic);
doc.addFont('Amiri-Italic-normal.ttf', 'Amiri-Italic', 'normal');
doc.setFont('Amiri-Regular', 'normal');
// doc.addImage(imgData, 'PNG', 165, 10, 25, 35)
doc.viewerPreferences({"Direction" : "RTL"}, true);
doc.text(120, 15, 'بلدية منزل عبد الرحمان')
doc.text(92, 22, 'الهاتف 72 570 125/ 72 571 295')
doc.text(118, 29, 'الفاكس   125 570 72')
doc.text(70, 35, 'communemenzelabderrahmen@gmail.com')
doc.text(105, 40, 'نهج المنجي سليم 7035 بنزرت')
doc.setTextColor(0, 0, 255)
doc.text(45,65,  ' السيد/السيدة:'+PrenomRec+' '+NomRec )
doc.text(68,72,' القاطن/القاطنة ب: '+AdrRec)
doc.text(45,79,EmailRec+' :البريد الالكتروني ')
doc.text(52,87,annee+'/'+mois+'/'+jour+' منزل عبد الرحمان في ')
 doc.setFontSize(19)
doc.setTextColor(0, 0, 0)
doc.text(120,110,'رقم الشكاية : '+NumRec)
 doc.setFontSize(19)
 doc.setFont('Amiri-Italic', 'normal');
doc.setTextColor(0, 0, 255)
doc.setFontSize(18)
doc.text(40,130,' السيدة/السيدة  '+NomRec+' '+PrenomRec +' صاحب بطاقة تعريف وطنية عدد '+NumCin)
doc.setFont('Amiri-Regular', 'normal');
doc.setTextColor(0, 0, 0)
 doc.text(57,150,'  لقد تلقينا شكواك من نوع '+TypeRec+' و الموضوع '+DescRec)
 doc.text(95,162,'سنحاول تصحيح المشكلة في أسرع وقت ممكن')
doc.text(18,178,' يمكنك متابعة شكواك من خلال هذا الرقم  '+NumRec +' للبقاء على اتصال مع الجميع')
doc.text(60,190,' من فضلك استقبل سيدتي ام سيدي '+NomRec+' '+PrenomRec +',  أطيب التحيات')
doc.setFontSize(16)
doc.text(35,215,'بلدية منزل عبد الرحمان')
doc.setFontSize(10)
doc.text(20,290,'http://www.commune-menzel-abderrahmen.gov.tn')
}
else{
//     doc.addImage(imgData, 'PNG', 15, 10, 25, 30)
doc.setFontSize(10)

doc.text(42, 15, 'Commune de MENZEL ABDERRAHMAN  \n Tel (+216) 72 570 125/ (+216) 72 571 295 \n Fax (+216) 72 570 125 \n communemenzelabderrahmen@gmail.com \n Rue El Mongi Slim 7035 menzel abdel rahmen ')

doc.setTextColor(0, 0, 255)
doc.text(130,60,'Nom et Prénom : '+NomRec+' '+PrenomRec)
doc.text(130,65,'Adresse : '+AdrRec)
doc.text(130,70,'Email :'+EmailRec)
doc.text(130,75,'Menzel Abderhmane le '+jour+'/'+mois+'/'+annee)
doc.setFontSize(19)
doc.setTextColor(0, 0, 0)
doc.text(20,95,'Numéro réclamation: '+NumRec)
doc.text(20,105,'Décharge de réclamation de '+TypeRec)
doc.setFontSize(16)
doc.setFontType('italic')
doc.setTextColor(0, 0, 255)
doc.setFontSize(12)
doc.text(20,115,'Monsieur/Madame '+NomRec+' '+PrenomRec +' titulaire de cin '+NumCin)
doc.setFontType('normal')
doc.setTextColor(0, 0, 0)
doc.text(20,125,'Nous avons bien reçu votre réclamation de type '+TypeRec +' et de description \n'+DescRec +' \n \n Nous essayons de corriger le problème dés que possible.')
doc.text(20,150,'Vous pouvez suivre votre réclamation a travers ce numéro '+NumRec +'\n pour restez en contact de tous.')
doc.text(20,170,'Veuillez recevoir, Madame, ou Monsieur,'+NomRec+' '+PrenomRec +',  nos salutations distinguées')
doc.setFontSize(16)
doc.text(105,205,'Commune de Menzel Abderrahmane')
doc.setFontSize(10)
doc.text(125,290,'http://www.commune-menzel-abderrahmen.gov.tn')
}

doc.save(NomRec+PrenomRec+".pdf");
}
// pdf autorisation de batir
function getPDFBatir(adrBatir,nomBatir,prenomBatir,cinBatir,emailBatir,surfaceBatir,NumBatir){
   
    var doc = new jsPDF();
    
    
    if((language=="arabe")|| (language=="tn")){
       
    
    doc.addFileToVFS('Amiri-Regular-normal.ttf', font);
    doc.addFont('Amiri-Regular-normal.ttf', 'Amiri-Regular', 'normal');
    doc.addFileToVFS('Amiri-Italic-normal.ttf', fontItalic);
    doc.addFont('Amiri-Italic-normal.ttf', 'Amiri-Italic', 'normal');
    doc.setFont('Amiri-Regular', 'normal');
    // doc.addImage(imgData, 'PNG', 165, 10, 25, 35)
    doc.viewerPreferences({"Direction" : "RTL"}, true);
    doc.text(120, 15, 'بلدية منزل عبد الرحمان')
    doc.text(92, 22, 'الهاتف 72 570 125/ 72 571 295')
    doc.text(118, 29, 'الفاكس   125 570 72')
    doc.text(70, 35, 'communemenzelabderrahmen@gmail.com')
    doc.text(105, 40, 'نهج المنجي سليم 7035 بنزرت')
    doc.setTextColor(0, 0, 255)
    doc.text(45,65,  ' السيد/السيد :'+prenomBatir+' '+nomBatir )
    doc.text(45,72,' القاطن/القاطنة ب: '+adrBatir)
    doc.text(45,79,emailBatir+' :البريد الالكتروني ')
    doc.text(30,87,annee+'/'+mois+'/'+jour+' منزل عبد الرحمان في ')
     doc.setFontSize(19)
    doc.setTextColor(0, 0, 0)
    doc.text(135,110,'رقم الملف : '+NumBatir)
    doc.text(145,125,'طلب تصريح البناء')
     doc.setFontSize(19)
     doc.setFont('Amiri-Italic', 'normal');
    doc.setTextColor(0, 0, 255)
    doc.setFontSize(18)
    doc.text(40,140,' السيدة/السيدة  '+nomBatir+' '+prenomBatir +' صاحب بطاقة تعريف وطنية عدد '+cinBatir)
    doc.setFont('Amiri-Regular', 'normal');
    doc.setTextColor(0, 0, 0)
     doc.text(57,155,+surface+' لقد تلقينا طلب تصريح البناء الخاص بك و الذي تبلغ مساحته ')
     doc.text(110,165,'سنحاول الرد عليك في أسرع وقت ممكن')
    doc.text(30,175,' يمكنك متابعة طلبك من خلال هذا الرقم  '+NumBatir +' للبقاء على اتصال مع الجميع')
    doc.text(60,185,' من فضلك استقبل سيدتي ام سيدي '+nomBatir+' '+prenomBatir +',  أطيب التحيات')
    doc.setTextColor(255, 0, 0)
    doc.text(45,205,'يرجى إحضار هذه الوثيقة إلى البلدية مع الاوراق التالية لاتمام الاجراءات')
    doc.setTextColor(0, 0, 0)
    doc.text(40,215,'مطلب باسم السيدة رئيسة البلدية معرف بالامضاء في صورة اكثر من مالك *')
    doc.text(145,225,'شهادة ملكية او عقد بيع *')
    doc.text(150,235,' خمسة امثلة هندسية*')
    doc.text(40,245,'شهادة خلاص الاداءات المتعلقة بالارض او العقار موضوع طلب الرخصة *')
    doc.text(115,255,'الدخل السنوي او بطاقة اقامة بالخارج *')
    doc.setFontSize(16)
   
    doc.text(35,280,'بلدية منزل عبد الرحمان')
    doc.setFontSize(10)
    doc.text(20,290,'http://www.commune-menzel-abderrahmen.gov.tn')
    }
    else{
        // doc.addImage(imgData, 'PNG', 15, 10, 25, 30)
    doc.setFontSize(10)
    
    doc.text(42, 15, 'Commune de MENZEL ABDERRAHMAN  \n Tel (+216) 72 570 125/ (+216) 72 571 295 \n Fax (+216) 72 570 125 \n communemenzelabderrahmen@gmail.com \n Rue El Mongi Slim 7035 menzel abdel rahmen ')
    
    doc.setTextColor(0, 0, 255)
    doc.text(130,60,'Nom et Prénom : '+nomBatir+' '+prenomBatir)
    doc.text(130,65,'Adresse : '+adrBatir)
    doc.text(130,70,'Email :'+emailBatir)
    doc.text(130,75,'Menzel Abderhmane le '+jour+'/'+mois+'/'+annee)
    doc.setFontSize(16)
    doc.setTextColor(0, 0, 0)
    doc.text(15,95,'Numéro dossier: '+NumBatir)
    doc.text(15,105,'Décharge de demande d`autoriation de batir')
    doc.setFontSize(16)
    doc.setFontType('italic')
    doc.setTextColor(0, 0, 255)
    doc.setFontSize(12)
    doc.text(15,115,'Monsieur/Madame '+nomBatir+' '+prenomBatir +' titulaire de cin '+cinBatir)
    doc.setFontType('normal')
    doc.setTextColor(0, 0, 0)
    doc.text(15,125,'Nous avons bien reçu votre demande d`autoriation de batir de surface '+surfaceBatir +' \n \n Nous essayons de vou répondre dés que possible.')
    doc.text(15,150,'Vous pouvez suivre votre demande a travers ce numéro '+NumBatir +' pour restez en contact de tous.')
    doc.text(15,160,'Veuillez recevoir, Madame, ou Monsieur,'+nomBatir+' '+prenomBatir +',  nos salutations distinguées')
    doc.setTextColor(255, 0, 0)
    doc.text(15,190,'Merci d`apporter ce document à la municipalité accompagné des documents suivants \n pour terminer les procédures')
    doc.setTextColor(0, 0, 0)
    doc.text(15,205,'*Une demande au nom de madame le maire, identifiable par signature sous la forme \nde plus d`un propriétaire \n*Certificat de propriété ou contrat de vente \n*5 exemple de plan \n*Attestation de libération des paiements afférents au terrain ou à l`immeuble, objet \nde la demande de licence \n*Revenu annuel ou carte de séjour à l`étranger')
    doc.setFontSize(16)
    doc.setTextColor(0, 0, 0)
    doc.text(105,245,'Commune de Menzel Abderrahmane')
    doc.setFontSize(10)
    doc.text(125,290,'http://www.commune-menzel-abderrahmen.gov.tn')
    }
    
    doc.save(nomBatir+prenomBatir+"Const.pdf");
    }
//     pdf acceptation Batir
    
function getPDFAcceptBatir(nom,prenom,address){
   
        var doc = new jsPDF();
        
        
        if((language=="arabe")){
           
        
        doc.addFileToVFS('Amiri-Regular-normal.ttf', font);
        doc.addFont('Amiri-Regular-normal.ttf', 'Amiri-Regular', 'normal');
        doc.addFileToVFS('Amiri-Italic-normal.ttf', fontItalic);
        doc.addFont('Amiri-Italic-normal.ttf', 'Amiri-Italic', 'normal');
        doc.setFont('Amiri-Regular', 'normal');
//         doc.addImage(imgData, 'PNG', 90, 10, 25, 35)
        doc.viewerPreferences({"Direction" : "RTL"}, true);
        doc.text(170, 15, 'الجمهورية التونسية')
        doc.text(175, 22, 'وزارة الداخلية')
        doc.text(179, 29, 'ولاية بنزرت')
        doc.text(159, 35, 'بلدية منزل عبد الرحمان')
        doc.text(10,15,annee+'/'+mois+'/'+jour+' منزل عبد الرحمان في ')
         doc.setFontSize(19)
         doc.setTextColor(0, 0, 255)
        doc.text(60,60,' من رئيسة بلدية منزل عبد الرحمان الى' )
        doc.text(80,70,' السيد/السيدة: ' +nom +" " +prenom )
        doc.text(50,80,'القاطن/القاطنة ب: ' +address)
        doc.setFontSize(18)
        doc.setTextColor(0, 0, 0)
        doc.text(195,100,'الموضوع : حول ملف رخصة البناء',{ align: "right",lang: 'ar'})
        var p1 = doc.splitTextToSize('وبعد تبعا لملف رخصة البناء المقدم من طرفكم حول العقار الموجود بمنزل عبد الرحمان نعلمكم انه تم عرض ملفكم على انضار اللجنة الفنية الجهوية لرخص البناء في الجلسة المنعقدة بتاريخ 14/04/2022',260);
        doc.text(195,120,p1,{ align: "right",lang: 'ar'})
        doc.text(195,145,'و التي ابدت رايها بالموافقة',{ align: "right",lang: 'ar'})
        doc.setDrawColor(255, 0, 0)
        doc.rect(165, 165, 20, 10)
        doc.setTextColor(255, 0, 0);
        doc.text(185,170, 'هام جدا',{ align: "right",lang: 'ar'});
        doc.setDrawColor(0, 0, 0)
        doc.rect(10, 180, 195, 35)
        doc.setTextColor(0, 0, 0);
        var p2 = doc.splitTextToSize('بناء على قرار اليدة وزيرة التجهيز و الاكان و التهيئة الترابية المؤرخ في 17 افريل 2007 المتعلق بضبط الوثائق المكونة لملف رخصة البناء و اجل صلاحيتها و التمديد فيها و روط تجديدها و خاصة الفصل الخام منه فاننا ندعوكم الى تلم رخصة البناء في اجل اقصاه هر من تاريخ هذا الاعلام و الا اصبحت غير سارية المفعول ',260);
        doc.text(200,190, p2,{ align: "right",lang: 'ar'});
        doc.setFontSize(16)
        doc.text(35,230,annee+'/'+mois+'/'+jour+' منزل عبد الرحمان في')
        doc.text(50,240,'رئيس/رئيسة البلدية')
        doc.setFontSize(10)
        doc.text(20,290,'http://www.commune-menzel-abderrahmen.gov.tn')
        }
        else{
            
//             doc.addImage(imgData, 'PNG', 90, 10, 25, 35)
        doc.setFontSize(10)
        doc.text(10, 15, 'République Tunisienne')
        doc.text(10, 22, 'Ministère de l`Intérieur ')
        doc.text(10, 29, 'Province de Bizerte')
        doc.text(10, 35, 'Municipalité de Manzel Abd al-Rahman')
     
    
        doc.text(140,15,'Menzel Abderahmane le '+jour+'/'+mois+'/'+annee)
        doc.setFontSize(16)
        doc.setTextColor(0, 0, 255)
        doc.text(45,60,'Du maire de la municipalité  d`Abd al-Rahman A')
        doc.text(66,70,'Madame/Monieur : '+nom +" "+prenom)
        doc.text(66,80,'Adresse : '+address)
        doc.setFontSize(12)
        doc.setTextColor(0, 0, 0)
        doc.text(15,100,'Sujet: À propos du dossier de permis de construire')
     
        var p1 = doc.splitTextToSize('Et après, selon le dossier de permis de construire déposé par vous concernant le bien situé dans la maison d`Abd al-Rahman, nous vous informons que votre dossier a été présenté à l`attention de la commission technique régionale des permis de construire lors de la séance tenue le 14-04-2022.', 180);
        doc.text(15,110,p1)
        doc.text(15,135,'Et celle qui a donné son avis par: Acceptation')
        doc.setDrawColor(255, 0, 0)
        doc.rect(20, 160, 34, 10)
        doc.setTextColor(255, 0, 0);
        doc.text(24,166,'Très important.')
        doc.setDrawColor(0, 0, 0)
        doc.rect(13, 173, 183, 30)
        doc.setTextColor(0, 0, 0);
        var p2 = doc.splitTextToSize('Vu l`arrêté du ministre de l`équipement, de l`habitat et de l`aménagement du territoire en date du 17 avril 2007, relatif au contrôle des pièces constituant le dossier de permis de construire, sa durée de validité et sa prorogation, les conditions de son renouvellement, et notamment le chapitre brut de celui-ci, nous vous invitons à retirer le permis de construire dans un délai maximum d`un mois à compter de la date de ce média, faute de quoi il n`est plus valable', 180);
        doc.text(15,178,p2)
     
        doc.setFontSize(14)
        doc.text(105,215,'Menzel Abderahmane le '+jour+'/'+mois+'/'+annee)
        doc.text(115,225,'Maire de la municipalité')
        doc.setFontSize(10)
        doc.text(125,290,'http://www.commune-menzel-abderrahmen.gov.tn')
        }
        
        doc.save(nom+prenom+"Respons.pdf");
        }
//     pdf refus Batir
         function getPDFRefusBatir(nom,prenom,address,raison){
   
            var doc = new jsPDF();
            
            
            if((language=="arabe")){
               
            
            doc.addFileToVFS('Amiri-Regular-normal.ttf', font);
            doc.addFont('Amiri-Regular-normal.ttf', 'Amiri-Regular', 'normal');
            doc.addFileToVFS('Amiri-Italic-normal.ttf', fontItalic);
            doc.addFont('Amiri-Italic-normal.ttf', 'Amiri-Italic', 'normal');
            doc.setFont('Amiri-Regular', 'normal');
//             doc.addImage(imgData, 'PNG', 90, 10, 25, 35)
            doc.viewerPreferences({"Direction" : "RTL"}, true);
            doc.text(170, 15, 'الجمهورية التونسية')
            doc.text(175, 22, 'وزارة الداخلية')
            doc.text(179, 29, 'ولاية بنزرت')
            doc.text(159, 35, 'بلدية منزل عبد الرحمان')
            doc.text(10,15,annee+'/'+mois+'/'+jour+' منزل عبد الرحمان في ')
             doc.setFontSize(19)
             doc.setTextColor(0, 0, 255)
            doc.text(60,60,' من رئيسة بلدية منزل عبد الرحمان الى' )
            doc.text(80,70,' السيد/السيدة: ' +nom +" "+prenom)
            doc.text(50,80,'القاطن/القاطنة ب:  ' +address)
            doc.setFontSize(18)
            doc.setTextColor(0, 0, 0)
            doc.text(195,100,'الموضوع : حول ملف رخصة البناء',{ align: "right",lang: 'ar'})
            var p1 = doc.splitTextToSize('وبعد تبعا لملف رخصة البناء المقدم من طرفكم حول العقار الموجود بمنزل عبد الرحمان نعلمكم انه تم عرض ملفكم على انضار اللجنة الفنية الجهوية لرخص البناء في الجلسة المنعقدة بتاريخ 14/04/2022',260);
            doc.text(195,120,p1,{ align: "right",lang: 'ar'})
            doc.text(195,150,'و التي ابدت رايها بعدم الموافقة',{ align: "right",lang: 'ar'})
            doc.text(195,165,':للاسباب التالية',{ align: "right",lang: 'ar'})
            doc.setTextColor(255, 0, 0)
            doc.text(195,180,' *'+raison,{ align: "right",lang: 'ar'})
            doc.setTextColor(0, 0, 0)
            doc.setFontSize(16)
            doc.text(35,240,annee+'/'+mois+'/'+jour+' منزل عبد الرحمان في')
            doc.text(50,250,'رئيس/رئيسة البلدية')
            doc.setFontSize(10)
            doc.text(20,290,'http://www.commune-menzel-abderrahmen.gov.tn')
            }
            else{
                
//                 doc.addImage(imgData, 'PNG', 90, 10, 25, 35)
            doc.setFontSize(10)
            doc.text(10, 15, 'République Tunisienne')
            doc.text(10, 22, 'Ministère de l`Intérieur ')
            doc.text(10, 29, 'Province de Bizerte')
            doc.text(10, 35, 'Municipalité de Manzel Abd al-Rahman')
         
        
            doc.text(140,15,'Menzel Abderahmane le '+jour+'/'+mois+'/'+annee)
            doc.setFontSize(16)
            doc.setTextColor(0, 0, 255)
            doc.text(45,60,'Du maire de la municipalité  d`Abd al-Rahman A')
            doc.text(66,70,'Madame/Monieur :' +nom +' '+prenom)
            doc.text(66,80,'Adresse : '+address)
            doc.setFontSize(12)
            doc.setTextColor(0, 0, 0)
            doc.text(15,100,'Sujet: À propos du dossier de permis de construire')
         
            var p1 = doc.splitTextToSize('Et après, selon le dossier de permis de construire déposé par vous concernant le bien situé dans la maison d`Abd al-Rahman, nous vous informons que votre dossier a été présenté à l`attention de la commission technique régionale des permis de construire lors de la séance tenue le 14-04-2022.', 180);
            doc.text(15,110,p1)
            doc.text(15,135,'Et celle qui a donné son avis par: Refus')
            doc.text(15,145,'Pour les raisons suivantes')
            doc.setTextColor(255, 0, 0)
            doc.text(15,160,'* '+raison)
            doc.setTextColor(0, 0, 0)
            
         
            doc.setFontSize(14)
            doc.text(105,185,'Menzel Abderahmane le '+jour+'/'+mois+'/'+annee)
            doc.text(115,195,'Maire de la municipalité')
            doc.setFontSize(10)
            doc.text(125,290,'http://www.commune-menzel-abderrahmen.gov.tn')
            }
            
            doc.save(nom+prenom+"Respons.pdf");
            }
            // pdf reseaux publics
            function getPDFResPublic(Adr,Nom,Prenom,NumCin,Email,type,desc,num_branch){
   
                var doc = new jsPDF();
                
                
                if((language=="arabe")){
               
            
                    doc.addFileToVFS('Amiri-Regular-normal.ttf', font);
                    doc.addFont('Amiri-Regular-normal.ttf', 'Amiri-Regular', 'normal');
                    doc.addFileToVFS('Amiri-Italic-normal.ttf', fontItalic);
                    doc.addFont('Amiri-Italic-normal.ttf', 'Amiri-Italic', 'normal');
                    doc.setFont('Amiri-Regular', 'normal');
                    // doc.addImage(imgData, 'PNG', 165, 10, 25, 35)
                    doc.viewerPreferences({"Direction" : "RTL"}, true);
                    doc.text(120, 15, 'بلدية منزل عبد الرحمان')
                    doc.text(92, 22, 'الهاتف 72 570 125/ 72 571 295')
                    doc.text(118, 29, 'الفاكس   125 570 72')
                    doc.text(70, 35, 'communemenzelabderrahmen@gmail.com')
                    doc.text(105, 40, 'نهج المنجي سليم 7035 بنزرت')
                    doc.setTextColor(0, 0, 255)
                    doc.text(45,65,  ' السيد/السيد :'+Prenom+' '+Nom )
                    doc.text(45,72,' القاطن/القاطنة ب: '+Adr)
                    doc.text(45,79,Email+' :البريد الالكتروني ')
                    doc.text(30,87,annee+'/'+mois+'/'+jour+' منزل عبد الرحمان في ')
                     doc.setFontSize(19)
                    doc.setTextColor(0, 0, 0)
                    doc.text(135,110,'رقم الملف : '+num_branch)
                    doc.text(120,125,' طلب الاتصال بالشبكة العامة ل'+type)
                     doc.setFontSize(19)
                     doc.setFont('Amiri-Italic', 'normal');
                    doc.setTextColor(0, 0, 255)
                    doc.setFontSize(18)
                    doc.text(40,140,' السيدة/السيدة  '+Nom+' '+Prenom +' صاحب بطاقة تعريف وطنية عدد '+NumCin)
                    doc.setFont('Amiri-Regular', 'normal');
                    doc.setTextColor(0, 0, 0)
                     doc.text(30,155,' لقد تلقينا طلبكم للاتصال بالشبكات العامة من النوع '+type +' و الموضوع  '+desc)
                     doc.text(110,165,'سنحاول الرد عليك في أسرع وقت ممكن')
                    doc.text(25,175,' يمكنك متابعة طلبك من خلال هذا الرقم  '+num_branch +' للبقاء على اتصال مع الجميع')
                    doc.text(60,185,' من فضلك استقبل سيدتي ام سيدي '+Nom+' '+Prenom +',  أطيب التحيات')
                    doc.setTextColor(255, 0, 0)
                    doc.text(45,205,'يرجى إحضار هذه الوثيقة إلى البلدية مع الاوراق التالية لاتمام الاجراءات')
                    doc.setTextColor(0, 0, 0)
                    doc.text(40,215,'مطلب باسم السيدة رئيسة البلدية معرف بالامضاء في صورة اكثر من مالك *')
                    doc.text(145,225,'شهادة ملكية او عقد بيع *')
        
                    doc.setFontSize(16)
                   
                    doc.text(35,250,'بلدية منزل عبد الرحمان')
                    doc.setFontSize(10)
                    doc.text(20,290,'http://www.commune-menzel-abderrahmen.gov.tn')
                    }
                    else{
                        // doc.addImage(imgData, 'PNG', 15, 10, 25, 30)
                    doc.setFontSize(10)
                    
                    doc.text(42, 15, 'Commune de MENZEL ABDERRAHMAN  \n Tel (+216) 72 570 125/ (+216) 72 571 295 \n Fax (+216) 72 570 125 \n communemenzelabderrahmen@gmail.com \n Rue El Mongi Slim 7035 menzel abdel rahmen ')
                    
                    doc.setTextColor(0, 0, 255)
                    doc.text(130,60,'Nom et Prénom : '+Nom+' '+Prenom)
                    doc.text(130,65,'Adresse : '+Adr)
                    doc.text(130,70,'Email :'+Email)
                    doc.text(130,75,'Menzel Abderhmane le '+jour+'/'+mois+'/'+annee)
                    doc.setFontSize(16)
                    doc.setTextColor(0, 0, 0)
                    doc.text(15,95,'Numéro dossier: '+num_branch)
                    doc.text(15,105,'Décharge de demande de branchement aux réseau publics de :'+type)
                    doc.setFontSize(16)
                    doc.setFontType('italic')
                    doc.setTextColor(0, 0, 255)
                    doc.setFontSize(12)
                    doc.text(15,115,'Monsieur/Madame '+Nom+' '+Prenom +' titulaire de cin '+NumCin)
                    doc.setFontType('normal')
                    doc.setTextColor(0, 0, 0)
                    doc.text(15,125,'Nous avons bien reçu votre votre demande de branchement aux réseau publics de type '+type +' \n \n et de description '+desc+' \n\nNous essayons de vou répondre dés que possible.')
                    doc.text(15,150,'Vous pouvez suivre votre demande a travers ce numéro '+num_branch +' pour restez en contact de tous.')
                    doc.text(15,160,'Veuillez recevoir, Madame, ou Monsieur,'+Nom+' '+Prenom +',  nos salutations distinguées')
                    doc.setTextColor(255, 0, 0)
                    doc.text(15,190,'Merci d`apporter ce document à la municipalité accompagné des documents suivants \n pour terminer les procédures')
                    doc.setTextColor(0, 0, 0)
                    doc.text(15,205,'*Une demande au nom de madame le maire, identifiable par signature sous la forme \nde plus d`un propriétaire \n\n*Certificat de propriété ou contrat de vente ')
                    doc.setFontSize(16)
                    doc.setTextColor(0, 0, 0)
                    doc.text(105,245,'Commune de Menzel Abderrahmane')
                    doc.setFontSize(10)
                    doc.text(125,290,'http://www.commune-menzel-abderrahmen.gov.tn')
                    }
                doc.save(Nom+Prenom+"Demande.pdf");
                }
                // acceptation Res
                function getPDFResPublicAccept(type,nom,prenom,adr,type_soc,type_res,num_branch){
   
                    var doc = new jsPDF();
                    
                    
                    if((language=="arabe")){
                       
                    
                    doc.addFileToVFS('Amiri-Regular-normal.ttf', font);
                    doc.addFont('Amiri-Regular-normal.ttf', 'Amiri-Regular', 'normal');
                    doc.addFileToVFS('Amiri-Italic-normal.ttf', fontItalic);
                    doc.addFont('Amiri-Italic-normal.ttf', 'Amiri-Italic', 'normal');
                    doc.setFont('Amiri-Regular', 'normal');
                    // doc.addImage(imgData, 'PNG', 90, 10, 25, 35)
                    doc.viewerPreferences({"Direction" : "RTL"}, true);
                    doc.text(170, 15, 'الجمهورية التونسية')
                    doc.text(175, 22, 'وزارة الداخلية')
                    doc.text(179, 29, 'ولاية بنزرت')
                    doc.text(159, 35, 'بلدية منزل عبد الرحمان')
                    doc.text(10,15,annee+'/'+mois+'/'+jour+' منزل عبد الرحمان في ')
                     doc.setFontSize(19)
                     doc.setTextColor(0, 0, 255)
                    doc.text(60,70,'ترخيص في ادخال '+type )
                    doc.setFontSize(18)
                    doc.setTextColor(0, 0, 0)
                    var p1 = doc.splitTextToSize('ان رئيسة بلدية منزل عبد الرحمان بعد اطلاعها على  المطلب الذي تقدم به السيد/السيدة'+nom +' '+prenom+' لتزويد محله/ها الكائن ب'+adr+' '+type+' من طرف '+type_soc,260);
                    doc.text(195,100,p1,{ align: "right",lang: 'ar'})
                    var p2 = doc.splitTextToSize('وتبعا للجلسة المحلية لاسناد تراخيص الربط بالشبكات العمومية للبناءات المشيدة بدون ترخيص المنعقدة بمقر بلدية منزل عبد الرحمان بتاريخ 2022-05 -2',250);
                     doc.text(195,130,p2,{ align: "right",lang: 'ar'})
                     var p3 = doc.splitTextToSize('واستنادا لمصادقة السيد والي بنزرت بتاريخ 2021-01-02 و جدول ارسال الولاية عدد 972 / 13 بتاريخ 2022- 02- 04 ',250);
                     doc.text(195,150,p3,{ align: "right",lang: 'ar'})
                     var p4 = doc.splitTextToSize('و بعد تبعا لمحضر جلسة اللجنة المحلية لاسناد تراخيص الربط بشبكتي الماء الصالح للشراب و النور الكهربائي المنعقدة بتاريخ 16/12/2014 بمقر بلدية منزل عبد الرحمان',250);
                     doc.text(195,170,p4,{ align: "right",lang: 'ar'})
                     doc.text(195,195,'يرخص للسيد/ة '+nom +' '+prenom,{ align: "right",lang: 'ar'})
                    doc.text(195,205,'في ربط محله/ها المذكور ب '+type_res,{ align: "right",lang: 'ar'})
                    doc.text(195,215,' سلمت هذه الشهادة للادلاء بها لدى مصالح '+type_soc,{ align: "right",lang: 'ar'})
                    doc.text(195,225,' رقم الملف : '+num_branch,{ align: "right",lang: 'ar'})
                    doc.setFontSize(16)
                    doc.text(35,245,annee+'/'+mois+'/'+jour+' منزل عبد الرحمان في')
                    doc.text(50,255,'رئيس/رئيسة البلدية')
                    doc.setFontSize(10)
                    doc.text(20,290,'http://www.commune-menzel-abderrahmen.gov.tn')
                    }
                    else{
                        
                        // doc.addImage(imgData, 'PNG', 90, 10, 25, 35)
                    doc.setFontSize(10)
                    doc.text(10, 15, 'République Tunisienne')
                    doc.text(10, 22, 'Ministère de l`Intérieur ')
                    doc.text(10, 29, 'Province de Bizerte')
                    doc.text(10, 35, 'Municipalité de Manzel Abd al-Rahman')
                 
                
                    doc.text(140,15,'Menzel Abderahmane le '+jour+'/'+mois+'/'+annee)
                    doc.setFontSize(19)
                    doc.setTextColor(0, 0, 255)
                    doc.text(45,75,'Autorisation d`amener d`'+type)
                    doc.setFontSize(12)
                    doc.setTextColor(0, 0, 0)
                    var p1 = doc.splitTextToSize('Le maire de Menzel Abderrahmane, après examen de la demande présentée par M./Mme '+nom+' '+prenom+' d`approvisionner son commerce situé en '+adr+' en '+type+' de la '+type_soc, 180);
                    doc.text(15,100,p1)
                    var p2 = doc.splitTextToSize('Et selon la session locale d`attribution des licences de raccordement aux réseaux publics pour les bâtiments construits sans licence, tenue au siège de la municipalité de Manzil Abd al-Rahman le 2022-05-23.', 180);
                    doc.text(15,120,p2)
                    var p3 = doc.splitTextToSize('Et sur la base de l`approbation de M. Gouverneur de Bizerte en date du 02-01-2021 et du bordereau d`expédition de l`etat n° 13/972 en date du 04-02-2022', 180);
                    doc.text(15,140,p3)
                    var p4 = doc.splitTextToSize(' Et après, selon le procès-verbal de la séance de la commission locale d`attribution des autorisations de raccordement aux réseaux d`eau potable et d`éclairage électrique, qui s`est tenue le  16/12/2014 au siège de la commune de Manzil Abd al-Rahman', 180);
                    doc.text(15,155,p4)
                    doc.text(15,175,'Autorisé à M.Mme '+nom + ' '+prenom)
                    var p5 = doc.splitTextToSize('Raccordement de ses locaux précités au réseau public de réseau public de distribution de l`électricité', 180);
                    doc.text(15,190,p5)
                    var p6 = doc.splitTextToSize('Ce certificat a été délivré aux intérêts de la '+type_soc, 180);
                    doc.text(15,205,p6)
                    doc.text(15,215,'Numéro dossier : '+num_branch)
                    doc.setFontSize(14)
                    doc.text(105,235,'Menzel Abderahmane le '+jour+'/'+mois+'/'+annee)
                    doc.text(115,245,'Maire de la municipalité')
                    doc.setFontSize(10)
                    doc.text(125,290,'http://www.commune-menzel-abderrahmen.gov.tn')
                    }
                    
                    doc.save(nom+prenom+"Response.pdf");
                    }
                
 /**
  * cette fonction permet le rebot de lire le message 
  * on prend a chaque fois la langue selon language sélectionné
  * selon l id et l'actor pour distinguer les messages de rebot et de user en plus chaque partie
  */
 
 /** 
  * cette fonction nous permet de modifier la partie de chatbot (design) 
  */
 function updateChatText(chatbox) {
    var html = '';
    const BOT_IMG = "https://gogeticon.net/files/2950565/b15187318b19a4abcef05283cc3be807.png";
const PERSON_IMG = "https://gogeticon.net/files/3132957/20aa7104af98f6347f6e90d1beacbf1a.png";
    this.messages.slice().reverse().forEach(function(item, index) {
        if (item.name === "Sam")
        {
//                  html += '<div class=" messages__item--visitor1">'+ item.date+'</div>'
             html += '<div class="messages__item messages__item--visitor">'+item.message+'</div>'
             html += '<div class=" messages__item--visitor1">' + "chatbot-"+ heure + `:` + minute +"&#10003;"+'</div>'

            
//                  html += '<div class="messages__item messages__item--visitor">' + item.message + item.date '</div>'

            /*html +=' <div class="msg-info-time">'+${formatDate(new Date())}+'</div>'*/
        }
        if (item.name === "User")
        {
//                 html += '<div class=" messages__item--visitor2 ">' + "moi-"+item.date+"&#10003;"+'</div>'
            
            html += '<div class="messages__item messages__item--operator">' + item.message+'</div>'
             html += '<div class=" messages__item--operator1">' + "moi-"+ heure + `:` + minute +"&#10003;"+'</div>'
            

            

           /* html +=' <div class="msg-info-time">'+${formatDate(new Date())}+'</div>'*/
        }
      });

    const chatmessage = chatbox.querySelector('.chatbox__messages');
    chatmessage.innerHTML = html;
    chatBox_integration.querySelector('input').value ='';

}
