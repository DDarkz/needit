// valide un code postal canadien
// input: code postal
// output: vrai ou faux
function CodePostalValide() {
    entry=document.getElementById('codepostal').value;
    strlen=entry.length;
    if(strlen!==6) {
      return false;
    }
  // au cas où il a été entré en minuscules
  entry=entry.toUpperCase();
  // valeurs permises
  s1='ABCEGHJKLMNPRSTVXY';
  s2=s1+'WZ';
  d3='0123456789';
  
  // compare, une par une, les valeurs entrées à celles permises
  if(s1.indexOf(entry.charAt(0))<0){
    return false;
    }
  if(d3.indexOf(entry.charAt(1))<0){
    return false;
    }
  if(s2.indexOf(entry.charAt(2))<0){
    return false;
    }
  if(d3.indexOf(entry.charAt(3))<0){
    return false;
    }
  if(s2.indexOf(entry.charAt(4))<0){
    return false;
    }
  if(d3.indexOf(entry.charAt(5))<0){
    return false;
    }
  
  // le code postal est valide !
  return true;
  }
  function validation(){
    var resultat = CodePostalValide();
    if(resultat== false){
      document.getElementById('message').style.display ='block';
      return false;
    }else{
      document.getElementById('message').style.display ='none';
    }
  }
