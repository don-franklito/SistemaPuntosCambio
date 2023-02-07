var radioState = false;
function test(element){
   if(radioState == false){
      check(element);
      radioState = true;
   }else{
      uncheck(element);
      radioState = false;
   }
}

function check(element){
document.getElementById(element).checked = true;
}

function uncheck(element){
document.getElementById(element).checked = false;
}