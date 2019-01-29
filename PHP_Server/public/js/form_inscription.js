var inscription_email = document.getElementById('email_register');
var inscription_email_error = document.getElementById('email_register_error');
var inscription_psw = document.getElementById('password_register');
var inscription_psw_error = document.getElementById('password_register_error');
var inscription_psw_confirm = document.getElementById('password_confirm');
var inscription_psw_confirm_error = document.getElementById('password_confirm_error');
inscription_email.addEventListener('blur', function() {
   verifMail(inscription_email, inscription_email_error)
});

inscription_psw.addEventListener('blur', function() {
   verifPassword(inscription_psw, inscription_psw_error)
});

inscription_psw_confirm.addEventListener('blur', function() {
   verifSamePassword(inscription_psw_confirm, inscription_psw_confirm_error)
});


/*COLOR CHANGE IF champ AS AN erreur*/
function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}


/*TEST IF THE VALUE OF champ IS AN EMAIL WITH A REGEX*/
function verifMail(champ,error)
{
   var regex = /^[a-zA-Z0-9._-]+@(cesi|viacesi)\.fr$/;
   
  if(!regex.test(champ.value))
   {
      surligne(champ, true);
      error.innerHTML = "<ul> L'email n'est pas une adresse valide :</ul> <li> étudiant.nom@viacesi.fr </li> <li> salarié.nom@cesi.fr </li>";
   }
   else
   {
      surligne(champ, false);
      error.innerHTML = "";
   }
}

 /*TEST IF THE VALUE OF champ IS A VALID PASSWORD WITH A REGEX*/
function verifPassword(champ,error)
{
   var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*]{0,})(?=.{8,})/;
   
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      error.innerHTML = "<ul> Le mot de passe :</ul> <li> doit être constitué d'au moins 8 caractères </li> <li> doit être constitué d'au moins une Majuscule </li> <li> doit être constitué d'au moins une Minuscule </li> <li>doit être constitué d'au moins un Chiffre</li> <li>peut être constitué des caractères spéciaux ! @ # $ % ^ & * </li>";
   }
        
   else
   {
      surligne(champ, false);
      error.innerHTML = "";
   }
}

function verifSamePassword(champ,error){

   if (inscription_psw.value != inscription_psw_confirm.value)
   {
      surligne(champ, true);
      error.innerHTML = "les mots de passes ne correspondent pas"; 

   }
   else
   {
      surligne(champ, false);
     error.innerHTML = "";
   }
}
