/**
 * initialisation des variables necessaires
 * declaraction de speechRecognition
 */
var SpeechRecognition = window.SpeechRecognition || webkitSpeechRecognition;
var recognition = new SpeechRecognition();
var language = "";
var button = document.getElementById("button");
button.addEventListener("click", (start) => {
    recognition.start();
});

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
var v = 0;

args = {
    openButton: document.querySelector(".chatbox__button"),
    chatBox: document.querySelector(".chatbox__support"),
    sendButton: document.querySelector(".send__button"),
};
messages = new Array();
state = false;

const { openButton, chatBox, sendButton } = args;
//ajouter les evenements des boutons 
openButton.addEventListener("click", () => toggleState(chatBox));
sendButton.addEventListener("click", () => onSendButton(chatBox));
/**
 * 
 * fonctin modifyLanguage nous permet de changer la langue on a 3 bouton francais / anglais/arabe
 * si on click sur arabe la langue devienne arabe et le robot parle en arabe
 * si on click sur francais la langue devienne francais et le robot parle en francais
 * si on click sur anglais la langue devienne anglais et le robot parle en anglais
 */
function modifyLanguage(lang) {
    language = lang;
    console.log("language " + language);
    switch (language) {
        case "anglais":
            mess0 = "Hi. My name is Sam. How can I help you?";
            let msg01 = { name: "welcome_Sam", message: mess0 };
            messages.push(msg01);
            updateChatText(chatBox);
            readOutLoud(mess0, "chat-1", "chat");
            break;
        case "français":

            mess1 = "Salut. je suis Sam. comment puis-je vous aider?";
            let msg02 = { name: "welcome_Sam", message: mess1 };
            messages.push(msg02);
            updateChatText(chatBox);
            readOutLoud(mess1, "chat-1", "chat");
     

            break;
        case "arabe":
            mess2 = "مرحبا. اسمي سام كيف يمكنني مساعدتك؟";
            let msg03 = { name: "welcome_Sam", message: mess2 };
            messages.push(msg03);
            updateChatText(chatBox);
            readOutLoud(mess2, "chat-1", "chat");
            break;
        default:
            readOutLoud("choisir une langue", "lang-chose", "chat");
    }
}
/**
 * 
 * la fonction toggleState c'est celui qu'on va mettre les actions selon statys de chatbox (ouvert/fermé)
 * Si ouvert on va questionner l'utilisateur de langue désiré
 * sinon on va vider tous
 */
