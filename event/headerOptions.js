const boxOptions = document.getElementById('box-op')
const buttonOpenOptions = document.getElementById('list-nav-op')
let ct = 0
const navIcon = document.getElementById('nav-icon')



buttonOpenOptions.addEventListener('click', ()=>{
    if(ct === 0){
        ct = 1
        openOptionsNav()
    }else{
        ct = 0
        closeOptionsNav()
        
    }
})

function openOptionsNav(){
    boxOptions.classList.remove('invisible')
    boxOptions.classList.add('options-nav')
    navIcon.classList.remove('bi-chevron-down')
    navIcon.classList.add('bi-chevron-up')
}

function closeOptionsNav(){
    boxOptions.classList.add('invisible')
    boxOptions.classList.remove('options-nav')
    navIcon.classList.remove('bi-chevron-up')
    navIcon.classList.add('bi-chevron-down')
}

// -----------------------------------------------------------
const navIconFilter = document.getElementById('nav-icon-filter')
const boxFilter = document.getElementById('box-fil')
const buttonFilter = document.getElementById('lista-nav-filter')
let ctFilter = 0
buttonFilter.addEventListener('click', () => {
    if(ctFilter === 0){
        ctFilter = 1
        closeFilterNav()
    }else{
        ctFilter = 0
        openFilterNav()
    }
})
function openFilterNav(){
    boxFilter.classList.remove('invisible')
    boxFilter.classList.add('filter-nav')
    navIconFilter.classList.remove('bi-chevron-down')
    navIconFilter.classList.add('bi-chevron-up')
}
function closeFilterNav(){
    boxFilter.classList.add('invisible')
    boxFilter.classList.remove('filter-nav')
    navIconFilter.classList.remove('bi-chevron-up')
    navIconFilter.classList.add('bi-chevron-down')
}

// -----------------------------------------------------------------
const navIconCategory = document.getElementById('nav-icon-category')
const boxCategory = document.getElementById('box-cat')
const buttonCategory = document.getElementById('lista-nav-category')

let ctCategory = 0
buttonCategory.addEventListener('click', () => {
    if(ctCategory === 0){
        ctCategory = 1
        closeCategoryNav()
    }else{
        ctCategory = 0
        openCategoryNav()
    }
})
function openCategoryNav(){
    boxCategory.classList.remove('invisible')
    boxCategory.classList.add('category-nav')
    navIconCategory.classList.remove('bi-chevron-down')
    navIconCategory.classList.add('bi-chevron-up')
}
function closeCategoryNav(){
    boxCategory.classList.add('invisible')
    boxCategory.classList.remove('category-nav')
    navIconCategory.classList.remove('bi-chevron-up')
    navIconCategory.classList.add('bi-chevron-down')
}