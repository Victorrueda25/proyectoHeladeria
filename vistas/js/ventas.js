
console.log(productosDesdePHP);
const productos = typeof productosDesdePHP !== "undefined" ? productosDesdePHP : [];
const tablaPedido = document.querySelector("#tablaPedido tbody");
let pedido = [];

    document.getElementById("producto_id").addEventListener("change", function () {
        const selected = this.options[this.selectedIndex];
        const precio = selected.dataset.precio || "";
        const imagen = selected.dataset.imagen || "";
        document.getElementById("precio_unitario").value = precio;

        if (imagen) {
            document.getElementById("previewImagen").src = "bdImagenes/" + imagen;
            document.getElementById("imagenProductoSeleccionado").style.display = "block";
        } else {
            document.getElementById("imagenProductoSeleccionado").style.display = "none";
        }
    });

    document.getElementById("agregarProducto").addEventListener("click", () => {
        const select = document.getElementById("producto_id");
        const id = select.value;
        const nombre = select.options[select.selectedIndex].text;
        const precio = parseFloat(document.getElementById("precio_unitario").value);
        const cantidad = parseInt(document.getElementById("cantidad").value);

        if (!id || !precio || cantidad <= 0) return alert("Datos inválidos");

        // Agregar al pedido
        pedido.push({ id, nombre, precio, cantidad });

        actualizarTablaPedido();
    });

    function actualizarTablaPedido() {
        tablaPedido.innerHTML = "";
        let total = 0;

        pedido.forEach((item, index) => {
            const subtotal = item.precio * item.cantidad;
            total += subtotal;

            tablaPedido.innerHTML += `
                <tr>
                    <td>${item.nombre}</td>
                    <td>${item.cantidad}</td>
                    <td>$ ${item.precio.toFixed(2)}</td>
                    <td>$ ${subtotal.toFixed(2)}</td>
                    <td><button class="btn btn-danger btn-sm" onclick="eliminarProducto(${index})">X</button></td>
                </tr>`;
        });

        document.getElementById("totalPedido").textContent = `$ ${total.toFixed(2)}`;
    }

    function eliminarProducto(index) {
        pedido.splice(index, 1);
        actualizarTablaPedido();
    }

    document.getElementById("btnRegistrarVenta").addEventListener("click", () => {
        if (pedido.length === 0) return alert("Debe agregar al menos un producto");

        const form = document.createElement("form");
        form.method = "POST";
        form.action = "index.php?paginas=ventas&action=registrar";

        const input = document.createElement("input");
        input.type = "hidden";
        input.name = "productos";
        input.value = JSON.stringify(pedido);

        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    });