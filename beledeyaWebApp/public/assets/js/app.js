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
            genPDF() ;

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
                    VoiceBot("Complaint request registered. Please upload your waiver", chatBox);
                    NumRec = "";
                    break;
                case "français":
                    VoiceBot("Demande de réclamation enregistré. Merci de télécharger votre décharge", chatBox);
                    NumRec = "";
                    break;
                case "arabe":
                    VoiceBot("تم تسجيل طلب الشكوى. يرجى تحميل الملخص الخاص بك", chatBox);
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
function suiviRecVoiceBot(num_rec) {
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
                    VoiceBot("Complaint request registered. Please upload your waiver", chatBox);
                    NumRec = "";
                    break;
                case "français":
                    console.log("data ",response);
                    console.log("data2 ",response.data);
                    VoiceBot("la status de votre réclamation est" + response.data, chatBox);
                    NumRec = "";
                    break;
                case "arabe":
                    VoiceBot("تم تسجيل طلب الشكوى. يرجى تحميل الملخص الخاص بك", chatBox);
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
function genPDF() {
	
	var doc = new jsPDF();
	
	doc.text(20,20,'TEST Message!!');
	doc.addPage();
	doc.text(20,20,'TEST Page 2!');
	doc.save('Test.pdf');
	
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
        if ((textField == "suivi réclamation")) {
           
           
                switch (language) {
                    case "anglais":
                        VoiceBot("Hello! please send me your last name", chatbox);
                        textField = "";
                        v = 8;
                        break;
                    case "français":
                        VoiceBot("Salut envoyez moi le numéro de réclamation que vous voullez suivre", chatbox);
                        textField = "";
                        v = 8;
                        break;
                    case "arabe":
                        VoiceBot("مرحبا في فضاء الشكايات من فضلك ارسل لي اسم العائلة", chatbox);
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
                                recognition.lang = "fr-FR";
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
                                VoiceBot("@ البريد الإلكتروني غير صالح حاول مرة أخرى", chatbox);
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
                    switch (getNumLet(textField)) {
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
                console.log("je suis la");
                var num_rec = textField.replaceAll(' ','');
                console.log("nummm", num_rec);
                if (num_rec.length == 8) {
                    suiviRecVoiceBot(num_rec);
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
