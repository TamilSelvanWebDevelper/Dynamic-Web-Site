

<header>
	<div class="grid1440">
		<div id="logo">
			<img src="images/logo.jpg" alt="bookmytrip_logo" height="72">
		</div>
		<div id="contact">
			<p> Call us at (Toll-free) </p>
			<h3> 1800-500-5555 </h3>
		</div>
		<div id="links">
			<p> <a href="#login"> Login </a> | <a href="#login"> Sign Up </a> </p>
		</div>
		<div id="searchBar">
			<form action="" id="searchForm">
				<input type="submit" value=" " />
				<input id = "searchBox" name = "query" type="text" placeholder="Search the website" />
			</form>
		</div>
	</div>
</header>

<script> 
  document.getElementById("searchBox").addEventListener("focus", function(){
	var searchSuggestion = document.createElement("div");
	searchSuggestion.classList.add("searchSuggestion");
	document.querySelector("header .search").appendChild(searchSuggestion);
	  
}, false);
	
/*	document.getElementById("searchBox").addEventListener("blur", function(){
	var suggestion = document.querySelector(".searchSuggestion");
	suggestion.parentNode.removeChild(suggestion);
	  
}, false);*/
	
	 document.getElementById("searchBox").addEventListener("input", function(){
	 	var userQuery = this.value;
		 	var xhttp = new XMLHttpRequest();
  	 	xhttp.onreadystatechange = function() {
     	if (this.readyState == 4 && this.status == 200) {
      		document.querySelector(".searchSuggestion").innerHTML = this.responseText;
     		}
  	 	};
	   xhttp.open("GET", "ajax.php?query="+userQuery, true);
	   xhttp.send();
		
	}, false); 
</script>