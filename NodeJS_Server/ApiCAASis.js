var express = require('express'); 
var app = express(); 
// Here we define server parameters.
var hostname = 'localhost'; 
var port = 8000; 

var mysql = require('mysql');
 
console.log('Get connection ...');
 
//Database connection
var conn = mysql.createConnection({
    database: 'caasis_national_db',
    host: "10.162.129.12",
    user: "admin",
    password: "admin"
  });
   
  conn.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
  });
 
var bodyParser = require("body-parser"); 
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
 
//Afin de faciliter le routage (les URL que nous souhaitons prendre en charge dans notre API), nous créons un objet Router.
//C'est à partir de cet objet myRouter, que nous allons implémenter les méthodes. 
var myRouter = express.Router(); 
 
// Je vous rappelle notre route (/piscines).  
myRouter.route('/member')
// J'implémente les méthodes GET, PUT, UPDATE et DELETE
// GET
.get(function(req,res,next){ 
    conn.query("SELECT * from member", function (error, results, fields) {
		if (error) throw error;
		res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
	});
})
//POST
.post(function(req,res){
      res.json({message : "Ajoute un nouvel utilisateur",
        methode : req.method,
        user_name :req.body.user_name,
        user_firstname:req.body.user_firstname,
        user_email:req.body.user_email,
        user_password:req.body.user_password,
        methode : req.method,
    });
})
//PUT
.put(function(req,res){ 
      res.json({message : "Mise à jour des informations d'un utilisateur", methode : req.method});
})
//DELETE
.delete(function(req,res){ 
res.json({message : "Suppression d'un utilisateur", methode : req.method});  
}); 

myRouter.route('/:table/:condition/:id')

.get(function(req,res,next){ 
    
    var parameters=[req.params.table,req.params.condition,req.params.id];
    request=conn.format("Select * from ?? where ?? = ?",parameters);
    console.log(request);
    conn.query(request, function (error, results, fields) {
		if (error) throw error;
		res.send(JSON.stringify({"status": 200, "error": null, "response": results}));
	});
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