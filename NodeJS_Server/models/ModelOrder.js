var db=require('../db_local');

var Order={

    getAllOrders:function(callback){
        return db.query("Select * from purchase",callback);

    },

    getOrderById:function(id,callback){
        return db.query("select * from purchase where id_purchase = ?",[id],callback);
    },

    addOrder:function(Order,callback){
        return db.query("Insert into purchase(purchase_date,purchase_price,id_member) values(?,?,?)",[Order.purchase_date,Order.purchase_price,Order.id_member],callback);
    },

    deleteOrder:function(id,callback){
        return db.query("delete from purchase where id_purchase=?",[id],callback);
    },

    UpdateOrder:function(id,Order,callback){
        return db.query("Update purchase set purchase_date=?,purchase_price=?,id_member=? where id_purchase =?)",[Order.purchase_date,Order.purchase_price,Order.id_member,Order.id_purchase],callback);
    },
}
module.exports=Order;