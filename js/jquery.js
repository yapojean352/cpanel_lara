"use strict";
document.addEventListener("DOMContentLoaded", ()=> {
   
});
$(function(){
    console.log("jQuery version",jQuery.fn.jquery);
     $(".up span").on("click",function(){
        $(".liImage").each((i, val) => {
            console.log('value li',val);
        });
         $("html,body").animate({
                 scrollTop:0
         },1000);
        
     })
     
//      $(".liImage").on('click',function(){
//         $(".televerser").on('mouseup',function(e){
//   console.log(e);
//         });
//      });
  });

{
 }
