var i=0;
var element = document.getElementById("in-sec");
var pre_btn = document.getElementById("pre-btn");
var nxt_btn = document.getElementById("nxt-btn");
var count = document.getElementsByClassName("men");

pre_btn.style.opacity=0;
cnt=count.length-4;
console.log(cnt);
function nxtFunction() {
    element.scrollLeft += 265;
    i=i+1;
    if(i>=1){
        pre_btn.style.opacity = 1;
        console.log(i);
    }
    if(i>=cnt){
        i=cnt;
        nxt_btn.style.display = "none";
    }
}

pre_btn.onclick=function preFunction() {
    element.scrollLeft -= 265;
    i=i-1;
    if(i<1){
        pre_btn.style.opacity=0;
    }
    if(i<cnt){
        nxt_btn.style.display = "flex";
    }
}
