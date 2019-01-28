var db=require('../db_national');

var CesiLocation={

    getAllLocations:function(callback){
        return db.query("Select * from location",callback);
    },

    getLocationById:function(id,callback){
        return db.query("select * from location where id_location = ?",[id],callback);
    },

    addLocation:function(Purchase,callback){
        return db.query("Insert into location(location_name) values(?)",[CesiLocation.location_name],callback);
    },

    deleteLocation:function(id,callback){
        return db.query("delete from location where id_location=?",[id],callback);
    },

    UpdateLocation:function(id,Purchase,callback){
        return db.query("Update location set location_name=? where id_location = ?)",[CesiLocation.location_name, id],callback);
    },
}
module.exports=CesiLocation;