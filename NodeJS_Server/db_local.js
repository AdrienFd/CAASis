var mysql = require("mysql");
var connLocal = mysql.createConnection({
    database: 'caasis_local_Arras_db',
    host: "localhost",
    user: "root",
    password: ""
});

connLocal.connect(function (err) {
    if (err) throw err;
    console.log("Connected!");
});
module.exports = connLocal;