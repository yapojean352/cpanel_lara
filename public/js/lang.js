// const { find } = require("lodash");

window.addEventListener("load", function () {
    //animate crroussel
    // console.log("");
//    let langF = document.querySelector('.fr');
 // let langA = document.querySelector('.te');
//   langA.addEventListener("mouseover", function (evt) {
//     //  evt.preventDefault();
//    console.log(  langA.innerHTML);  
    
     
       
//        });
 

  
   //langF.classList.add('langCacher');
   
 document.querySelectorAll('.langTr').forEach(function(element) {
  
       element.addEventListener("mouseover", function (evt) {
        evt.preventDefault();
          //  console.log(window.location.pathname)
      if(evt.target.nodeName=="LI" ){
       
        // var app = @json($photo);
        // console.log(app);
    
       
            //  evt.target.classList.add('langCacher');
            //   if(evt.target.previousElementSibling){
            //     evt.target.previousElementSibling.classList.remove('langCacher');
            //   }
            //  if(evt.target.nextElementSibling){
            //     evt.target.nextElementSibling.classList.remove('langCacher');
            //  }
           
               
            
        }

        //    if( evt.target.innerHTML=="EN" ){
        //     console.log(evt.target.nodeName);
        //       console.log(evt.target.innerHTML);
        //       console.log("anglais")
        //  }
          
         });
          
    });
     /////////fonction partage facebook/////////////
  
});
