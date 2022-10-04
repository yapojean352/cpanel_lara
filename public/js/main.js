/**
 * @file Script contenant les fonctions de base
 * @author yapo jean rene (jmartel@cmaisonneuve.qc.ca)
 * @version 0.1
 * @update 2020-10-28
 * @license Creative pas libre de droit
 *
 */

//Test commit
//Permet de definir la BaseUrl
//const BaseURL = "http://vino.ca/";

//Permet de load la page
window.addEventListener("load", function () {
    var provinces = {
        'canada': ["Quebec", "ONTARIO", "Alberta", "Colombie-Britannique", "Île-du-Prince-Édouard",
            "Manitoba", "Nouveau-Brunswick", " Nouvelle-Écosse", " Nunavut", " Ontario"
        ],
        'usa': ["New-york", "Alabama", "Rouen", "Lille", "Iowa", "Indiana", "Kansas", "Kentucky"]
    };
    var villes = {
        'quebec': ["Montréal", "Gatineau", "Québec"],
        'ontario': ["Algoma", "Haliburton", "Toronto", "Northumberland"]
    }
    //===========XXXXXXXXXXXXXX VARIABLES  XXXX====================
    console.log("main charger");
    var eChampPays = document.querySelector(".pays");
    var eChampprovince = document.querySelector(".province");
    let inputChoix = document.querySelectorAll("[name='choix']");
    let eChampCacher = document.getElementById("close");
    var champVille = document.querySelector(".ville"); 
    ///////////////////////===========
    // afficher le nom des images apres luplaod ---==
    let images = document.getElementById("images");
    let imageId = document.getElementById("image");
    let vueCadre = document.getElementById("imageVue");
    let imageVue = document.querySelector(".imageCharger");
    let imageDefault = document.querySelector(".imageDefault");
    let ulListe = document.querySelector(".listImage");
    let index;
    let televerser = document.querySelector(".televerser");
    let tabImage = document.querySelectorAll(".imageResult");
    //tableau d image
    //televerser
    var filesC = [];
    let imagesli = document.getElementById("image");
    let taimage = [];
    let lIListe;
    let files;
    var dt = new DataTransfer();
    if (imageId) {
        imageId.addEventListener('change', function (evt) {
            files = this.files;
            for (let i = 0; i < files.length; i++) {
                dt.items.add(files[i])
                let li = document.createElement("li");
                let btn = document.createElement("button");
                btn.innerHTML = "X";

                li.setAttribute('class', 'liImage');
                li.innerText = files[i].name;
                li.appendChild(btn);
                ulListe.appendChild(li);
                lIListe = document.querySelectorAll(".liImage");
                //chargement de la table img
                lIListe.forEach(function (item, index) {
                    taimage[index] = item.innerText;
                });
                 //  televerser.click();00000000000
                 imagesli.files = new removeFileFromFileList();

                 function removeFileFromFileList() {
                     var {
                         files
                     } = imagesli;
                     for (let j = 0; j < taimage.length; j++) {
                         for (let i = 0; i < files.length; i++) {
                             var file = files[i];
                             if (taimage[j] != "undefined") {
                                 if (taimage[j] === file.name || taimage[j] == images.files[j]) {
                                     // dt.items.add(file)
                                 } // here you exclude the file. thus removing it.
                                 // imagesli.files = dt.files;
                             }
     
                         }
     
                     }
                     return dt.files
                 }
                
                 //=========tampon======================
                 images.files = new tampon();
                 console.log(images.files);
                 function tampon() {
                     var temp = new DataTransfer();
                    
                     for (let y = 0; y < taimage.length; y++) {
                         window.URL = window.webkitURL || window.URL;
                         var myImage = new Image(200, 200);
                         //  myImage.src = taimage[y];
                         var extension = taimage[y].split('.').pop();
                         temp.items.add(new File([myImage], taimage[y], {
                             type: "image." + extension,
                             size: new Uint16Array([File.size]),
                             lastModified: new Date().getTime()
                         }));
                     }
                     return temp.files;
     
                 }
     
                 //00000000000000000000000000000000
                lIListe.forEach(function (eltli) {
                    eltli.lastChild.addEventListener("mousedown", function () {
                        this.parentNode.remove();
                       // this.parentNode.innerText;
                        index = taimage.indexOf(this.parentNode.innerText);

                        if (index > -1) {
                            taimage.splice(index, 1);
                        }
                        dt.items.remove(index);
                      //  televerser.click();00000000000
                      imagesli.files = new removeFileFromFileList();

                      function removeFileFromFileList() {
                          var {
                              files
                          } = imagesli;
                          for (let j = 0; j < taimage.length; j++) {
                              for (let i = 0; i < files.length; i++) {
                                  var file = files[i];
                                  if (taimage[j] != "undefined") {
                                      if (taimage[j] === file.name || taimage[j] == images.files[j]) {
                                          // dt.items.add(file)
                                      } // here you exclude the file. thus removing it.
                                      // imagesli.files = dt.files;
                                  }
          
                              }
          
                          }
                          return dt.files
                      }
                     
                      //=========tampon======================
                      images.files = new tampon();
                      console.log(images.files);
                      function tampon() {
                          var temp = new DataTransfer();
                         
                          for (let y = 0; y < taimage.length; y++) {
                              window.URL = window.webkitURL || window.URL;
                              var myImage = new Image(200, 200);
                              //  myImage.src = taimage[y];
                              var extension = taimage[y].split('.').pop();
                              temp.items.add(new File([myImage], taimage[y], {
                                  type: "image." + extension,
                                  size: new Uint16Array([File.size]),
                                  lastModified: new Date().getTime()
                              }));
                          }
                          return temp.files;
          
                      }
          
                      //00000000000000000000000000000000
                    }, true);
                });
                //si le fichier existe
                if (files[i]) {
                    let reader = new FileReader();
                    // imageDefault.style.display="none";à
                    if (imageVue) {
                        imageVue.style.display = "block";
                    }
                    //chargement
                    reader.addEventListener("load", function () {
                        var oImg = document.createElement("img");
                        oImg.setAttribute('height', '100px');
                        oImg.setAttribute('width', '100px');
                        oImg.setAttribute('src', this.result);
                        oImg.setAttribute('class', 'imageResult');
                        li.appendChild(oImg);
                        // imageVue.setAttribute('src',this.result);
                    });
                    reader.readAsDataURL(files[i]);
                } else {
                    //si non

                }
            }

        });
    }

    //televerser les images de la liste
    if (televerser) {
        televerser.addEventListener("mouseup", function () {
            //creer le file type
            //  function FileListItems (tab) { 
            //   var b = new ClipboardEvent("").clipboardData || new DataTransfer();
            //       for (var i = 0; i < tab.length; i++) {
            //     var extension = tab[i].split('.').pop(); 
            //     b.items.add(new File([tab[i]], tab[i] , {
            //       type: "image."+extension,
            //       size:new Uint16Array([File.size]),
            //       lastModified: new Date().getTime()
            //     }));
            //   }
            //   return b.files
            // }
            /////------------------------//////////////
            // taimage.forEach(function (file, key) {
            //     console.log('file', file)
            // })
           // images.files
            imagesli.files = new removeFileFromFileList();

            function removeFileFromFileList() {
                var {
                    files
                } = imagesli;
                for (let j = 0; j < taimage.length; j++) {
                    for (let i = 0; i < files.length; i++) {
                        var file = files[i];
                        if (taimage[j] != "undefined") {
                            if (taimage[j] === file.name || taimage[j] == images.files[j]) {
                                // dt.items.add(file)
                            } // here you exclude the file. thus removing it.
                            // imagesli.files = dt.files;
                        }

                    }

                }
                return dt.files
            }
           
            //=========tampon======================
            images.files = new tampon();
            console.log(images.files);
            function tampon() {
                var temp = new DataTransfer();
               
                for (let y = 0; y < taimage.length; y++) {
                    window.URL = window.webkitURL || window.URL;
                    var myImage = new Image(200, 200);
                    //  myImage.src = taimage[y];
                    var extension = taimage[y].split('.').pop();
                    temp.items.add(new File([myImage], taimage[y], {
                        type: "image." + extension,
                        size: new Uint16Array([File.size]),
                        lastModified: new Date().getTime()
                    }));
                }
                return temp.files;

            }

            ////////============================/////////
            //creer le tableau de file (new file) a remplacer
            // taimage.forEach(function(file, key) {
            //    console.log(file)
            //  filesC[key] =  new File([new Blob], file, {type:'image/jpeg',size:2},)
            // })

            // function blobToFile(theBlob, fileName){     
            //   return new File([theBlob], fileName, { lastModified: new Date().getTime(),  })
            // }
            //Modifier le file en le remplaceant par le nouveau file creer

            //

            ///========================;;;;;;;;;;;;;;;;;;;;;;;

        });
        //fin televerser
    }
    console.log(inputChoix.length);
    inputChoix.forEach(function (element) {
        //auto laod value
        if (element.value == "oui" && element.checked == true) {
            eChampCacher.classList.remove("cache");
            // document.querySelector("[name='adrVol']").value="";
            // document.querySelector("[name='statut']").options[0].value="";
            // document.querySelector("[name='dateVol']").value='';
            // document.querySelector("[name='details']").value='';
        }
        if (element.value == "non" && element.checked == true) {
            console.log('Masquer');
            // console.log(document.querySelector("[name='statut'] option"));
            eChampCacher.classList.add("cache");
            document.querySelector("[name='adrVol']").value = "masquer";
            document.querySelector("[name='statut']").options[0].value = "0";
            document.querySelector("[name='dateVol']").value = "2000-02-28";
            document.querySelector("[name='details']").value = 'masquer';
            document.querySelector("[name='address_address']").value = 'masquer';
            document.querySelector("[name='address_longitude']").value = '000';
            document.querySelector("[name='address_latitude']").value = '000';


        }

        element.addEventListener("change", function (evt) {
            console.log(evt.target.value);
            if (evt.target.value == "oui" && element.checked == true) {
                console.log(evt.target.checked);

                eChampCacher.classList.remove("cache");
                document.querySelector("[name='adrVol']").value = "";
                document.querySelector("[name='statut']").options[0].value = "";
                document.querySelector("[name='dateVol']").value = "";
                document.querySelector("[name='details']").value = '';
                document.querySelector("[name='address_address']").value = '';
                document.querySelector("[name='address_longitude']").value = '';
                document.querySelector("[name='address_latitude']").value = '';

            }
            if (evt.target.value == "non") {
                console.log('Masquer');
                eChampCacher.classList.add("cache");
                // console.log(document.querySelector("[name='statut']").options[0].value="masquer");
                document.querySelector("[name='adrVol']").value = "masquer";
                document.querySelector("[name='statut']").options[0].value = '000';
                document.querySelector("[name='dateVol']").value = "2000-02-28";
                document.querySelector("[name='details']").value = 'masquer';
                document.querySelector("[name='address_address']").value = 'masquer';
                document.querySelector("[name='address_longitude']").value = '000';
                document.querySelector("[name='address_latitude']").value = '000';

            }


        });
        //   if(element.checked==true){
        //     console.log(element.value);
        //   }

    });
    //masquer les infos personnelles
    let eChampCategorie = document.getElementById("idCategory");
    let eChampMasquer = document.getElementById("masquer");
    // console.log(eChampCategorie.value);
    //LOAD=============================
    if (eChampCategorie) {

        if (eChampCategorie.value == "3") {
            //console.log(eChampCategorie.value);
            eChampMasquer.classList.add("cache");
            //TODO mettre les veleur par defaut pour l anonyme


        } else {
           eChampMasquer.classList.remove("cache");

        }
    }
    //FIN LOAD=========================================

    if (eChampCategorie) {
        eChampCategorie.addEventListener('change', function (evt) {
            console.log(eChampCategorie.value);
            //   console.log();

            if (eChampCategorie.value == "3") {

               eChampMasquer.classList.add("cache");
                //TODO mettre les veleur par defaut pour l anonyme
                document.querySelector("[name='nom']").value = "anonyme";
                document.querySelector("[name='pays']").options[0].value = "0";
                if (document.querySelector("[name='province']")) {
                    document.querySelector("[name='province']").options[0].value = "0";
                }
                if (document.querySelector("[name='ville']")) {
                    document.querySelector("[name='ville']").options[0].value = "0";
                }
                document.querySelector("[name='prenoms']").value = "anonyme";
                document.querySelector("[name='dateNaiss']").value = "2000-02-28";
                document.querySelector("[name='addresse']").value = "anonyme";
                document.querySelector("[name='rue']").value = "anonyme";
                document.querySelector("[name='appart']").value = "anonyme";
             //   document.querySelector("[name='province']").value = "anonyme";
             //   document.querySelector("[name='ville']").value = "anonyme";
                document.querySelector("[name='cp']").value = "anonyme";
              //  document.querySelector("[name='pays']").value = "anonyme";
                document.querySelector("[name='Telephone']").value = "anonyme";
                document.querySelector("[name='poste']").value = "anonyme";
            } else {
                 eChampMasquer.classList.remove("cache");
                document.querySelector("[name='pays']").options[0].value = "";
                if (document.querySelector("[name='province']")) {
                    document.querySelector("[name='province']").options[0].value = "";
                }
                if (document.querySelector("[name='ville']")) {
                    document.querySelector("[name='ville']").options[0].value = "";
                }

                document.querySelector("[name='nom']").value = "";
                document.querySelector("[name='nom']").value = "";
                document.querySelector("[name='prenoms']").value = "";
                document.querySelector("[name='dateNaiss']").value = "";
                document.querySelector("[name='addresse']").value = "";
                document.querySelector("[name='rue']").value = "";
                document.querySelector("[name='appart']").value = "";
                document.querySelector("[name='province']").value = "";
                document.querySelector("[name='ville']").value = "";
                document.querySelector("[name='cp']").value = "";
                document.querySelector("[name='pays']").value = "";
                document.querySelector("[name='Telephone']").value = "";
                document.querySelector("[name='poste']").value = "";

            }
        });
        //
    }
    if (eChampPays) {


        eChampPays.addEventListener('change', function () {

            if (eChampPays.value !== "") {

                /* suppression des options de provinces
                   avant d'insérer les options des provinces du pays sélectionné
                   ==========================================================
                */
                var optionsprovince = eChampprovince.children;
                var i;
                while (optionsprovince.length > 1) {
                    i = optionsprovince.length - 1;
                    eChampprovince.removeChild(optionsprovince[i]);
                }
                /* insertion des options des provinces du pays sélectionné
                   ====================================================
                */
                //recuperer la  valeur du champs selectionne
                var pays = eChampPays.value;
                var eOption, province, eTexteprovince;
                for (i = 0; i < provinces[pays].length; i++) {
                    eOption = document.createElement("option");
                    province = provinces[pays][i];
                    eOption.value = province.toLowerCase();
                    eTexteprovince = document.createTextNode(province);
                    eOption.appendChild(eTexteprovince);
                    eChampprovince.appendChild(eOption);
                }
                eChampprovince.classList.remove("cache");

            } else {
                eChampprovince.classList.add("cache");
            }
        });
    }
    //villes
    if (eChampprovince) {
        eChampprovince.addEventListener('change', function () {

            if (eChampprovince.value !== "") {

                /* suppression des options de villes
                   avant d'insérer les options des villes du pays sélectionné
                   ==========================================================
                */

                // solution 1 : utilisation de la propriété children
                // -------------------------------------------------

                var optionsVille = champVille.children;
                var i;
                while (optionsVille.length > 1) {
                    i = optionsVille.length - 1;
                    champVille.removeChild(optionsVille[i]);
                }

                /* insertion des options des villes du pays sélectionné
                   ====================================================
                */
                //recuperer la  valeur du champs selectionne
                var provinc = eChampprovince.value;
                console.log(provinc);
                var eOption, ville, eTexteVille;
                for (i = 0; i < villes[provinc].length; i++) {
                    eOption = document.createElement("option");
                    ville = villes[provinc][i];
                    //mettre les champs en minuscule
                    eOption.value = ville.toLowerCase();
                    eTexteVille = document.createTextNode(ville);
                    eOption.appendChild(eTexteVille);
                    champVille.appendChild(eOption);
                }
                champVille.classList.remove("cache");

            } else {
                champVille.classList.add("cache");
            }
        });
    }


});
