var mysql = require("mysql");
var connNational = mysql.createConnection({
    database: 'caasis_national_db',
    host: "10.162.129.12",
    user: "admin",
    password: "admin"
  });
   
  connNational.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
  });

  var connLocal = mysql.createConnection({
    database: 'caasis_local_Arras_db',
    host: "10.162.129.12",
    user: "admin",
    password: "admin"
  });
   
  connLocal.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
  });
 

module.exports = connNational;