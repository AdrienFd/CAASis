var db=require('../db_local');

var Order={

    getAllOrders:function(callback){
        return db.query("Select * from order",callback);

    },

    getOrderById:function(id,callback){
        return db.query("select * from order where id_order = ?",[id],callback);
    },

    addOrder:function(Order,callback){
        return db.query("Insert into order(order_date,order_price,id_member) values(?,?,?)",[Order.order_date,Order.order_price,Order.id_member],callback);
    },

    deleteOrder:function(id,callback){
        return db.query("delete from order where id_order=?",[id],callback);
    },

    UpdateOrder:function(id,Order,callback){
        return db.query("Update order set order_date=?,order_price=?,id_member=? where id_order =?)",[Order.order_date,Order.order_price,Order.id_member,Order.id_order],callback);
    },
}
module.exports=Order;