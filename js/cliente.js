const mostrarModalEliminarCliente = (id) => {
    const modalEliminarCliente = document.getElementById("modal_cliente")
    modalEliminarCliente.classList.remove("ocultar-modal")

    const botonNoEliminar = document.getElementById("boton_no_eliminar_cliente")
    const botonEliminar = document.getElementById("boton_eliminar_cliente")

    botonNoEliminar.addEventListener("click",()=>{
        modalEliminarCliente.classList.add("ocultar-modal")
    })

    botonEliminar.addEventListener("click",async()=>{
        const data2 = new FormData()
        data2.append("idClienteEliminar",id)
        const resultados = await fetch("../pages/eliminarcliente.php",{
            method:"POST",
            body:data2
        })
        modalEliminarCliente.classList.add("ocultar-modal")
        window.location.href = "./listarclientes.php"
    })
}