//variable : main picture, like button, number of like
var switch_place = document.querySelector('#main_img');
var switch_like_number = document.querySelector('#display_like');
var switch_like_button = document.querySelector('#like');

//this function switch the img viewed , the number of like it had, the parameter of the like button are also changed to vote for that image
function switch_img(id,link, token, route,user) {

    //switch the src link of the main image
    switch_place.src = link;

    //switch the number of like of the old img for the number of the new img 
    switch_like_number.innerHTML = getLikes(id);

    //switch the onclick function of the like button to the reight formated for the actual image
    if(switch_like_button != null)switch_like_button.setAttribute('onclick',"likeImg('"+id+"','"+token+"','"+ route+"')");
    
    //switch between button like visible or not depending on if the user as already like
    if(getUserLike(id,user) != ''){
        switch_like_button.style.display = 'none';
    }
    else{
        switch_like_button.style.display = 'block';
    }
}

//function that get the number of likes for an image
function getLikes(id) {
    var result = null;
    $.ajax({
        url: "http://127.0.0.1:8000/like/"+id,
        type: 'get',
        dataType: 'html',
        async: false,
        success: function(data) {
            result = data;
        } 
     });
     return result;   
}

//function that get the record of the couple user/image if recorde == '' user as not like that image else he has like the image
function getUserLike(id,user) {
    var result = null;
    $.ajax({
        url: "http://127.0.0.1:8000/user-like/"+id+"/"+user,
        type: 'get',
        dataType: 'html',
        async: false,
        success: function(data) {
            result = data;
        } 
     });
     return result;   
}

//function to send via post a like on an img
function likeImg(id,token,url){

    //add token to the http header laravel ask token for security
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN':  token}
    });

    //send the post
    $.ajax({
        url:  url,
        data: {'idImg': id},
        type: 'POST',
        //if the post is a success he actualize the number of like and remove the button to like
        success: function (response) {
            switch_like_number.innerHTML = getLikes(id);
            switch_like_button.style.display = 'none';
        },
        //else we alert the user that he already vote (logically this case shouldn't happen beacause we remove the button to vote when user as vote)
        error :function(response){
            alert('Vous avez déja aimé cette photo'); 
        }
    });
}