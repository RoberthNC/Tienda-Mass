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
        const resultados = await fetch("../pages/eliminarcliente.php",{
            method:"POST",
            body:data
        })
        modalEliminarProducto.classList.add("ocultar-modal")
        window.location.href = "./listarproductos.php"
    })
}

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

const mostrarModalEliminarCategoria = (id) => {
    const modalEliminarCategoria = document.getElementById("modal_categoria")
    modalEliminarCategoria.classList.remove("ocultar-modal")

    const botonNoEliminar = document.getElementById("boton_no_eliminar_categoria")
    const botonEliminar = document.getElementById("boton_eliminar_categoria")

    botonNoEliminar.addEventListener("click",()=>{
        modalEliminarCategoria.classList.add("ocultar-modal")
    })

    botonEliminar.addEventListener("click",async()=>{
        const data = new FormData()
        data.append("idCategoriaEliminar",id)
        const resultados = await fetch("../pages/eliminarcategoria.php",{
            method:"POST",
            body:data
        })
        modalEliminarCategoria.classList.add("ocultar-modal")
        window.location.href = "./listarcategorias.php"
    })
}

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