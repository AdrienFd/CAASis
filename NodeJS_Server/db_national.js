var mysql = require("mysql");

//connection creation with the local database
var connNational = mysql.createConnection({
  database: 'caasis_national_db',
  host: "10.162.197.169",
  user: "admin",
  password: "admin"
});

connNational.connect(function (err) {
  if (err) throw err;
  console.log("Connected!");
});

//export connection
module.exports = connNational;