const botones_productos = document.querySelectorAll(".boton-productos");

const x_productos = document.querySelectorAll(".botonx");

const popup = document.querySelectorAll(".agg-productos-factura");



botones_productos[0].addEventListener("click",()=>{
    popup[0].classList.toggle("hidden")
})
    x_productos[0].addEventListener("click",()=>{
        popup[0].classList.toggle("hidden")
    })

botones_productos[1].addEventListener("click",()=>{
        popup[1].classList.toggle("hidden")
    })
        x_productos[1].addEventListener("click",()=>{
            popup[1].classList.toggle("hidden")
        })
    


// for(let i = 0; i < 5; i++){
//     botones_productos[i].addEventListener("click",()=>{
//         popup[i].classList.toggle("hidden")
    
//     })
    
//     x_productos[i].addEventListener("click",()=>{
//         popup[i].classList.toggle("hidden")
//     })
// }

