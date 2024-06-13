const radioImg1 = document.getElementById('img1')
const radioImg2 = document.getElementById('img2')
const radioImg3 = document.getElementById('img3')
const radioImg4 = document.getElementById('img4')
const radioImg5 = document.getElementById('img5')

const imagem1 = document.getElementById('display-img1')
const imagem2 = document.getElementById('display-img2')
const imagem3 = document.getElementById('display-img3')
const imagem4 = document.getElementById('display-img4')
const imagem5 = document.getElementById('display-img5')


radioImg1.addEventListener('click', () => {
    if (imagem1){
        imagem1.classList.remove('invisible')
        imagem2.classList.add('invisible')
        imagem3.classList.add('invisible')
        imagem4.classList.add('invisible')
        imagem5.classList.add('invisible')
    }
})

radioImg2.addEventListener('click', () => {
    if (imagem2){
        imagem2.classList.remove('invisible')
        imagem1.classList.add('invisible')
        imagem3.classList.add('invisible')
        imagem4.classList.add('invisible')
        imagem5.classList.add('invisible')
    }
})

radioImg3.addEventListener('click', () => {
    if (imagem3){
        imagem3.classList.remove('invisible')
        imagem2.classList.add('invisible')
        imagem1.classList.add('invisible')
        imagem4.classList.add('invisible')
        imagem5.classList.add('invisible')
    }
})

radioImg4.addEventListener('click', () => {
    if (imagem4){
        imagem4.classList.remove('invisible')
        imagem2.classList.add('invisible')
        imagem3.classList.add('invisible')
        imagem1.classList.add('invisible')
        imagem5.classList.add('invisible')
    }
})

radioImg5.addEventListener('click', () => {
    if (imagem5){
        imagem5.classList.remove('invisible')
        imagem2.classList.add('invisible')
        imagem3.classList.add('invisible')
        imagem4.classList.add('invisible')
        imagem1.classList.add('invisible')
    }
})

const radioImg6 = document.getElementById('img6')
const radioImg7 = document.getElementById('img7')
const radioImg8 = document.getElementById('img8')
const radioImg9 = document.getElementById('img9')
const radioImg10 = document.getElementById('img10')

const imagem6 = document.getElementById('display-img6')
const imagem7 = document.getElementById('display-img7')
const imagem8 = document.getElementById('display-img8')
const imagem9 = document.getElementById('display-img9')
const imagem10 = document.getElementById('display-img10')


radioImg6.addEventListener('click', () => {
    if (imagem6){
        imagem6.classList.remove('invisible')
        imagem7.classList.add('invisible')
        imagem8.classList.add('invisible')
        imagem9.classList.add('invisible')
        imagem10.classList.add('invisible')
    }
})

radioImg7.addEventListener('click', () => {
    if (imagem7){
        imagem7.classList.remove('invisible')
        imagem6.classList.add('invisible')
        imagem8.classList.add('invisible')
        imagem9.classList.add('invisible')
        imagem10.classList.add('invisible')
    }
})

radioImg8.addEventListener('click', () => {
    if (imagem8){
        imagem8.classList.remove('invisible')
        imagem7.classList.add('invisible')
        imagem6.classList.add('invisible')
        imagem9.classList.add('invisible')
        imagem10.classList.add('invisible')
    }
})

radioImg9.addEventListener('click', () => {
    if (imagem9){
        imagem9.classList.remove('invisible')
        imagem7.classList.add('invisible')
        imagem8.classList.add('invisible')
        imagem6.classList.add('invisible')
        imagem10.classList.add('invisible')
    }
})

radioImg10.addEventListener('click', () => {
    if (imagem10){
        imagem10.classList.remove('invisible')
        imagem7.classList.add('invisible')
        imagem8.classList.add('invisible')
        imagem9.classList.add('invisible')
        imagem6.classList.add('invisible')
    }
})
