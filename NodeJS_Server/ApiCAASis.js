
 
var express = require('express'); 
 
// Here we define server parameters.
var hostname = 'localhost'; 
var port = 8000; 
 
var app = express(); 
 
 
 
//Afin de faciliter le routage (les URL que nous souhaitons prendre en charge dans notre API), nous créons un objet Router.
//C'est à partir de cet objet myRouter, que nous allons implémenter les méthodes. 
var myRouter = express.Router(); 
 
// Je vous rappelle notre route (/piscines).  
myRouter.route('/user')
// J'implémente les méthodes GET, PUT, UPDATE et DELETE
// GET
.get(function(req,res){ 
	  res.json({message : "Liste tous les utilisateurs", methode : req.method});
})
//POST
.post(function(req,res){
      res.json({message : "Ajoute un nouvel utilisateur", methode : req.method});
})
//PUT
.put(function(req,res){ 
      res.json({message : "Mise à jour des informations d'un utilisateur", methode : req.method});
})
//DELETE
.delete(function(req,res){ 
res.json({message : "Suppression d'un utilisateur", methode : req.method});  
}); 

myRouter.route('/user/:user_id')
.get(function(req,res){ 
	  res.json({message : "Vous souhaitez accéder aux informations de l'utilisateur n°" + req.params.user_id});
})
.put(function(req,res){ 
	  res.json({message : "Vous souhaitez modifier les informations de l'utilisateur n°" + req.params.user_id});
})
.delete(function(req,res){ 
	  res.json({message : "Vous souhaitez supprimer  l'utilisateur n°" + req.params.user_id});
});

 
// Nous demandons à l'application d'utiliser notre routeur
app.use(myRouter);  
// server boot 
app.listen(port, hostname, function(){
	console.log("Mon serveur fonctionne sur http://"+ hostname +":"+port+"\n"); 
});