document.addEventListener("DOMContentLoaded", function () {
    const botonesAgregar = document.querySelectorAll(".agregar");
    const listaCarrito = document.getElementById("lista-carrito");
    const totalGeneral = document.getElementById("total-general");

    let carrito = [];

    function actualizarCarrito() {
        listaCarrito.innerHTML = "";
        let total = 0;

        carrito.forEach((item, index) => {
            let fila = document.createElement("tr");
            fila.innerHTML = `
                <td>${item.nombre}</td>
                <td>$${item.precio.toFixed(2)}</td>
                <td>${item.cantidad}</td>
                <td>$${(item.precio * item.cantidad).toFixed(2)}</td>
                <td><button class="eliminar" data-index="${index}">Eliminar</button></td>
            `;
            listaCarrito.appendChild(fila);
            total += item.precio * item.cantidad;
        });

        totalGeneral.textContent = `Total General: $${total.toFixed(2)}`;
        agregarEventosEliminar();
    }

    function agregarEventosEliminar() {
        document.querySelectorAll(".eliminar").forEach((boton) => {
            boton.addEventListener("click", function () {
                const index = this.getAttribute("data-index");
                carrito.splice(index, 1);
                actualizarCarrito();
            });
        });
    }

    botonesAgregar.forEach((boton) => {
        boton.addEventListener("click", function () {
            const helado = this.parentElement;
            const nombre = helado.querySelector("h3").textContent.split(" - ")[0];
            const precio = parseFloat(helado.querySelector("h3").textContent.split("$")[1]);
            const cantidad = parseInt(helado.querySelector(".cantidad").value);

            if (cantidad > 0) {
                carrito.push({ nombre, precio, cantidad });
                actualizarCarrito();
            }
        });
    });
});
