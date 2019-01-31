//database implementation
var db=require('../db_national');

// Function declarations for GET POST DELETE and PUT method
var Location={

    getAllLocations:function(callback){
        return db.query("Select * from location",callback);

    },

    getLocationById:function(id,callback){
        return db.query("select * from location where id_location = ?",[id],callback);
    },

    addLocation:function(Location,callback){
        return db.query("Insert into article(location_name) values(?)",[Location.location_name],callback);
    },

    deleteLocation:function(id,callback){
        return db.query("delete from location where id_location=?",[id],callback);
    },

    updateLocation:function(id,Location,callback){
        return db.query("Update location set location_name=? where id_location = ?",[Location.location_name,Location.id_location],callback);
    },
}

//Export the object and his functions
module.exports= Location;