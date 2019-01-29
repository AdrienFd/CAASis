var db=require('../db_local');

var Shopping={

    getAllShoppings:function(callback){
        return db.query("Select * from shopping_cart",callback);

    },

    getShoppingById:function(id,callback){
        return db.query("select * from shopping_cart where id_member = ?",[id],callback);
    },

    addShopping:function(Shopping,callback){
        return db.query("Insert into shopping_cart(id_article,id_member) values(?,?)",[Shopping.id_article,Shopping.id_member],callback);
    },

    deleteShopping:function(id,callback){
        return db.query("delete from order where id_order=?",[id],callback);
    },

    updateShopping:function(id,Shopping,callback){
        return db.query("Update Shopping set id_article=?,id_member=? where id_member=?",[Shopping.id_article,Shopping.id_member,Shopping.id_member],callback);
    },
}
module.exports=Shopping;