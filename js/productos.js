const botones_productos = document.querySelectorAll(".boton-productos");

const x_productos = document.querySelectorAll(".botonx");

const popup = document.querySelectorAll(".agg-productos");

const x6 = document.querySelector(".xs");

const no3 = document.querySelector(".aja");

x6.addEventListener("click",()=>{
    no3.classList.toggle("hidden")
    popup[2].classList.toggle("hidden")
})

for(let i = 0; i < 5; i++){
    botones_productos[i].addEventListener("click",()=>{
        popup[i].classList.toggle("hidden")
    
    })
    
    x_productos[i].addEventListener("click",()=>{
        popup[i].classList.toggle("hidden")
    })
}



