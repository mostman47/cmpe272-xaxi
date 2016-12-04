var isLogined = false;

/*check login*/
if (window.localStorage) {
    if (typeof window.localStorage.getItem('loginUser') !== 'undefined' && window.localStorage.getItem('loginUser')) {
        var json = JSON.parse(window.localStorage.getItem('loginUser'));
        isLogined = true;
    }
}

/*show login ui */
if(isLogined){
    $("[is-login=false]").hide();
    $("[is-login=true]").show();
}else{
    $("[is-login=false]").show();
    $("[is-login=true]").hide();
}

/*log out*/
function logout(){
    window.localStorage.removeItem('loginUser');
    window.location.reload();
}