const imgsPartOne = document.getElementById('img-part-1');
const imgsPartTwo = document.getElementById('img-part-2')
const img = document.querySelectorAll('#img-part-1 img');

let idx = 0;

function carrossel(){
    idx++;

    if(idx > img.length - 1  ){
        idx = 0;
    }

    imgsPartOne.style.transform = `translateX(${-idx * 500}px)`
    imgsPartTwo.style.transform = `translateX(${-idx * 500}px)`
}

setInterval(carrossel, 2000)