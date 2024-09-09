document.querySelector("#add_task").addEventListener("click",function(){
    document.querySelector(".popup_task").classList.add("active");
});
document.querySelector("#add_note").addEventListener("click",function(){
    document.querySelector(".popup_note").classList.add("active");
});

document.querySelector("#close_task").addEventListener("click",function(){
    document.querySelector(".popup_task").classList.remove("active");
});
document.querySelector("#close_note").addEventListener("click",function(){
    document.querySelector(".popup_note").classList.remove("active");
});
