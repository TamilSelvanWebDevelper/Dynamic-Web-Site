// JavaScript Document

document.getElementById("what").addEventListener("change", function(event){
	var userChoice = event.target.value;
	switch(userChoice)
	{
		case "Hotels":  document.querySelectorAll(".group")[1].children[0].innerHTML = "Location";
						document.getElementById("where").setAttribute("name","where");
						document.querySelectorAll(".group")[2].children[0].innerHTML = "Check In Date";
			            document.querySelectorAll(".group")[3].children[0].innerHTML = "Check Out Date";
						document.querySelectorAll(".group")[3].children[1].setAttribute("name","outdate");
						var tobeGone = document.querySelectorAll(".group")[2].children[1];
						tobeGone.parentNode.removeChild(tobeGone);
						var myinput = document.createElement("input");
						myinput.setAttribute("type","date");
						myinput.setAttribute("name","indate");
						document.querySelectorAll(".group")[2].appendChild(myinput);
						break;
			
		case "Buses": 	
		case "Flights": document.querySelectorAll(".group")[1].children[0].innerHTML = "Boarding Place";
						document.getElementById("where").setAttribute("name","source");
						document.querySelectorAll(".group")[2].children[0].innerHTML = "Destination";
						document.querySelectorAll(".group")[3].children[0].innerHTML = "Journey Date";
						document.querySelectorAll(".group")[3].children[1].setAttribute("name","doj");
						var tobeGone = document.querySelectorAll(".group")[2].children[1];
						tobeGone.parentNode.removeChild(tobeGone);
						var myselect = document.createElement("select");
			            myselect.setAttribute("name","destination");
						document.querySelectorAll(".group")[2].appendChild(myselect);
						myselect.options[0] = new Option("Bangalore","Bangalore");
						myselect.options[1] = new Option("Chennai","Chennai");
						myselect.options[2] = new Option("Hyderabad","Hyderabad");
						myselect.options[3] = new Option("Goa","Goa");
						myselect.options[4] = new Option("Mumbai","Mumbai");
						myselect.options[5] = new Option("Kolkata","Kolkata");
						myselect.options[6] = new Option("Pune","Pune");
						break;
 	}
}, false);

