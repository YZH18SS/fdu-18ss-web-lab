window.onload = function () {
    var bigPic = document.querySelector("#featured img");
   let figcaption  = document.querySelector("#featured figcaption");
    document.getElementById("thumbnails").addEventListener("click",
        function (e) {
            function getPath(src) {
                let reg = /[0-9]+\.jpg$/;
                return "images/medium/" + reg.exec(src).toString();
            }

            var imgClick = e.target;
            bigPic.src = getPath(imgClick.src);
            bigPic.title = imgClick.title;
            figcaption.innerHTML  = imgClick.title.toString();

        });

        figcaption.style.transition = "opacity , 1s";
        document.getElementById("featured").onmouseover = function (){
            figcaption.style.opacity = 0.8;
        };
        document.getElementById("featured").onmouseout = function (){
            figcaption.style.opacity = 0;
        }

};


