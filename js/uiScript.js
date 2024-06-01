/* ----------------- Expandable Search Script  ----------------- */

$("#searchBar").css("width","44px");

$("#searchBar form input[type=text]").on("blur", function(){
	$("#searchBar").animate({ width: "44px"},700);
});

$("#searchBar form input[type=submit]").on("click", function(ev){
	ev.preventDefault();
	ev.stopPropagation();
	$("#searchBar").animate({ width: "380px"},700);
	$("#searchBar form input[type=text]").focus();
});




/* ----------------- Accordion Script  ----------------- */

var secCount = document.getElementsByClassName("accordTitle").length;

Array.from(document.getElementsByClassName("accordTitle")).forEach(function(elem, ind){
	elem.addEventListener("click", function(){
		console.log("Clicked Section: "+ind+" has height: "+elem.offsetHeight);
		for(var i = 0; i < secCount; i++)
		 {
			if(i!=ind)
				{
					console.log("Collapsing Section: "+i);
					var thisAccord = document.getElementsByClassName("accordTitle")[i];
					thisAccord.style.height = "70px"; 
					thisAccord.style.color = "white"; 
					document.getElementsByClassName("plus")[i].style.transform = "rotate(0deg)"; 
				}
		 }
		if(elem.offsetHeight==70)
		 { 
			console.log("Expanding Section: "+ind);
			elem.style.height = "270px";
			elem.style.color = "#2B68A7"; 
			elem.getElementsByClassName("plus")[0].style.transform = "rotate(45deg)";
		 }
	    else
		 {
			elem.style.height = "70px";
			elem.style.color = "#FFF";
			elem.getElementsByClassName("plus")[0].style.transform = "rotate(0deg)"; 
		 }
		 
	}, false);
});


/* ----------------- Login/Signup Switching Script  ----------------- */

document.getElementById("loginBtn").addEventListener("click",function(){
	document.getElementById("loginBtn").classList.add("active-btn");
	document.getElementById("signupBtn").classList.remove("active-btn");
	document.getElementById("loginForm").style.display = "block";
	document.getElementById("signupForm").style.display = "none";
}, false);

document.getElementById("signupBtn").addEventListener("click",function(){
	document.getElementById("loginBtn").classList.remove("active-btn");
	document.getElementById("signupBtn").classList.add("active-btn");
	document.getElementById("loginForm").style.display = "none";
	document.getElementById("signupForm").style.display = "block";
}, false);

/* ----------------- Booking widget morpher  ----------------- */

document.querySelector("#category").addEventListener("change", function(){
	var cat = document.querySelector("#category").value;
	switch(cat)
	{
		case "Hotels":  document.querySelector(".tinySection #one").nextElementSibling.innerHTML = "Luxury";
						document.querySelector(".tinySection #two").nextElementSibling.innerHTML = "Budget";
						document.querySelector("#starting").previousElementSibling.innerHTML = "Location";
						document.querySelector("#starting").setAttribute("name","where");
						document.querySelector("#destination").previousElementSibling.innerHTML = "Check-in date";
						document.querySelector("#destination").setAttribute("type","date");
						document.querySelector("#destination").setAttribute("name","indate");
						document.querySelector("#doj").previousElementSibling.innerHTML = "Check-out date";
						document.querySelector("#doj").setAttribute("name","outdate");
						document.querySelector("#passengers").previousElementSibling.innerHTML = "No.of Persons";
					    break;
		case "Buses":
		case "Flights": document.querySelector(".tinySection #one").nextElementSibling.innerHTML = "One-way";
						document.querySelector(".tinySection #two").nextElementSibling.innerHTML = "Round-trip";
						document.querySelector("#starting").previousElementSibling.innerHTML = "Starting Place";
						document.querySelector("#starting").setAttribute("name","starting");
						document.querySelector("#destination").previousElementSibling.innerHTML = "Destination";
						document.querySelector("#destination").setAttribute("type","text");
						document.querySelector("#destination").setAttribute("name","destination");
					    document.querySelector("#doj").previousElementSibling.innerHTML = "Date of Journey";
					    document.querySelector("#doj").setAttribute("name","doj");
						document.querySelector("#passengers").previousElementSibling.innerHTML = "No.of Seats";
					    break;
	}
}, false);

/* ----------------- Pagination Script  ----------------- */

