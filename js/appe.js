//B5B8D0B8CD728F8088D5A96978BDA18E0024
//yapojeanrene737@gmail.com
//smtp.elasticemail.com
//2525


//

document.querySelector(".contact-form").addEventListener('submit',submitForm);
function submitForm(e){
    e.preventDefault();
    let message = document.querySelector(".message").value;
    let name = document.querySelector(".name").value;
    let email = document.querySelector(".email").value;
    let msg = document.querySelector(".msg");
//   console.log(message);
//   saveContactInfo(name,email,message);
//   document.querySelector(".contact-form").reset();
//   sendEmail(name,email,message);
msg.innerHTML +="";
Email.send({
    Host : "smtp.elasticemail.com",
    Username : "yapojeanrene737@gmail.com",
    Password : "B5B8D0B8CD728F8088D5A96978BDA18E0024",
    To : 'jeanreneyapo@yahoo.com',
    From : 'yapojeanrene737@gmail.com',
    Subject : `<span>${name}</span>`,
    Body : `<span>${message} <br>
        mon email:<a href='${email}'>${email}</a></span>`
}).then(
  (message) => {
    
      if(message){
          
        msg.innerHTML =
        "<span class='infoMes'>" + '  message envoyé avec succès' + "</span>";
      }

    console.log(msg);
    // msg.innerHTML +=
    // "<strong class='infoMes'>" + 'message envoye avec succes' + "</strong>";
  }
//   if(message){

//   }
 
);
// console.log(Email.send);

// Email.send({
//     SecureToken:' nn',
//     To:'yapojeanrene737@gmail.com',
//     From:'jeanreneyapo@yahoo.com',
//     Subject:'send email',
//     Body:'mon email'

// }
// ).then()

}
function saveContactInfo(name,email,message){
    let newContactInfo=contactInfo.push();
    newContactInfo.set({
        name:name,
        email:email,
        message:message,

    });
    retreiveInfos();

}