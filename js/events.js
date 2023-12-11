//dropdown

function dropDown(){
    const dropDown= document.querySelector('.drop-down_content')
    dropDown.classList.toggle('open')
}

//active tab

const activePath = window.location
console.log(activePath.pathname)

const thePath = document.querySelectorAll('.nav-link')
thePath.forEach(link => {
    if(link.href.includes(`${activePath}`)){
        link.classList.add('activeTab')
    }
})

//obsrever code

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => { //looping over the entires
        console.log(entry)
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


 