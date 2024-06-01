// Initializing Banner Positions
var bannerCount = 0; //Assume no.of banners in the start is zero
var onTransit = false;
var positions = { }; //Create an empty object to remember banner positions in the future.

$(".banner").each(function(){ //For each banner available in the page
	var elem = this; //Get the banner div
	var bannerPos = (bannerCount*100); //Calculate the position
	elem.style.left = bannerPos+"%"; //Position the banner
     
	bannerCount++; //Keep count of which banner was moved
	positions["banner"+bannerCount] = bannerPos;
});

var trgt;

//Automatically changing banner every 3 seconds

var bannerTimer = setInterval(changeBanner, 3000);

function changeBanner(x)
{
	onTransit = true;
	for(var bann in positions)
	{
		positions[bann] = (x=="right")?(positions[bann]+100):(positions[bann]-100);
		trgt = "#"+bann;
		
		if(x=="right")
			{
				if(positions[bann] == 200)
				  {
					  positions[bann] = -100;
					 $(trgt).css("left", positions[bann]+"%");	 
				  }
			    else 
				  {
					 $(trgt).animate({left: positions[bann]+"%"}, 800, function(){ onTransit = false; }); 
				  }
			}
		else
			{
				if(positions[bann] == -200)
				  {
					 positions[bann] = 100;
					 $(trgt).css("left", positions[bann]+"%");	
				  }
				else 
				  {
					 $(trgt).animate({left: positions[bann]+"%"}, 800, function(){ onTransit = false; }); 
				  }
			}
		
		
		 console.log("Moving "+trgt+" to "+positions[bann]);
	}
}

// Left & Right Button Controls 
$("#leftArrow").on("click", function(){
	if(!onTransit)
	  {
		  console.log("Changing banner");
		  changeBanner("left");
	  }
});

$("#rightArrow").on("click", function(){
	if(!onTransit)
	  {
		  console.log("Changing banner");
		  changeBanner("right");
	  }
});

$("#bannerArea").hover(function(){ clearInterval(bannerTimer) }, function(){ bannerTimer = setInterval(changeBanner, 3000); });