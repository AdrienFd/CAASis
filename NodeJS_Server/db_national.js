var mysql = require("mysql");
var connNational = mysql.createConnection({
  database: 'caasis_national_db',
  host: "10.162.187.240",
  user: "admin",
  password: "admin"
});

connNational.connect(function (err) {
  if (err) throw err;
  console.log("Connected!");
});
module.exports = connNational;