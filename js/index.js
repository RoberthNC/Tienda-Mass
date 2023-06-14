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

const mostrarModalEliminarProducto = (id) => {
    const modalEliminarProducto = document.getElementById("modal_producto")
    modalEliminarProducto.classList.remove("ocultar-modal")

    const botonNoEliminar = document.getElementById("boton_no_eliminar_producto")
    const botonEliminar = document.getElementById("boton_eliminar_producto")

    botonNoEliminar.addEventListener("click",()=>{
        modalEliminarProducto.classList.add("ocultar-modal")
    })

    botonEliminar.addEventListener("click",async()=>{
        const data = new FormData()
        data.append("idProductoEliminar",id)
        console.log(id)
        const resultados = await fetch("../pages/eliminarproducto.php",{
            method:"POST",
            body:data
        })
        modalEliminarProducto.classList.add("ocultar-modal")
        window.location.href = "./listarproductos.php"
    })
}