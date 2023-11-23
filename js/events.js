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
})  
//IntersectionObserver can observe multiple elements/entries at the same time, Here Scroll Aimationz

const hidden = document.querySelectorAll('.hidden') 
hidden.forEach((el) => observer.observe(el)) //what to observe 
 