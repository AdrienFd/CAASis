//database implementation
var db=require('../db_local');

// Function declarations for GET POST DELETE and PUT method
var Article={

    getAllArticles:function(callback){
        return db.query("Select * from article",callback);

    },

    getArticleById:function(id,callback){
        return db.query("select * from article where id_article = ?",[id],callback);
    },

    addArticle:function(Article,callback){
        return db.query("Insert into article(article_name, article_description, article_price, id_category) values(?,?,?,?)",[Article.article_name, Article.article_description, Article.article_price, Article.id_category],callback);
    },

    deleteArticle:function(id,callback){
        return db.query("delete from article where id_article=?",[id],callback);
    },

    updateArticle:function(Article,callback){
        return db.query("Update article set article_name=?,article_description=?,Article_price=?,id_category=? where id_article = ?",[Article.article_name, Article.article_description, Article.article_price, Article.id_category, Article.id_article],callback);
    },
}
//Export the object and his functions
module.exports=Article;