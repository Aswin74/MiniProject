//dropdown : navbar login

function dropDown(){
    const dropDown= document.querySelector('.drop-down_content')
    dropDown.classList.toggle('open')
}

//active tab : navbar

const activePath = window.location

const thePath = document.querySelectorAll('.nav-link')
thePath.forEach(link => {
    if(link.href.includes(`${activePath}`)){
        link.classList.add('activeTab')
    }
})

//obsrever code : about us

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => { //looping over the entires
        if(entry.isIntersecting){ //checking if entry intersects the viewport
            entry.target.classList.add('show')
        } else{
            entry.target.classList.remove('show') //for multiple times
        }
    })
}, { threshold: 0.1})
//IntersectionObserver can observe multiple elements/entries at the same time, Here Scroll Aimationz

const hidden = document.querySelectorAll('.hidden') 
hidden.forEach((el) => observer.observe(el)) //what to observe 


//-------Hostel details Page-------- 

let carousel_dots = document.querySelectorAll('.carousel-dots li')
let carousel_img = document.querySelectorAll('.carousel-img img')
index = 0

function prev(){
    index -= 1
    if(index < 0){
        index = carousel_dots.length - 1
    }
    
    updateCarousel()
}

function next(){
    index += 1
    if(index >= carousel_dots.length){
        index = 0
    }

    updateCarousel()
}

function updateCarousel(){
    
    carousel_dots.forEach((dots,i) => {
        if( i === index)
            dots.classList.add('active')
        else
            dots.classList.remove('active')
    })

    carousel_img.forEach((img,i) => {
        if ( i == index )
            img.classList.add('show_image')
        else
            img.classList.remove('show_image')
    })
    
}

