
document.querySelector("#start_login").addEventListener("click",function(){
    document.querySelector(".popup_login").classList.add("active");
});

document.querySelector("#close_log").addEventListener("click",function(){
    document.querySelector(".popup_login").classList.remove("active");
});
