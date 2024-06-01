// JavaScript Document
var elems = ["title", "author", "image", "bodytext"];
var j = 0;
var blogCard = new Array();
var blogCardCount = 0;
var box = document.createElement("div");
box.className = "container-box";
var target = box;
document.querySelector("#blogs #screen").appendChild(box);

var pageCount = 1;

window.onload = function () {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var jsonfile = this.responseText; // JSON data read as string from server
      var myjsobj = JSON.parse(jsonfile); // JSON String converted into JS object
      var blogs = myjsobj["blogs"];
      /* JS object contains a label "blogs" which has an array as its value */
      // The array's value is now assigned to blogs
      for (var i in blogs) //For every element inside the array blogs
        blogCard[i] = blogs[i]; // Each object inside the array is stored in an array

      for (var itn = 0; itn < blogCard.length; itn++) createBlogCard(itn);

      Array.from(document.getElementsByClassName("container-box")).forEach(
        function (elem, ind) {
          elem.style.left = ind * 100 + "%";
          var page = document.createElement("span");
          page.innerHTML = ind + 1;
          page.className = ind == 0 ? "page-btn active-page" : "page-btn";
          document.querySelector("#pagination").appendChild(page);
        }
      );

      //pagination

      Array.from(document.getElementsByClassName("page-btn")).forEach(
        function (elem, ind) {
          elem.addEventListener("click", function () {
            document.querySelectorAll(".container-box")[ind].style.left = "0%";
            document.querySelectorAll(".page-btn")[ind].classList.add("active-page");
            for (var itc = 0; itc < pageCount; itc++) {
              if (itc < ind) {
                document.querySelectorAll(".container-box")[itc].style.left = "-200%";
              } else if (itc > ind) {
                document.querySelectorAll(".container-box")[itc].style.left =
                  "200%";
              }
              if (itc != ind) {
                document
                  .querySelectorAll(".page-btn")
                [itc].classList.remove("active-page");
              }
            }
          },
            false);
        });

      var anim = document.querySelector("#loadingAnim");
      anim.parentNode.removeChild(anim);
    }
  };
  xhttp.open("GET", "js/blogs.json", true);
  xhttp.send();

  function createBlogCard(x) {
    blogCardCount++;
    var card = document.createElement("div");
    card.className = x % 2 == 0 ? "blog-card odd-card" : "blog-card even-card";
    var sec1 = document.createElement("div");
    sec1.className = "blog-image";
    var img = document.createElement("img");
    img.src = "images/" + blogCard[x][elems[2]] + ".jpg";

    sec1.appendChild(img);
    card.appendChild(sec1);

    var sec2 = document.createElement("article");
    sec2.className = "blog-desc";

    var head2 = document.createElement("h2");
    head2.innerHTML = blogCard[x][elems[0]];

    var head4 = document.createElement("h4");
    head4.innerHTML = blogCard[x][elems[1]];

    var para = document.createElement("p");
    para.innerHTML = blogCard[x][elems[3]].substr(0, 250) + "...";

    var anchor = document.createElement("a");
    anchor.innerHTML = "Read More";

    sec2.appendChild(head2);
    sec2.appendChild(head4);
    sec2.appendChild(para);
    sec2.appendChild(anchor);
    card.appendChild(sec2);

    if (blogCardCount == 5) {
      var box1 = document.createElement("div");
      box1.className = "container-box";
      box1.appendChild(card);
      target = box1;
      document.querySelector("#blogs #screen").appendChild(box1);
      blogCardCount = 1;
      pageCount++;
    } else {
      target.appendChild(card);
    }
  }
};
