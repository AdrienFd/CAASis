//database implementation
var db=require('../db_local');

// Function declarations for GET POST DELETE and PUT method
var Category={

    getAllCategories:function(callback){
        return db.query("Select * from article",callback);

    },

    getArticleById:function(id,callback){
        return db.query("select * from category where id_category = ?",[id],callback);
    },

    addCategory:function(Category,callback){
        return db.query("Insert into category(category_name) values(?)",[Category.category_name],callback);
    },

    deleteCategory:function(id,callback){
        return db.query("delete from category where id_category=?",[id],callback);
    },

    updateCategory:function(Category,callback){
        return db.query("Update category set category_name=? where id_category = ?",[Category.category_name,Category.id_category],callback);
    },
}

//Export the object and his functions
module.exports=Category;