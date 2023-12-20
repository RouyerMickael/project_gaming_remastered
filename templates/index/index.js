

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
    if(pseudoChoosen==true){
      if(game=='seigneur'){
        gameChoosen = true;
        var menu = document.getElementById('menuPrincipal');
        menu.innerHTML = '<a class="buttonPerso" href="/gameSeigneur">Jouer...</a><video autoplay loop controls><source src="assets/videos/intros/seigneur/seigneur_intro1.webm" type="video/webm"></video><a class="buttonPerso" href="/">Retour</a>';
        var audio = document.getElementById('audio');
        audio.pause();
        audio.currentTime = 0;
      } else if(game=='star'){
        gameChoosen = true;
        var menu = document.getElementById('menuPrincipal');
        menu.innerHTML = '<a class="buttonPerso" href="/gameStar">Jouer...</a><video autoplay loop controls><source src="assets/videos/intros/star/star_wars.mp4" type="video/webm"></video><a class="buttonPerso" href="/">Retour</a>';
        var audio = document.getElementById('audio');
        audio.pause();
        audio.currentTime = 0;
      } else if(game=='epitech'){
        var menu = document.getElementById('menuPrincipal');
        var presentator = prompt("Qui voulez-vous en intro ? ('sophie' ou 'directeur')").toLowerCase();
        switch (presentator) {
          case 'sophie':
            gameChoosen = true;
            menu.innerHTML = '<a class="buttonPerso" href="/gameEpitech">Jouer...</a><video autoplay loop controls><source src="assets/videos/intros/epitech/epitech_sophie.mp4" type="video/webm"></video><a class="buttonPerso" href="/">Retour</a>';
            break;
          case 'directeur':
            gameChoosen = true;
            menu.innerHTML = '<a class="buttonPerso" href="/gameEpitech">Jouer...</a><video autoplay loop controls><source src="assets/videos/intros/epitech/epitech_directeur.mp4" type="video/webm"></video><a class="buttonPerso" href="/">Retour</a>';
          break;
          default:
            alert("Cette AER n'existe pas.");
            window.location.reload();
        }
        var audio = document.getElementById('audio');
        audio.pause();
        audio.currentTime = 0;
      } else if(game=='sexe'){
        var menu = document.getElementById('menuPrincipal');
        alert("Confirmes que tu as 18ans!");
        alert("Mytho!");
      }
    } else {
      alert("Vous n'avez pas confirmer la modification de votre pseudo...")
    }
  }



  function refresh() {
    document.location.reload();
  }