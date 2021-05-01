/* wasap dinamico */

popupWhatsApp = () => {
  
  let btnClosePopup = document.querySelector('.closePopup');
  let btnOpenPopup = document.querySelector('.whatsapp-button');
  let popup = document.querySelector('.popup-whatsapp');
  let sendBtn = document.getElementById('send-btn');

  btnClosePopup.addEventListener("click",  () => {
    popup.classList.toggle('is-active-whatsapp-popup')
  })
  
  btnOpenPopup.addEventListener("click",  () => {
    popup.classList.toggle('is-active-whatsapp-popup')
     popup.style.animation = "fadeIn .6s 0.0s both";
  })
  
  sendBtn.addEventListener("click", () => {
  let msg = document.getElementById('whats-in').value;
  let relmsg = msg.replace(/ /g,"%20");
     
   window.open('https://wa.me/51985594877?text='+relmsg, '_blank'); 
  
  });

  setTimeout(() => {
    popup.classList.toggle('is-active-whatsapp-popup');
  }, 3000);
}

popupWhatsApp();


/* contador */

let cont1=document.getElementById('cont1'),
cont2=document.getElementById('cont2'),
cont3=document.getElementById('cont3')
let cant1=0,cant2=0,cant3=0,
tiem1=0,tiem2=20,tiem3=90

let tiempo1 = setInterval(() => {
  cont1.textContent=cant1+=1
  if(cant1===1787){
    clearInterval(tiempo1)
  }
}, `${tiem1}`);
let tiempo2 = setInterval(() => {
  cont2.textContent=cant2+=1
  if(cant2===190){
    clearInterval(tiempo2)
  }
}, `${tiem2}`)
let tiempo3 = setInterval(() => {
  cont3.textContent=cant3+=1
  if(cant3===53){
    clearInterval(tiempo3)
  }
}, `${tiem3}`);
