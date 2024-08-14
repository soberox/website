
document.querySelector("#add_note").addEventListener("click",function(){
    document.querySelector(".popup_note").classList.add("active");
});

document.querySelector("#close_note").addEventListener("click",function(){
    document.querySelector(".popup_note").classList.remove("active");
});
