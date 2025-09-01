document.addEventListener("DOMContentLoaded", () => {
  const tablaPedido = document.querySelector("#tablaPedido tbody");
  const totalPedido = document.querySelector("#totalPedido");
  const formVentas = document.querySelector("#formVentas");
  const inputProductos = document.querySelector("#inputProductos");

  const formatearMoneda = (valor) =>
    new Intl.NumberFormat("es-CO", {
      style: "currency",
      currency: "COP",
    }).format(valor);

  function actualizarTotal() {
    let total = 0;
    tablaPedido.querySelectorAll("tr").forEach((fila) => {
      total += parseFloat(fila.dataset.subtotal);
    });
    totalPedido.textContent = formatearMoneda(total);
  }

  // ✅ Submit del formulario
  if (formVentas) {
    formVentas.addEventListener("submit", (e) => {
      const productos = [];

      tablaPedido.querySelectorAll("tr").forEach((fila) => {
        productos.push({
          id: fila.dataset.id,
          cantidad: parseInt(fila.querySelector(".colCantidad").textContent),
          precio:
            parseFloat(
              fila
                .querySelector(".colSubtotal")
                .textContent.replace(/[^\d.-]/g, "")
            ) / parseInt(fila.querySelector(".colCantidad").textContent),
        });
      });

      if (productos.length === 0) {
        e.preventDefault();
        Swal.fire({
          icon: "warning",
          title: "Pedido vacío",
          text: "Agrega productos antes de generar la venta.",
        });
        return;
      }

      // Guardamos el JSON en el input hidden
      inputProductos.value = JSON.stringify(productos);
    });
  }

  // ✅ Evento: Agregar producto desde card
  document.querySelectorAll(".btnAgregarCard").forEach((boton) => {
    boton.addEventListener("click", function () {
      const card = this.closest(".producto-card");
      const id = card.dataset.id;
      const nombre = card.dataset.nombre;
      const precio = parseFloat(card.dataset.precio);
      const cantidad = parseInt(card.querySelector(".cantidadProducto").value);

      if (cantidad < 1) return;

      const subtotal = precio * cantidad;
      let fila = tablaPedido.querySelector(`tr[data-id="${id}"]`);

      if (fila) {
        let celdaCantidad = fila.querySelector(".colCantidad");
        let nuevaCantidad = parseInt(celdaCantidad.textContent) + cantidad;
        celdaCantidad.textContent = nuevaCantidad;
        fila.querySelector(".colSubtotal").textContent = formatearMoneda(
          precio * nuevaCantidad
        );
        fila.dataset.subtotal = precio * nuevaCantidad;
      } else {
        fila = document.createElement("tr");
        fila.dataset.id = id;
        fila.dataset.subtotal = subtotal;
        fila.innerHTML = `
          <td>${nombre}</td>
          <td class="colCantidad">${cantidad}</td>
          <td>${formatearMoneda(precio)}</td>
          <td class="colSubtotal">${formatearMoneda(subtotal)}</td>
          <td><button class="btn btn-danger btn-sm btnEliminar">X</button></td>
        `;
        tablaPedido.appendChild(fila);

        fila.querySelector(".btnEliminar").addEventListener("click", () => {
          fila.remove();
          actualizarTotal();
        });
      }

      actualizarTotal();
    });
  });
});
// File: vistas/js/ventas.js