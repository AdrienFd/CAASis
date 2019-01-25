var mysql = require("mysql");
var connNational = mysql.createConnection({
  database: 'caasis_national_db',
  host: "localhost",
  user: "root",
  password: ""
});

connNational.connect(function (err) {
  if (err) throw err;
  console.log("Connected!");
});
module.exports = connNational;