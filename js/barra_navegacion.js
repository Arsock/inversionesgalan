const botones = document.querySelectorAll(".aside-button");

botones[0].addEventListener("click",()=>{
    window.location.href = "./factura.php"
})
botones[1].addEventListener("click",()=>{
    window.location.href = "./productos.php"
})
botones[2].addEventListener("click",()=>{
    window.location.href = "./historial.html"
})
botones[3].addEventListener("click",()=>{
    window.location.href = "../index.html"
})