var mysql = require("mysql");
var connLocal = mysql.createConnection({
    database: 'caasis_local_Arras_db',
    host: "10.162.197.169",
    user: "admin",
    password: "admin"
});

connLocal.connect(function (err) {
    if (err) throw err;
    console.log("Connected!");
});
module.exports = connLocal;