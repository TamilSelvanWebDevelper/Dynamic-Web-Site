// JavaScript Document

var scrollPos = window.pageYOffset || document.documentElement.scrollTop;
document.getElementById("plane").style.left = window.innerWidth/2 - 190 + "px";
document.getElementById("plane").style.top = "222px";

window.addEventListener("scroll", function(){
	scrollPos = window.pageYOffset || document.documentElement.scrollTop;
	if(scrollPos > 841 && scrollPos < 2300)
	 {
		 var newPos = scrollPos - 841;
		 document.getElementById("layer1").style.backgroundPositionY = 500 - newPos/3 + "px";
		 document.getElementById("layer2").style.backgroundPositionY = 400 - newPos/6 + "px";
		 document.getElementById("plane").style.left = 45 + newPos/50 + "%";
		 document.getElementById("plane").style.top = 250 - newPos/5 + "px";
	 }
}, false);


//841
//1385
//1760
//2300