var db=require('../db_local');

var Category={

    getAllCategories:function(callback){
        return db.query("Select * from category",callback);
    },

    getCategoryById:function(id,callback){
        return db.query("select * from category where id_category = ?",[id],callback);
    },

    addCategory:function(Category,callback){
        return db.query("Insert into category(category_name) values(?)",[Category.category_name],callback);
    },

    deleteCategory:function(id,callback){
        return db.query("delete from category where id_category=?",[id],callback);
    },

    UpdateCategory:function(id,Category,callback){
        return db.query("Update category set category_name=? where id_category = ?)",[Category.category_name, id],callback);
    },
}
module.exports=Category;