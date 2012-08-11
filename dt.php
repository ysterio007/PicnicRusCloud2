document.getElementById("pumpk­inlabel");
label_pumpkin.onmouseover = visible label_pumpkin.onmouseout = hide;
function visible(){
var id? = this.id document.getElementById("descr­iption").style.visibility = "visible";
var putitout = document.getElementById("descr­iption");
putitout.innerHTML = " " + id;
}
 
 function hide(){
document.getElementById("descr­iption").style.visibility = "hidden";
 }
