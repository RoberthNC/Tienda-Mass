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
        console.log(error);
    }
}

const fuenteRegular = () => {
    const arregloP = document.querySelectorAll("p");
    const arregloH2 = document.querySelectorAll("h2");

    arregloP.forEach(p => {
        p.classList.add("fuente-pequenia");
    });
    arregloH2.forEach(p => {
        p.classList.add("fuente-pequenia");
    });
}

const fuenteMediana = () => {
    const arregloP = document.querySelectorAll("p");
    const arregloH2 = document.querySelectorAll("h2");

    arregloP.forEach(p => {
        p.classList.add("fuente-mediana");
    });
    arregloH2.forEach(p => {
        p.classList.add("fuente-mediana");
    });
}

const fuenteGrande = () => {
    const arregloP = document.querySelectorAll("p");
    const arregloH2 = document.querySelectorAll("h2");

    arregloP.forEach(p => {
        p.classList.add("fuente-grande");
    });
    arregloH2.forEach(p => {
        p.classList.add("fuente-grande");
    });
}