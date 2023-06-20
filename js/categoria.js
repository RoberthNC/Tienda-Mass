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
        console.log(id)
        console.log("Pasando a la otra página")
    })
}