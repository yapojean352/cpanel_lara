// /**
//  * @file Script contenant les fonctions de base
//  * @author yapo jean rene (jmartel@cmaisonneuve.qc.ca)
//  * @version 0.1
//  * @update 2020-10-28
//  * @license Creative pas libre de droit
//  *
//  */


//=========AIzaSyDu12ZiIaMfpm7Wnv4X5ymzTPsqdD5-wwc============ //Test commit
// This sample uses the Autocomplete widget to help the user select a
// place, then it retrieves the address components associated with that
// place, and then it populates the form fields with those details.
// This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
//AIzaSyA1angrr2-xG4i2f7S3PzndKA7CmBqQU5I

// //Permet de definir la BaseUrl
// //const BaseURL = "http://vino.ca/";


//Permet de load la page
window.addEventListener("load", function () {
    var marquesVelos = {
        'CINELLI': ["King Zydecco", "Columbus", "Gazzetta", "Hobootleg", "Superstar Disc",
            "Vigorelli", "Gravel cinelli", " Della strada", " Tutto Plus", " VelTrix"
        ],
        'AVP': ["Sans Pedal", "K12", "K16", "K20", "KS 20", "H20", "M 24", "MS24",
            "H24", "M26", "HC 200", "E.Low-step", "HE-1000", "Low-step"
        ]
    };
    var eMarque = document.querySelector(".marque");
    var eModele = document.querySelector(".modele");
    console.log(eMarque);
    console.log(eModele);
    if (eModele) {
        if (eModele.value !== "") {

            /* suppression des options de marquesVelos
               avant d'insérer les options des marquesVelos du marque sélectionné
               ==========================================================
            */
            var optionModele = eModele.children;
            var i;
            while (optionModele.length > 1) {
                i = optionModele.length - 1;
                eModele.removeChild(optionModele[i]);
            }
            /* insertion des options des marquesVelos du marque sélectionné
               ====================================================
            */
            //recuperer la  valeur du champs selectionne
           
            var marque = eMarque.value;
            var eOptionM, Marques, eTexteMarques;
            for (i = 0; i < marquesVelos[marque].length; i++) {
                eOptionM = document.createElement("option");
                Marques = marquesVelos[marque][i];
                eOptionM.value = Marques.toLowerCase();
                eTexteMarques = document.createTextNode(Marques);
                eOptionM.appendChild(eTexteMarques);
                eModele.appendChild(eOptionM);
            }
            eModele.classList.remove("cache");

        } else {
            eModele.classList.add("cache");
        }
        eMarque.addEventListener('change', function () {
            if (eMarque.value !== "") {

                /* suppression des options de marquesVelos
                   avant d'insérer les options des marquesVelos du marque sélectionné
                   ==========================================================
                */
                var optionModele = eModele.children;
                var i;
                while (optionModele.length > 1) {
                    i = optionModele.length - 1;
                    eModele.removeChild(optionModele[i]);
                }
                /* insertion des options des marquesVelos du marque sélectionné
                   ====================================================
                */
                //recuperer la  valeur du champs selectionne
                var marque = eMarque.value;
                var eOptionM, Marques, eTexteMarques;
                for (i = 0; i < marquesVelos[marque].length; i++) {
                    eOptionM = document.createElement("option");
                    Marques = marquesVelos[marque][i];
                    eOptionM.value = Marques.toLowerCase();
                    eTexteMarques = document.createTextNode(Marques);
                    eOptionM.appendChild(eTexteMarques);
                    eModele.appendChild(eOptionM);
                }
                eModele.classList.remove("cache");

            } else {
                eModele.classList.add("cache");
            }
        });
    }
    var myImage = new Image(200, 200);
    myImage.src = 'picture.png';


    window.URL = window.webkitURL || window.URL;

    var contentType = 'image/png';

    var pngFile = new Blob([myImage], {
        type: contentType
    });

    // var a = document.createElement('a');
    // a.download = 'my.png';
    // a.href = window.URL.createObjectURL(pngFile);
    // a.textContent = 'Download PNG';

    // a.dataset.downloadurl = [contentType, a.download, a.href].join(':');

    // document.body.appendChild(a);



});
