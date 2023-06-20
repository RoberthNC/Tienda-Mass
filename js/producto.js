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
        const resultados = await fetch("../pages/eliminarcliente.php",{
            method:"POST",
            body:data
        })
        modalEliminarProducto.classList.add("ocultar-modal")
        window.location.href = "./listarproductos.php"
    })
}