function toggleState(chatbox) {
    this.state = !this.state;

    if (this.state) {
        chatbox.classList.add("chatbox--active");

        msg = "Choisir une langue";
        let msg0 = { name: "langue", message: msg };
        messages.push(msg0);
        updateChatText(chatbox);
        readOutLoud(msg, "lang-chose", "chat");
    } else {
        chatbox.classList.remove("chatbox--active");
        for (let index = 0; index < messages.length; index++) {
            messages = [];
            language = "";
        }
    }
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
function VoiceBot(msg, chatbox) {
    let msg2 = { name: "Sam", message: msg };
    messages.push(msg2);
    chatRepId++;
    updateChatText(chatbox);
    readOutLoud(msg, "chat-" + chatRepId, "chat");
}
//consommation api
function ajoutRecVoiceBot() {
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
            "Access-Control-Allow-Origin": "127.0.0.1",
            "Access-Control-Allow-Credentials": "true",
            "Access-Control-Allow-Headers": "*"
        },
        success: function (response, status, xhr) {
            switch (language) {
                case "anglais":
                    VoiceBot("Complaint request registered. your waiver iss uploded", chatBox);
                    NumRec = "";
                    break;
                case "français":
                    VoiceBot("Demande de réclamation enregistré. votre décharge à été télécharger", chatBox);
                    NumRec = "";
                    break;
                case "arabe":
                    VoiceBot(" تم تسجيل طلب الشكوى", chatBox);
                    NumRec = "";
                    break;

                default:
                    VoiceBot("Demande de réclamation enregistré. Merci de télécharger votre décharge", chatBox);
                    NumRec = "";
                    break;
            }
        },
        error: function (xhr, status, error) {
            console.log("Something went wrong!");
        }
    });

}
function suiviRecVoiceBot(num_rec,chatbox) {
    var url = "http://127.0.0.1:8080/work/consommation%20api/suiviRec.php";
    $.ajax({
        type: 'POST',
        url: url,
        data: { 'num_rec': num_rec },
        dataType: 'JSON',
        encode: true,
        mode: 'no-cors',
        headers: {
            "Access-Control-Allow-Origin": "127.0.0.1",
            "Access-Control-Allow-Credentials": "true",
            "Access-Control-Allow-Headers": "*"
        },
        success: function (response, status, xhr) {
            switch (language) {
                case "anglais":
                    switch(response['status']){
                        case "0":
                            VoiceBot("Mr or Mrs "+response['last_name'] +' '+ response['first_name']+" your claim is delivered but not yet processed ", chatbox);
                            break;
                            case "1":
                                VoiceBot("Mr or Mrs "+response['last_name'] +' '+ response['first_name']+" your complaint is being processed ", chatbox);
                            break;
                            case "2":
                                VoiceBot("Mr or Mrs "+response['last_name'] +' '+ response['first_name']+" your complaint is resolved ", chatbox);
                            break;
                    }
                     
                    break;
                case "français":
                    console.log("name ",response['first_name']);
                    console.log("status ",response['status']);
                    var status = response['status'];
                    switch(status){
                        case "0":
                            VoiceBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+" votre réclamation est delivré mais pas encore traité ", chatbox);
                            break;
                            case "1":
                                VoiceBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+" votre réclamation est en cours de traitement ", chatbox);
                            break;
                            case "2":
                                VoiceBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+" votre réclamation est résolu ", chatbox);
                            break;
                    }
                   
                    break;
                case "arabe":
                    switch(response['status']){
                        case "0":
                            VoiceBot("السيد او السيدة  "+response['last_name'] +' '+ response['first_name']+" تم تسليم مطالبتك ولكن لم تتم معالجتها بعد ", chatbox);
                            break;
                            case "1":
                                VoiceBot("السيد او السيدة  "+response['last_name'] +' '+ response['first_name']+" شكواك قيد المعالجة ", chatbox);
                            break;
                            case "2":
                                VoiceBot("السيد او السيدة  "+response['last_name'] +' '+ response['first_name']+" تم حل شكواك ", chatbox);
                            break;
                    }
                  
                    break;

                default:
                    switch(response['status']){
                        case "0":
                            VoiceBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+" votre réclamation est delivré mais pas encore traité ", chatbox);
                            break;
                            case "1":
                                VoiceBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+" votre réclamation est en cours de traitement ", chatbox);
                            break;
                            case "2":
                                VoiceBot("Monsieur ou Madame "+response['last_name'] +' '+ response['first_name']+" votre réclamation est résolu ", chatbox);
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

function getPDF(AdrRec,NomRec,PrenomRec,NumCin,EmailRec,TypeRec,DescRec,NumRec){
    var imgData = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAI0AAADICAYAAADVy2J6AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAxBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RjgyQjJEQzNDQTBFMTFFNkE0NTFDRDYzRDg4QjI3QUIiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RjgyQjJEQzJDQTBFMTFFNkE0NTFDRDYzRDg4QjI3QUIiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiBXaW5kb3dzIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9IjJEMTk5ODZDNUJENTUwOUI2NjhFRUI4Q0Y1RDlCNzAwIiBzdFJlZjpkb2N1bWVudElEPSIyRDE5OTg2QzVCRDU1MDlCNjY4RUVCOENGNUQ5QjcwMCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PgHo6doAALzoSURBVHja7L0HfBzV1T78zMz21WpXvVtdtuXesY0r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';
var doc = new jsPDF()
if(language=="arabe"){
    html2canvas(NomRec);
}
// doc.setFontSize(20)
// doc.text(35, 25, 'Paranyan loves jsPDF')

doc.addImage(imgData, 'PNG', 15, 10, 25, 30)
doc.setFontSize(10)

doc.text(42, 15, 'Commune de MENZEL ABDERRAHMAN  \n Tel (+216) 72 570 125/ (+216) 72 571 295 \n Fax (+216) 72 570 125 \n communemenzelabderrahmen@gmail.com \n Rue El Mongi Slim 7035 menzel abdel rahmen ')

doc.setTextColor(0, 0, 255)
doc.text(130,60,'Nom et Prénom : '+NomRec+' '+PrenomRec)
doc.text(130,65,'Adresse : '+AdrRec)
doc.text(130,70,'Email :'+EmailRec)
doc.text(130,75,'Bizerte le '+jour+'/'+mois+'/'+annee)
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
doc.save(NomRec+PrenomRec+".pdf");
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
function onSendButton(chatbox) {
    switch (language) {
        case "anglais":
            recognition.lang = "en-US";
            break;
        case "français":
            recognition.lang = "fr-FR";
            break;
        case "arabe":
            recognition.lang = "ar-AE";
            break;
        default:
            recognition.lang = "fr-FR";
            break;
    }
    console.log("aaaa " + recognition.lang);
    recognition.onresult = function (e) {
        let textField = e.results[0][0].transcript;
        let msg1 = { name: "User", message: textField };
        messages.push(msg1);
        updateChatText(chatbox);
        if ((textField == "réclamation") || (textField == "شكوى")
            || (textField == "reclamation")) {
            switch (language) {
                case "anglais":
                    VoiceBot("Hello! please send me your last name", chatbox);
                    textField = "";
                    v = 1;
                    break;
                case "français":
                    VoiceBot("Bienvenue dans l`espace de réclamation merci d`envoyer votre nom", chatbox);
                    textField = "";
                    v = 1;
                    break;
                case "arabe":
                    VoiceBot("مرحبا في فضاء الشكايات من فضلك ارسل لي اسم العائلة", chatbox);
                    textField = "";
                    v = 1;
                    break;

            }
           


        }
        if ((textField == "suivi réclamation")|| (textField == "اتباع")
        || (textField == "check")) {
           
           
                switch (language) {
                    case "anglais":
                        VoiceBot("Hi send me the claim number you want to track", chatbox);
                        textField = "";
                        v = 8;
                        break;
                    case "français":
                        VoiceBot("Salut envoyez moi le numéro de réclamation que vous voullez suivre", chatbox);
                        textField = "";
                        v = 8;
                        break;
                    case "arabe":
                        VoiceBot("مرحبًا ، أرسل لي رقم المطالبة الذي تريد تتبعه", chatbox);
                        textField = "";
                        v = 8;
                        break;
                }
             
              
        }
        
       

        // if (textField === "") {
        //     return;
        // }

        // else{
        switch (v) {
            case 0:
                fetch("http://127.0.0.1:5050/predict", {
                    method: "POST",
                    body: JSON.stringify({ message: textField }),
                    mode: "cors",
                    headers: {
                        "Content-Type": "application/json",
                        "Access-Control-Allow-Origin": "127.0.0.1"
                    },
                })
                    .then((response) => response.json())
                    .then((data) => {
                        let msg2 = { name: "Sam", message: data };
                        messages.push(msg2);
                        chatRepId++;
                        updateChatText(chatbox);
                        readOutLoud(data, "chat-" + chatRepId, "chat");
                        textField.value = "";
                    })
                    .catch(console.error);
                break;

            case 1:
                if (textField !== "") {
                    nomRec = textField;
                    if (typeof nomRec === 'string' && nomRec.trim().length >= 4) {
                        switch (language) {
                            case "anglais":
                                VoiceBot("Mr or Mrs " + nomRec + " please send me your first name", chatbox);
                                break;
                            case "français":
                                VoiceBot("Monsieur ou Madame " + nomRec + " s`il vous plait envoyer moi votre prénom", chatbox);
                                break;
                            case "arabe":
                                VoiceBot(" السيد او السيدة  " + nomRec + "ارسل لي اسمك "
                                    , chatbox);
                                break;

                            default:
                                VoiceBot("Monsieur ou Madame " + nomRec + " s`il vous plait envoyer moi votre prénom", chatbox);
                                break;
                        }
                        v = 2;
                    }
                    else {
                        switch (language) {
                            case "anglais":
                                VoiceBot("Invalid name", chatbox);
                                break;
                            case "français":
                                VoiceBot("Nom non valide", chatbox);
                                break;
                            case "arabe":
                                VoiceBot("اسم عائلة غير صحيح", chatbox);
                                break;

                            default:
                                VoiceBot("Nom non valide", chatbox);
                                break;
                        }
                    }
                }

                break;

            case 2:
                if (textField !== "") {
                    prenomRec = textField;

                    if (typeof prenomRec === 'string' && prenomRec.trim().length >= 3) {
                        switch (language) {
                            case "anglais":
                                VoiceBot("Mr or Mrs " + nomRec + " " + prenomRec + " send me your identity card number", chatbox);
                                break;
                            case "français":
                                VoiceBot("Monsieur ou Madame " + nomRec + " " + prenomRec + " envoyer moi votre numéro de carte d`identité", chatbox);
                                break;
                            case "arabe":
                                VoiceBot("السيد او السيدة" + nomRec + " " + prenomRec + "ارسل لي رقم بطاقة هويتك ", chatbox);
                                break;

                            default:
                                VoiceBot("Monsieur ou Madame " + nomRec + " " + prenomRec + " envoyer moi votre numéro de carte d`identité", chatbox);
                                break;
                        }
                        v = 3;
                    }
                    else {
                        switch (language) {
                            case "anglais":
                                VoiceBot("Say a real name please", chatbox);
                                break;
                            case "français":
                                VoiceBot("Dire un vrai prénom s`il vous plait", chatbox);
                                break;
                            case "arabe":
                                VoiceBot("قل الاسم الحقيقي من فضلك", chatbox);
                                break;

                            default:
                                VoiceBot("Dire un vrai prénom s`il vous plait", chatbox);
                                break;
                        }

                    }
                }

                break;
            case 3:
                if (textField !== "") {
                    cinRec = "";
                    if (language == "arabe") {
                        var cinArray = textField.split(' ');
                        for (let i = 0; i < cinArray.length; i++) {
                            cinRec = cinRec + getNumLet(cinArray[i]);
                        }
                    } else {
                        cinRec = textField.replaceAll(' ', '');
                    }

                    console.log("cin " + cinRec);
                    if (cinRec.length == 8) {
                        switch (language) {
                            case "anglais":
                                VoiceBot("Great now what is your address", chatbox);
                                break;
                            case "français":
                                VoiceBot("Génial maintenant c`est quoi votre adresse", chatbox);
                                break;
                            case "arabe":
                                VoiceBot("عظيم الآن ما هو عنوانك", chatbox);
                                break;

                            default:
                                VoiceBot("Génial maintenant c`est quoi votre adresse", chatbox);
                                break;
                        }
                        v = 4;
                    }
                    else {
                        switch (language) {
                            case "anglais":
                                VoiceBot("The identity card number must be an 8-digit number", chatbox);
                                break;
                            case "français":
                                VoiceBot("Le numéro de carte d`identité doit etre un nombre de 8 chiffres", chatbox);
                                break;
                            case "arabe":
                                VoiceBot("يجب أن يتكون رقم بطاقة الهوية من 8 أرقام", chatbox);
                                break;

                            default:
                                VoiceBot("Le numéro de carte d`identité doit etre un nombre de 8 chiffres", chatbox);
                                break;
                        }
                    }
                }

                break;
            case 4:
                if (textField !== "") {
                    adrRec = textField;

                    if (typeof adrRec === 'string' && adrRec.trim().length >= 4) {
                        switch (language) {
                            case "anglais":
                                VoiceBot("what is your email", chatbox);
                                break;
                            case "français":
                                VoiceBot("c`est quoi Votre email", chatbox);
                                break;
                            case "arabe":
                                VoiceBot("ماهو بريدك الإلكتروني", chatbox);
                                recognition.lang = "en-US";
                                break;

                            default:
                                VoiceBot("c`est quoi Votre email", chatbox);
                                break;
                        }
                        v = 5;
                    }
                    else {
                        switch (language) {
                            case "anglais":
                                VoiceBot("there is an error try again", chatbox);
                                break;
                            case "français":
                                VoiceBot("il y a une erreur réessayer", chatbox);
                                break;
                            case "arabe":
                                VoiceBot("هناك خطأ ما حاول مرة أخرى", chatbox);
                                break;

                            default:
                                VoiceBot("il y a une erreur réessayer", chatbox);
                                break;
                        }
                    }
                }

                break;
            case 5:
                if (textField !== "") {
                    textField = textField.replaceAll('arobase', '@');
                    textField = textField.replaceAll('at', '@');
                    textField = textField.replaceAll(' ', '');
                    emailRec = textField
                    console.log("email " + emailRec);
                    if (validateEmail(emailRec)) {
                        switch (language) {
                            case "anglais":
                                VoiceBot("Choose a type from this list say 1 if the complaint is of the administration type 2 if of the anarchic construction type 3 if of the public lighting type 4 if of the energy type 5 if of the green space type 6 mobility 7 health and hygiene and 8 if it is another kind", chatbox);
                                break;
                            case "français":
                                VoiceBot("Choisir un type parmi cette liste dire 1 si la réclamation de type administration 2 si de type construction anarchique 3 si de type éclairage publique 4 si de type énergie 5 si de type espace verts 6 mobilité 7 santé et hiégiéne et 8 si c est une autre type", chatbox);
                                break;
                            case "arabe":
                                recognition.lang = "ar-AE";
                                VoiceBot("اختر نوعًا من هذه القائمة قل 1 إذا كانت الشكوى من نوع الإدارة 2 إذا كانت من نوع البناء الفوضوي 3 إذا كانت من نوع الإضاءة العامة من النوع 4 إذا كانت من نوع الطاقة 5 إذا كانت من المساحة الخضراء من النوع 6 التنقل 7 الصحة والنظافة 8 إذا كان من نوع آخر", chatbox);
                                break;

                            default:
                                VoiceBot("Choisir un type parmi cette liste dire 1 si la réclamation de type administration 2 si de type construction anarchique 3 si de type éclairage publique 4 si de type énergie 5 si de type espace verts 6 mobilité 7 santé et hiégiéne et 8 si c est une autre type", chatbox);
                                break;
                        }
                        v = 6;
                    }
                    else {
                        switch (language) {
                            case "anglais":
                                VoiceBot("invalid email try again", chatbox);
                                break;
                            case "français":
                                VoiceBot("email non valide réessayer", chatbox);
                                break;
                            case "arabe":
                                VoiceBot(" البريد الإلكتروني غير صالح حاول مرة أخرى", chatbox);
                                break;

                            default:
                                VoiceBot("email non valide réessayer", chatbox);
                                break;
                        }

                    }
                }

                break;
            case 6:
                if (textField !== "") {
                     if(language=="arabe"){
                        typeRec=getNumLet(textField);
                    switch (typeRec) {
                        case 1:
                            typeRec = "Administration";
                            break;
                        case 2:
                            typeRec = "Construction anarchiques";
                            break;
                        case 3:
                            typeRec = "Eclairage publique";
                            break;
                        case 4:
                            typeRec = "Energie";
                            break;
                        case 5:
                            typeRec = "Espaces Verts";
                            break;
                        case 6:
                            typeRec = "Mobilité";
                            break;
                        case 7:
                           
                            typeRec = "Santé et Higiéne";
                            break;
                        case 8:
                           
                            typeRec = "Autres Réclamations ";
                            break;
                        default:
                            switch (language) {
                                case "anglais":
                                    VoiceBot("Unknown type try again", chatbox);
                                    break;
                                case "français":
                                    VoiceBot("Type non connue réessayer", chatbox);
                                    break;
                                case "arabe":
                                    VoiceBot("نوع غير معروف حاول مرة أخرى", chatbox);
                                    break;

                                default:
                                    VoiceBot("Type non connue réessayer", chatbox);
                                    break;
                            }
                            break;
                    }
                    console.log("type ",typeRec);
                }
                else{
                    switch (textField) {
                        case "1":
                            typeRec = "Administration";
                            break;
                        case "2":
                            typeRec = "Construction anarchiques";
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
                                case "anglais":
                                    VoiceBot("Unknown type try again", chatbox);
                                    break;
                                case "français":
                                    VoiceBot("Type non connue réessayer", chatbox);
                                    break;
                                case "arabe":
                                    VoiceBot("نوع غير معروف حاول مرة أخرى", chatbox);
                                    break;

                                default:
                                    VoiceBot("Type non connue réessayer", chatbox);
                                    break;
                            }
                            break;
                    }
                    console.log("type ",typeRec);
                }
                    switch (language) {
                        case "anglais":
                            VoiceBot("Please send me a short description of your complaint", chatbox);
                            break;
                        case "français":
                            VoiceBot("Merci de m`envoyer une petite description de votre réclamation", chatbox);
                            break;
                        case "arabe":
                            VoiceBot("من فضلك أرسل لي وصفا موجزا لشكواك", chatbox);
                            break;

                        default:
                            VoiceBot("Merci de m`envoyer une petite description de votre réclamation", chatbox);
                            break;
                    }


                    v = 7;

                }

                break;
            case 7:
                if (textField !== "") {
                    descRec = textField;

                    if (typeof descRec === 'string' && descRec.trim().length >= 10) {
                        
                        ajoutRecVoiceBot();
                        getPDF(adrRec,nomRec,prenomRec,cinRec,emailRec,typeRec,descRec,NumRec);
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
                        //v = 8;
                    }
                    else {
                        switch (language) {
                            case "anglais":
                                VoiceBot("Say a correct description", chatbox);
                                break;
                            case "français":
                                VoiceBot("Dire une correcte description", chatbox);
                                break;
                            case "arabe":
                                VoiceBot("قل وصفا صحيحا", chatbox);
                                break;

                            default:
                                VoiceBot("Dire une correcte description", chatbox);
                                break;
                        }

                    }
                }

                break;
        case 8:
           
            if (textField !== "") {
                num_rec="";
        
               // if (language == "arabe") {
                    var NumArray = textField.split(' ');
                    for (let i = 0; i < NumArray.length; i++) {
                        num_rec = num_rec + getNumLet(NumArray[i]);
                  //  }
              //  } else {
                    num_rec = textField.replaceAll(' ', '');
         }

               
             
                console.log("je suis la");
                
                console.log("nummm", num_rec);
                if (num_rec.length == 8) {
                    suiviRecVoiceBot(num_rec,chatbox);
                }
                else {
                    VoiceBot("Revérifier", chatbox);
                }
            }
            break;

        }
    };
    // }

}
/**
 * cette fonction permet le rebot de lire le message 
 * on prend a chaque fois la langue selon language sélectionné
 * selon l id et l'actor pour distinguer les messages de rebot et de user en plus chaque partie
 */
function readOutLoud(message, id, actor) {
    var speech = new SpeechSynthesisUtterance();
    div = document.getElementById(id);
    console.log(id);
    // Set the text and voice attributes.
    speech.text = message;
    speech.volume = 1;
    speech.rate = 1;
    speech.pitch = 1;
    switch (language) {
        case "anglais":
            speech.lang = "en-US";
            test = "play";
            break;
        case "français":
            speech.lang = "fr-FR";
            test = "Lire";
            break;
        case "arabe":
            speech.lang = "ar-AE";
            test = "استمع";
            break;
        default:
            speech.lang = "fr-FR";
            test = "Lire";
    }
    console.log("test " + test);



    if (actor == "chat") {
        div.innerHTML = `<svg width="100%" height="100%" id="svg" viewBox="0 0 1440 400" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150"><style>
    .path-0{
    animation:pathAnim-0 4s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    }
    @keyframes pathAnim-0{
    0%{
    d: path("M 0,400 C 0,400 0,200 0,200 C 29.866201992251654,168.9144023252261 59.73240398450331,137.82880465045218 84,161 C 108.2675960154967,184.17119534954782 126.9365860542384,261.59918372341735 145,270 C 163.0634139457616,278.40081627658265 180.52125179854318,217.7744604558784 208,192 C 235.47874820145682,166.2255395441216 272.97840675158915,175.30297445306908 299,197 C 325.02159324841085,218.69702554693092 339.56512119510046,253.01364173184533 359,266 C 378.43487880489954,278.9863582681547 402.7611084680091,270.64245861954936 425,265 C 447.2388915319909,259.35754138045064 467.39044493286303,256.41652378995707 495,226 C 522.609555067137,195.58347621004293 557.6771118005391,137.69144622062237 587,127 C 616.3228881994609,116.30855377937762 639.9011078649805,152.81769132755343 659,152 C 678.0988921350195,151.18230867244657 692.7184567395385,113.0377884691639 717,130 C 741.2815432604615,146.9622115308361 775.2250651768657,219.0311547957911 800,247 C 824.7749348231343,274.9688452042089 840.3812825529992,258.83759234767183 859,247 C 877.6187174470008,235.16240765232817 899.2498046111378,227.61847581352174 925,231 C 950.7501953888622,234.38152418647826 980.6194990024499,248.68850439824118 1004,247 C 1027.3805009975501,245.31149560175882 1044.2721993790624,227.6275065935135 1072,230 C 1099.7278006209376,232.3724934064865 1138.291703481301,254.80146922770496 1162,270 C 1185.708296518699,285.19853077229504 1194.5609866957338,293.16661649566674 1217,263 C 1239.4390133042662,232.83338350433328 1275.464349735764,164.53206478962818 1300,156 C 1324.535650264236,147.46793521037182 1337.58161436121,198.7051243458205 1359,216 C 1380.41838563879,233.2948756541795 1410.209192819395,216.64743782708973 1440,200 C 1440,200 1440,400 1440,400 Z");
    }
    25%{
    d: path("M 0,400 C 0,400 0,200 0,200 C 27.729464739713343,213.3098955652059 55.458929479426686,226.61979113041178 80,245 C 104.54107052057331,263.3802088695882 125.89374682200659,286.8307310435586 151,274 C 176.1062531779934,261.1692689564414 204.96608323254702,212.05728469535384 227,179 C 249.03391676745298,145.94271530464616 264.24192024780535,128.94013017502607 289,132 C 313.75807975219465,135.05986982497393 348.0662357762315,158.18219460454188 372,188 C 395.9337642237685,217.81780539545812 409.49313664726884,254.33109140680637 433,267 C 456.50686335273116,279.66890859319363 489.96121763469307,268.4934397682328 513,246 C 536.0387823653069,223.5065602317672 548.661992813959,189.69514952026236 574,197 C 599.338007186041,204.30485047973764 637.3908111094712,252.72596215071766 660,253 C 682.6091888905288,253.27403784928234 689.7747627481561,205.40100187686699 709,208 C 728.2252372518439,210.59899812313301 759.5101378979042,263.6700303418145 786,273 C 812.4898621020958,282.3299696581855 834.1846856602275,247.91887675587498 861,215 C 887.8153143397725,182.08112324412502 919.7511194611857,150.65446263468556 948,139 C 976.2488805388143,127.34553736531444 1000.8108364950292,135.46327270538274 1020,151 C 1039.1891635049708,166.53672729461726 1053.0055345586968,189.49244654378344 1074,182 C 1094.9944654413032,174.50755345621656 1123.1670252701833,136.5669411194834 1147,144 C 1170.8329747298167,151.4330588805166 1190.3263643605694,204.2397889782828 1216,194 C 1241.6736356394306,183.7602110217172 1273.5275172875392,110.47390296738541 1299,126 C 1324.4724827124608,141.5260970326146 1343.5635664892745,245.86459915217557 1366,273 C 1388.4364335107255,300.1354008478244 1414.2182167553628,250.0677004239122 1440,200 C 1440,200 1440,400 1440,400 Z");
    }
    50%{
    d: path("M 0,400 C 0,400 0,200 0,200 C 17.706350622671415,189.76297351549377 35.41270124534283,179.52594703098754 58,187 C 80.58729875465717,194.47405296901246 108.05554564130014,219.65918539154364 137,210 C 165.94445435869986,200.34081460845636 196.3651161894567,155.83731140283786 222,155 C 247.6348838105433,154.16268859716214 268.4839896008729,196.99156899710488 289,191 C 309.5160103991271,185.00843100289512 329.6989254070515,130.19641260874272 356,145 C 382.3010745929485,159.80358739125728 414.7203087709212,244.2227805679242 438,264 C 461.2796912290788,283.7772194320758 475.41983950926374,238.91246511956052 496,208 C 516.5801604907363,177.08753488043948 543.6003331920242,160.1273589538336 570,169 C 596.3996668079758,177.8726410461664 622.1788277226394,212.578099065105 646,225 C 669.8211722773606,237.421900934895 691.684355917418,227.5602447857464 716,213 C 740.315644082582,198.4397552142536 767.0837486076891,179.18092179190947 793,187 C 818.9162513923109,194.81907820809053 843.9806496518258,229.71606804661576 869,255 C 894.0193503481742,280.28393195338424 918.993652785008,295.9548060216274 946,261 C 973.006347214992,226.04519397837257 1002.0447392081426,140.46470786687453 1020,142 C 1037.9552607918574,143.53529213312547 1044.8273903824222,232.18636251087452 1069,251 C 1093.1726096175778,269.8136374891255 1134.6456992621686,218.78984208962757 1159,194 C 1183.3543007378314,169.21015791037243 1190.5898125689032,170.6542691306153 1216,180 C 1241.4101874310968,189.3457308693847 1284.9950504622184,206.59308138791124 1309,192 C 1333.0049495377816,177.40691861208876 1337.4299855822233,130.97340531773963 1356,127 C 1374.5700144177767,123.02659468226037 1407.2850072088884,161.51329734113017 1440,200 C 1440,200 1440,400 1440,400 Z");
    }
    75%{
    d: path("M 0,400 C 0,400 0,200 0,200 C 28.094221562443686,214.8947011483347 56.18844312488737,229.78940229666938 82,212 C 107.81155687511263,194.21059770333062 131.34044906289418,143.7370919616571 154,138 C 176.65955093710582,132.2629080383429 198.4497606235359,171.26222985670222 219,198 C 239.5502393764641,224.73777014329778 258.8605084429623,239.21398861153403 285,225 C 311.1394915570377,210.78601138846597 344.1082056046147,167.88181569716164 371,175 C 397.8917943953853,182.11818430283836 418.70666913857883,239.2587485998193 439,246 C 459.29333086142117,252.7412514001807 479.06511784106976,209.0831899035611 500,176 C 520.9348821589302,142.9168100964389 543.0328594971418,120.40849178593626 569,127 C 594.9671405028582,133.59150821406374 624.8034441703628,169.2828429526938 648,168 C 671.1965558296372,166.7171570473062 687.7533638214068,128.46013640328846 714,137 C 740.2466361785932,145.53986359671154 776.1831005440099,200.8766114341523 803,213 C 829.8168994559901,225.1233885658477 847.514234002554,194.03341786010247 870,200 C 892.485765997446,205.96658213989753 919.7599634457737,248.98971712543783 942,263 C 964.2400365542263,277.01028287456217 981.4459122143514,262.00771363814624 1004,227 C 1026.5540877856486,191.99228636185376 1054.4563876968207,136.97942832197708 1078,155 C 1101.5436123031793,173.02057167802292 1120.7285369983658,264.0745730739454 1142,272 C 1163.2714630016342,279.9254269260546 1186.6294643097165,204.72227938224142 1216,192 C 1245.3705356902835,179.27772061775858 1280.7536057627688,229.03630939708881 1306,232 C 1331.2463942372312,234.96369060291119 1346.356112639209,191.13248302940318 1367,178 C 1387.643887360791,164.86751697059682 1413.8219436803956,182.43375848529843 1440,200 C 1440,200 1440,400 1440,400 Z");
    }
    100%{
    d: path("M 0,400 C 0,400 0,200 0,200 C 29.866201992251654,168.9144023252261 59.73240398450331,137.82880465045218 84,161 C 108.2675960154967,184.17119534954782 126.9365860542384,261.59918372341735 145,270 C 163.0634139457616,278.40081627658265 180.52125179854318,217.7744604558784 208,192 C 235.47874820145682,166.2255395441216 272.97840675158915,175.30297445306908 299,197 C 325.02159324841085,218.69702554693092 339.56512119510046,253.01364173184533 359,266 C 378.43487880489954,278.9863582681547 402.7611084680091,270.64245861954936 425,265 C 447.2388915319909,259.35754138045064 467.39044493286303,256.41652378995707 495,226 C 522.609555067137,195.58347621004293 557.6771118005391,137.69144622062237 587,127 C 616.3228881994609,116.30855377937762 639.9011078649805,152.81769132755343 659,152 C 678.0988921350195,151.18230867244657 692.7184567395385,113.0377884691639 717,130 C 741.2815432604615,146.9622115308361 775.2250651768657,219.0311547957911 800,247 C 824.7749348231343,274.9688452042089 840.3812825529992,258.83759234767183 859,247 C 877.6187174470008,235.16240765232817 899.2498046111378,227.61847581352174 925,231 C 950.7501953888622,234.38152418647826 980.6194990024499,248.68850439824118 1004,247 C 1027.3805009975501,245.31149560175882 1044.2721993790624,227.6275065935135 1072,230 C 1099.7278006209376,232.3724934064865 1138.291703481301,254.80146922770496 1162,270 C 1185.708296518699,285.19853077229504 1194.5609866957338,293.16661649566674 1217,263 C 1239.4390133042662,232.83338350433328 1275.464349735764,164.53206478962818 1300,156 C 1324.535650264236,147.46793521037182 1337.58161436121,198.7051243458205 1359,216 C 1380.41838563879,233.2948756541795 1410.209192819395,216.64743782708973 1440,200 C 1440,200 1440,400 1440,400 Z");
    }
    }</style><defs><linearGradient id="gradient" x1="68%" y1="3%" x2="32%" y2="97%"><stop offset="5%" stop-color="#981b1bff"></stop><stop offset="95%" stop-color="#fa5d5dff"></stop></linearGradient></defs><path d="M 0,400 C 0,400 0,200 0,200 C 29.866201992251654,168.9144023252261 59.73240398450331,137.82880465045218 84,161 C 108.2675960154967,184.17119534954782 126.9365860542384,261.59918372341735 145,270 C 163.0634139457616,278.40081627658265 180.52125179854318,217.7744604558784 208,192 C 235.47874820145682,166.2255395441216 272.97840675158915,175.30297445306908 299,197 C 325.02159324841085,218.69702554693092 339.56512119510046,253.01364173184533 359,266 C 378.43487880489954,278.9863582681547 402.7611084680091,270.64245861954936 425,265 C 447.2388915319909,259.35754138045064 467.39044493286303,256.41652378995707 495,226 C 522.609555067137,195.58347621004293 557.6771118005391,137.69144622062237 587,127 C 616.3228881994609,116.30855377937762 639.9011078649805,152.81769132755343 659,152 C 678.0988921350195,151.18230867244657 692.7184567395385,113.0377884691639 717,130 C 741.2815432604615,146.9622115308361 775.2250651768657,219.0311547957911 800,247 C 824.7749348231343,274.9688452042089 840.3812825529992,258.83759234767183 859,247 C 877.6187174470008,235.16240765232817 899.2498046111378,227.61847581352174 925,231 C 950.7501953888622,234.38152418647826 980.6194990024499,248.68850439824118 1004,247 C 1027.3805009975501,245.31149560175882 1044.2721993790624,227.6275065935135 1072,230 C 1099.7278006209376,232.3724934064865 1138.291703481301,254.80146922770496 1162,270 C 1185.708296518699,285.19853077229504 1194.5609866957338,293.16661649566674 1217,263 C 1239.4390133042662,232.83338350433328 1275.464349735764,164.53206478962818 1300,156 C 1324.535650264236,147.46793521037182 1337.58161436121,198.7051243458205 1359,216 C 1380.41838563879,233.2948756541795 1410.209192819395,216.64743782708973 1440,200 C 1440,200 1440,400 1440,400 Z" stroke="none" stroke-width="0" fill="url(#gradient)" class="transition-all duration-300 ease-in-out delay-150 path-0"></path></svg>
        `;
    } else {
        div.innerHTML = `<svg width="100%" height="100%" id="svg" viewBox="0 0 1440 400" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150"><style>
        .path-0{
        animation:pathAnim-0 4s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
        }
        @keyframes pathAnim-0{
        0%{
        d: path("M 0,400 C 0,400 0,200 0,200 C 23.306299870505185,180.39922334740555 46.61259974101037,160.79844669481113 72,165 C 97.38740025898963,169.20155330518887 124.85590090646369,197.20543656816113 145,204 C 165.1440990935363,210.79456343183887 177.9637966331349,196.37980703254436 204,198 C 230.0362033668651,199.62019296745564 269.2889125609967,217.27533530166144 300,219 C 330.7110874390033,220.72466469833856 352.8805531228782,206.51885176080998 370,219 C 387.1194468771218,231.48114823919002 399.18887494749026,270.6492576550986 421,255 C 442.81112505250974,239.35074234490136 474.36394708716057,168.88411761879547 499,158 C 523.6360529128394,147.11588238120453 541.3553367038678,195.81427186971962 564,226 C 586.6446632961322,256.1857281302804 614.2147060973682,267.85879490232605 640,245 C 665.7852939026318,222.14120509767392 689.7858389066589,164.75054852097597 715,150 C 740.2141610933411,135.24945147902403 766.641938275996,163.13901101377004 788,193 C 809.358061724004,222.86098898622996 825.6464079893568,254.69340742394397 851,236 C 876.3535920106432,217.30659257605603 910.7724297665761,148.08735929045406 936,126 C 961.2275702334239,103.91264070954593 977.2638729443386,128.9571554142397 999,154 C 1020.7361270556614,179.0428445857603 1048.1720784560691,204.08401905258714 1072,205 C 1095.8279215439309,205.91598094741286 1116.047813231385,182.7067683754117 1140,182 C 1163.952186768615,181.2932316245883 1191.6366686183915,203.0889074457659 1221,207 C 1250.3633313816085,210.9110925542341 1281.4055122950485,196.93760184152455 1305,195 C 1328.5944877049515,193.06239815847545 1344.7412822014148,203.16068518813583 1366,206 C 1387.2587177985852,208.83931481186417 1413.6293588992926,204.41965740593207 1440,200 C 1440,200 1440,400 1440,400 Z");
        }
        25%{
        d: path("M 0,400 C 0,400 0,200 0,200 C 27.872258404640142,180.86228775806688 55.744516809280285,161.72457551613374 76,151 C 96.25548319071972,140.27542448386626 108.89419116751901,137.96398569353192 132,146 C 155.105808832481,154.03601430646808 188.67871852064363,172.4194817097385 216,173 C 243.32128147935637,173.5805182902615 264.3909347499064,156.35808746751397 287,151 C 309.6090652500936,145.64191253248603 333.75754247973066,152.14816842020556 356,177 C 378.24245752026934,201.85183157979444 398.57889533117094,245.04923885166383 426,238 C 453.42110466882906,230.95076114833617 487.9268761955856,173.65487617313914 513,183 C 538.0731238044144,192.34512382686086 553.713599886487,268.33125645577957 575,257 C 596.286400113513,245.66874354422046 623.2187242584662,147.02009800374262 645,128 C 666.7812757415338,108.97990199625738 683.4115030796479,169.58835152925005 708,185 C 732.5884969203521,200.41164847074995 765.1352634229422,170.62649587925722 788,181 C 810.8647365770578,191.37350412074278 824.0474432285832,241.9056649537211 850,247 C 875.9525567714168,252.0943350462789 914.6749636627244,211.75084430585846 941,186 C 967.3250363372756,160.24915569414154 981.2527021205194,149.09095782284516 1003,151 C 1024.7472978794806,152.90904217715484 1054.3142278551975,167.88532440276094 1078,192 C 1101.6857721448025,216.11467559723906 1119.4903864586902,249.36774456611099 1145,244 C 1170.5096135413098,238.63225543388901 1203.7242263100418,194.64369733279497 1230,178 C 1256.2757736899582,161.35630266720503 1275.6127083011424,172.05746610270904 1294,179 C 1312.3872916988576,185.94253389729096 1329.824940485388,189.12643825636883 1354,192 C 1378.175059514612,194.87356174363117 1409.0875297573061,197.43678087181559 1440,200 C 1440,200 1440,400 1440,400 Z");
        }
        50%{
        d: path("M 0,400 C 0,400 0,200 0,200 C 16.352007386382006,194.58470821704285 32.70401477276401,189.1694164340857 59,196 C 85.29598522723599,202.8305835659143 121.535948295326,221.90704248070006 150,231 C 178.464051704674,240.09295751929994 199.152192045932,239.202413643114 219,237 C 238.847807954068,234.797586356886 257.855283520946,231.28330294684412 278,228 C 298.144716479054,224.71669705315588 319.42667387028405,221.66437456950953 346,222 C 372.57332612971595,222.33562543049047 404.43802099791765,226.05919877511778 429,201 C 453.56197900208235,175.94080122488222 470.82124213804536,122.09883033001942 493,125 C 515.1787578619546,127.90116966998058 542.2770104499009,187.54547990480458 573,220 C 603.7229895500991,252.45452009519542 638.070716062351,257.7192500507623 661,249 C 683.929283937649,240.28074994923767 695.4401253006952,217.57751989214623 716,197 C 736.5598746993048,176.42248010785377 766.168782734868,157.97067038065273 792,146 C 817.831217265132,134.02932961934727 839.8847437598323,128.53979858524278 867,161 C 894.1152562401677,193.46020141475722 926.2922422258025,263.87013527837627 948,254 C 969.7077577741975,244.12986472162373 980.9462873369575,153.97966030125224 1005,127 C 1029.0537126630425,100.02033969874778 1065.9226084263667,136.21122351661487 1092,171 C 1118.0773915736333,205.78877648338513 1133.3632789575756,239.17544563228827 1152,239 C 1170.6367210424244,238.82455436771173 1192.6242757433301,205.086993954232 1219,190 C 1245.3757242566699,174.913006045768 1276.1396180691036,178.4765785507837 1302,196 C 1327.8603819308964,213.5234214492163 1348.817251980256,245.00669184263322 1371,248 C 1393.182748019744,250.99330815736678 1416.591374009872,225.49665407868338 1440,200 C 1440,200 1440,400 1440,400 Z");
        }
        75%{
        d: path("M 0,400 C 0,400 0,200 0,200 C 29.386244541573646,228.04182795309524 58.77248908314729,256.0836559061905 78,244 C 97.22751091685271,231.91634409380953 106.29628820898449,179.70720432833338 130,155 C 153.7037117910155,130.29279567166662 192.0423580809147,133.08752678047594 217,129 C 241.9576419190853,124.91247321952406 253.53427946735667,113.9426885497628 278,126 C 302.46572053264333,138.0573114502372 339.8205240496586,173.14171902047283 368,202 C 396.1794759503414,230.85828097952717 415.183624334009,253.49043536834589 434,246 C 452.816375665991,238.50956463165411 471.44497861430557,200.89653950614354 496,179 C 520.5550213856944,157.10346049385646 551.0364612087689,150.9234066070799 580,164 C 608.9635387912311,177.0765933929201 636.4091765506191,209.4098340655369 660,218 C 683.5908234493809,226.5901659344631 703.3268325887547,211.4372571307727 723,221 C 742.6731674112453,230.5627428692273 762.2834930943624,264.8411374113724 788,258 C 813.7165069056376,251.1588625886276 845.5391950337962,203.19819322373775 873,210 C 900.4608049662038,216.80180677626225 923.5597267704522,278.3660896936767 943,263 C 962.4402732295478,247.6339103063233 978.2218978843947,155.3374480015555 1001,153 C 1023.7781021156053,150.6625519984445 1053.5526816919682,238.28411830010134 1080,272 C 1106.4473183080318,305.71588169989866 1129.567375347732,285.5260787980392 1156,270 C 1182.432624652268,254.47392120196085 1212.1778169171027,243.6115665077421 1236,236 C 1259.8221830828973,228.3884334922579 1277.7213569838568,224.02765517099252 1300,227 C 1322.2786430161432,229.97234482900748 1348.9367551474693,240.27781280828785 1373,237 C 1397.0632448525307,233.72218719171215 1418.5316224262654,216.86109359585606 1440,200 C 1440,200 1440,400 1440,400 Z");
        }
        100%{
        d: path("M 0,400 C 0,400 0,200 0,200 C 23.306299870505185,180.39922334740555 46.61259974101037,160.79844669481113 72,165 C 97.38740025898963,169.20155330518887 124.85590090646369,197.20543656816113 145,204 C 165.1440990935363,210.79456343183887 177.9637966331349,196.37980703254436 204,198 C 230.0362033668651,199.62019296745564 269.2889125609967,217.27533530166144 300,219 C 330.7110874390033,220.72466469833856 352.8805531228782,206.51885176080998 370,219 C 387.1194468771218,231.48114823919002 399.18887494749026,270.6492576550986 421,255 C 442.81112505250974,239.35074234490136 474.36394708716057,168.88411761879547 499,158 C 523.6360529128394,147.11588238120453 541.3553367038678,195.81427186971962 564,226 C 586.6446632961322,256.1857281302804 614.2147060973682,267.85879490232605 640,245 C 665.7852939026318,222.14120509767392 689.7858389066589,164.75054852097597 715,150 C 740.2141610933411,135.24945147902403 766.641938275996,163.13901101377004 788,193 C 809.358061724004,222.86098898622996 825.6464079893568,254.69340742394397 851,236 C 876.3535920106432,217.30659257605603 910.7724297665761,148.08735929045406 936,126 C 961.2275702334239,103.91264070954593 977.2638729443386,128.9571554142397 999,154 C 1020.7361270556614,179.0428445857603 1048.1720784560691,204.08401905258714 1072,205 C 1095.8279215439309,205.91598094741286 1116.047813231385,182.7067683754117 1140,182 C 1163.952186768615,181.2932316245883 1191.6366686183915,203.0889074457659 1221,207 C 1250.3633313816085,210.9110925542341 1281.4055122950485,196.93760184152455 1305,195 C 1328.5944877049515,193.06239815847545 1344.7412822014148,203.16068518813583 1366,206 C 1387.2587177985852,208.83931481186417 1413.6293588992926,204.41965740593207 1440,200 C 1440,200 1440,400 1440,400 Z");
        }
        }</style><path d="M 0,400 C 0,400 0,200 0,200 C 23.306299870505185,180.39922334740555 46.61259974101037,160.79844669481113 72,165 C 97.38740025898963,169.20155330518887 124.85590090646369,197.20543656816113 145,204 C 165.1440990935363,210.79456343183887 177.9637966331349,196.37980703254436 204,198 C 230.0362033668651,199.62019296745564 269.2889125609967,217.27533530166144 300,219 C 330.7110874390033,220.72466469833856 352.8805531228782,206.51885176080998 370,219 C 387.1194468771218,231.48114823919002 399.18887494749026,270.6492576550986 421,255 C 442.81112505250974,239.35074234490136 474.36394708716057,168.88411761879547 499,158 C 523.6360529128394,147.11588238120453 541.3553367038678,195.81427186971962 564,226 C 586.6446632961322,256.1857281302804 614.2147060973682,267.85879490232605 640,245 C 665.7852939026318,222.14120509767392 689.7858389066589,164.75054852097597 715,150 C 740.2141610933411,135.24945147902403 766.641938275996,163.13901101377004 788,193 C 809.358061724004,222.86098898622996 825.6464079893568,254.69340742394397 851,236 C 876.3535920106432,217.30659257605603 910.7724297665761,148.08735929045406 936,126 C 961.2275702334239,103.91264070954593 977.2638729443386,128.9571554142397 999,154 C 1020.7361270556614,179.0428445857603 1048.1720784560691,204.08401905258714 1072,205 C 1095.8279215439309,205.91598094741286 1116.047813231385,182.7067683754117 1140,182 C 1163.952186768615,181.2932316245883 1191.6366686183915,203.0889074457659 1221,207 C 1250.3633313816085,210.9110925542341 1281.4055122950485,196.93760184152455 1305,195 C 1328.5944877049515,193.06239815847545 1344.7412822014148,203.16068518813583 1366,206 C 1387.2587177985852,208.83931481186417 1413.6293588992926,204.41965740593207 1440,200 C 1440,200 1440,400 1440,400 Z" stroke="none" stroke-width="0" fill="#ffffffff" class="transition-all duration-300 ease-in-out delay-150 path-0"></path></svg>
        `;
    }

    window.speechSynthesis.speak(speech);
    speech.onend = function (event) {
        div.innerHTML = `<a id="a_link" href="#"><i class="fas fa-play"></i></a><span id="span">` + test + `</span>`;
    };
}
/** 
 * cette fonction nous permet de modifier la partie de chatbot (design) 
 */
function updateChatText(chatbox) {
    var html = "";
    messages
        .slice()
        .reverse()
        .forEach(function (item, index) {


            switch (item.name) {
                case "langue":
                    html +=
                        `<div class="messages__item messages__item--visitor" onClick="modifyLanguage('anglais')">` +
                        "anglais" +
                        `</div>` +
                        `<div class="messages__item messages__item--visitor"  onClick="modifyLanguage('français')">` +
                        "français" +
                        `</div>` +
                        `<div class="messages__item messages__item--visitor" onClick="modifyLanguage('arabe')">` +
                        "arabe" +
                        `</div>` +
                        `<div class="messages__item messages__item--visitor" onClick="readOutLoud('` +
                        item.message +
                        `','lang-chose','chat')" id="lang-chose"><a id="a_link" href="#"><i class="fas fa-play"></i></a><span id="span">Lire</span></div>`;
                    html += `  <p  id="a_visitor"> Bot ` + heure + `:` + minute + `  </p>`
                    break;
                case "welcome_Sam":
                    html += `<div class="messages__item messages__item--visitor" onClick="readOutLoud('` + item.message + `','chat-1','chat')" id="chat-1"><a id="a_link" href="#"><i class="fas fa-play"></i></a><span id="span">` + test + `</span></div>`;
                    html += `  <p  id="a_visitor"> Bot ` + heure + `:` + minute + `  </p>`
                    break;
                case "Sam":
                    html += `<div class="messages__item messages__item--visitor" onClick="readOutLoud('` + item.message + `','chat-` + chatRepId + `','chat')" id="chat-` + chatRepId + `"><a id="a_link" href="#"><i class="fas fa-play"></i></a><span id="span">` + test + `</span></div>`;
                    html += `  <p  id="a_visitor"> Bot ` + heure + `:` + minute + `  </p>`
                    break;
                case "User":
                    html += `  <p  id="a_operator"> Moi ` + heure + `:` + minute + ` ✓ </p>`
                    html += `<div class="messages__item messages__item--operator" onClick="readOutLoud('` + item.message + `','speech-` + id + `','user')" id="speech-` + id + `"><a id="a_link" href="#"><i class="fas fa-play"></i></a><span id="span">` + test + `</span></div>`;
                    id++;
                    break;
                // case "Nom":
                // html += `<div class="messages__item messages__item--visitor" onClick="readOutLoud('` + item.message + `','chat-` + chatRepId + `','chat')" id="chat-` + chatRepId + `"><a id="a_link" href="#"><i class="fas fa-play"></i></a><span id="span">`+test+`</span></div>`;
                // html += `  <p  id="a_visitor"> Bot ` +heure+`:`+minute+ `  </p>`
                // break;
            }
        });
    const chatmessage = chatbox.querySelector(".chatbox__messages");
    chatmessage.innerHTML = html;
}
