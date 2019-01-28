var db=require('../db_local');

var Purchase={

    getAllPurchases:function(callback){
        return db.query("Select * from purchase",callback);
    },

    getPurchaseById:function(id,callback){
        return db.query("select * from purchase where id_purchase = ?",[id],callback);
    },

    addPurchase:function(Purchase,callback){
        return db.query("Insert into purchase(purchase_date, purchase_price, id_member) values(?,?,?)",[Purchase.purchase_date, Purchase.purchase_date, Purchase.id_member],callback);
    },

    deletePurchase:function(id,callback){
        return db.query("delete from purchase where id_purchase=?",[id],callback);
    },

    UpdatePurchase:function(id,Purchase,callback){
        return db.query("Update purchase set purchase_date=?, purchase_price=?, id_member=? where id_purchase = ?)",[Purchase.purchase_date, Purchase.purchase_date, Purchase.id_member, id],callback);
    },
}
module.exports=Purchase;