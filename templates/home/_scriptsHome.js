
//calcul du Delta entre la vitesse du jeu et la fréquence du moniteur
//source: https://chriscourses.com/blog/standardize-your-javascript-games-framerate-for-different-monitors
let index = 0
let frames = 0
let previousFrame = 0
let newFrame = 0
let delta = 0
let deltaDivisor = 0
let fpsDesired = 60
let fpsIncrements = 0
function animate() {
    window.requestAnimationFrame(animate)
    frames++
}
animate()
setInterval(() => {
    index++
    delta = frames-previousFrame
    deltaDivisor =  delta / fpsDesired
    sessionStorage.setItem("deltaDivisor",deltaDivisor);
    previousFrame = frames
    },
    1000
)


let pseudoChoosen = true;
let gameChoosen = false;
let showButton = document.querySelector('#showPseudo');
let changePseudo = document.querySelector('#changePseudo');
let inputChangePseudo = document.querySelector('#inputChangePseudo');
let buttonChangePseudo = document.querySelector('#buttonChangePseudo');

if(sessionStorage.getItem('user')!="Invité" && sessionStorage.getItem('user')!=null){
  showPseudo.innerHTML = sessionStorage.getItem('user')
} else {
  sessionStorage.setItem('user', 'Invité');
}

showButton.addEventListener('click', event => {
  if(gameChoosen==false){
    showButton.hidden = true
    changePseudo.hidden = false
    pseudoChoosen = false
  } else {
    alert("Vous ne pouvez pas modifier votre pseudo pendant le lancement d'un jeu.")
  }
})

buttonChangePseudo.addEventListener('click', event => {
  if(inputChangePseudo.value.trim()==""){
    alert("Vous devez avoir un pseudo pour jouer")
  } else {
    showPseudo.innerHTML = inputChangePseudo.value.trim()
    showButton.hidden = false
    changePseudo.hidden = true
    pseudoChoosen = true
    sessionStorage.setItem('user', inputChangePseudo.value);
  }
})



function getGame(game) {
    let muted = ""
    var muteAudiosSession = sessionStorage.getItem("muteAudios")
    if(muteAudiosSession==="true"){
      muted = "muted"
    }
    var url = ""
    if(pseudoChoosen==true){
      if(game=='seigneur'){
        gameChoosen = true;
        var menu = document.getElementById('menuPrincipal');
        url = '{{ path("menuSeigneur") }}'; 
        menu.innerHTML = '<a class="buttonPerso" href='+url+'>Jouer...</a><video class="audio" autoplay '+muted+' loop><source src="assets/videos/intros/seigneur/seigneur_intro1.webm" type="video/webm"></video><a class="buttonPerso" href="/">Retour</a>';
        var audio = document.getElementById('audioMusic');
        audio.pause();
        audio.currentTime = 0;
      } else if(game=='star'){
        gameChoosen = true;
        var menu = document.getElementById('menuPrincipal');
        url = '{{ path("starMenu") }}'; 
        menu.innerHTML = '<a class="buttonPerso" href='+url+'>Jouer...</a><video autoplay loop controls><source src="assets/videos/intros/star/star_wars.mp4" type="video/webm"></video><a class="buttonPerso" href="/">Retour</a>';
        var audio = document.getElementById('audioMusic');
        audio.pause();
        audio.currentTime = 0;
      } else if(game=='epitech'){
        var menu = document.getElementById('menuPrincipal');
        var presentator = prompt("Qui voulez-vous en intro ? ('sophie' ou 'directeur')").toLowerCase();
        url = '{{ path("epitechMenu") }}'; 
        switch (presentator) {
          case 'sophie':
            gameChoosen = true;
            menu.innerHTML = '<a class="buttonPerso" href='+url+'>Jouer...</a><video autoplay loop controls><source src="assets/videos/intros/epitech/epitech_sophie.mp4" type="video/webm"></video><a class="buttonPerso" href="/">Retour</a>';
            break;
          case 'directeur':
            gameChoosen = true;
            menu.innerHTML = '<a class="buttonPerso" href='+url+'>Jouer...</a><video autoplay loop controls><source src="assets/videos/intros/epitech/epitech_directeur.mp4" type="video/webm"></video><a class="buttonPerso" href="/">Retour</a>';
          break;
          default:
            alert("Cette AER n'existe pas.");
            window.location.reload();
        }
        var audio = document.getElementById('audioMusic');
        audio.pause();
        audio.currentTime = 0;
      } else if(game=='sexe'){
        var menu = document.getElementById('menuPrincipal');
        alert("Confirmes que tu as 18ans!");
        alert("Mytho !");
      }
    } else {
      alert("Vous n'avez pas confirmer la modification de votre pseudo...")
    }
  }



  function refresh() {
    document.location.reload();
  }