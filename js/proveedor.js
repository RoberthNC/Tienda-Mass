const mostrarModalEliminarProveedor = (id) => {
    const modalEliminarProveedor = document.getElementById("modal_proveedor")
    modalEliminarProveedor.classList.remove("ocultar-modal")

    const botonNoEliminar = document.getElementById("boton_no_eliminar_proveedor")
    const botonEliminar = document.getElementById("boton_eliminar_proveedor")

    botonNoEliminar.addEventListener("click",()=>{
        modalEliminarProveedor.classList.add("ocultar-modal")
    })

    botonEliminar.addEventListener("click",async()=>{
        const data = new FormData()
        data.append("idProveedorEliminar",id)
        const resultados = await fetch("../pages/eliminarproveedor.php",{
            method:"POST",
            body:data
        })
        modalEliminarProveedor.classList.add("ocultar-modal")
        window.location.href = "./listarproveedores.php"
    })
}