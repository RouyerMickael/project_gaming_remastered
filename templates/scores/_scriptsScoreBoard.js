

if(sessionStorage.getItem('user')!="Invité" && sessionStorage.getItem('user')!=null){
  showPseudo.innerHTML = sessionStorage.getItem('user')
} else {
  sessionStorage.setItem('user', 'Invité');
}


  function refresh() {
    document.location.reload();
  }