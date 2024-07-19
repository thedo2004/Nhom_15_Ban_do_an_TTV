let imgObject= [];
let index = 0;
let a;
function loadImg() {
   const img = ['sline1.PNG','sline2.PNG','sline4.PNG'];
   const imgFolder = "img/";
   img.forEach(function (e) {
    let image = new Image();
    image.src = imgFolder + e;
    imgObject.push(image);
    document.img_banner.src = imgObject[index].src;
   })
}

function next() {
    index++;
    if (index > imgObject.length-1) {
        index = 0;
    }
    
    document.img_banner.src = imgObject[index].src;
}

function start() {
    a = setInterval(function (){
next();
    },1000)
}
start();