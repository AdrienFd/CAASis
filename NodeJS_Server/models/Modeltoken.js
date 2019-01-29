

var Token = {
        verifyToken:function(req,res,next){
        //get the auth header value
        const bearerHeader = req.headers['authorization'];
        //check if undefined
        if (typeof bearerHeader !== 'undefined'){
        //split the header with a space to get the token
            const bearer = bearerHeader.split(' ');
        //set the token
            const bearerToken = bearer[1];
            req.token = bearerToken;
        //next middleware
            next();

        }
        else{
            res.sendStatus(403);
        }

    }
}

module.exports=Token;