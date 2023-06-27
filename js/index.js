const agregarId = async(id) => {
    try {
        const data = new FormData();
        data.append("idProductoNuevo",id);
        const resultados = await fetch("../pages/carrito.php",{
            method:"POST",
            body:data
        });
        alert("Producto agregado al carrito");
    } catch (error) {
        console.log(error)
    }
}

const modalRegistroExitoso = (band) => {
    console.log(band)
}

document.getElementById("continuar_compra")
    .addEventListener("click",()=>{
        window.location.href = "../pages/entrega.php"
    })