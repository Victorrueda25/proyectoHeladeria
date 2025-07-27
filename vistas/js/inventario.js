document.addEventListener("DOMContentLoaded", function () {
  // BOTÓN PARA MOSTRAR/OCULTAR FORMULARIO DE NUEVO PRODUCTO
  const btnNuevo = document.getElementById("btn-nuevo-producto");
  const formularioNuevo = document.getElementById("formulario-nuevo");

  if (btnNuevo && formularioNuevo) {
    btnNuevo.addEventListener("click", function () {
      formularioNuevo.classList.toggle("oculto");
    });
  }

  // FORMULARIO PARA AGREGAR NUEVO PRODUCTO
  const formAgregar = document.getElementById("form-agregar-producto");

  if (formAgregar) {
    formAgregar.addEventListener("submit", function (e) {
      e.preventDefault();

      const formData = new FormData(formAgregar);

      fetch("index.php?paginas=inventario&action=agregarProducto", {
        method: "POST",
        body: formData,
        credentials: "same-origin", // Enviar cookies si se usan sesiones
      })
        .then((response) => response.text())
        .then((data) => {
          if (data.trim() === "ok") {
            alert("✅ Producto agregado exitosamente.");
            window.location.reload();
          } else {
            alert("❌ Error al agregar producto: " + data);
          }
        })
        .catch((error) => {
          console.error("Error en la petición:", error);
          alert("❌ Error inesperado al enviar el formulario.");
        });
    });
  }

  // FORMULARIOS PARA ACTUALIZAR STOCK DE CADA PRODUCTO
  const formulariosStock = document.querySelectorAll(".form-actualizar-stock");

  formulariosStock.forEach((form) => {
    form.addEventListener("submit", function (e) {
      e.preventDefault();

      const idProducto = form.getAttribute("data-id");
      const stock = form.querySelector('input[name="stock"]').value;

      const formData = new FormData();
      formData.append("id", idProducto);
      formData.append("stock", stock);

      fetch("index.php?paginas=inventario&action=actualizarStock", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.text())
        .then((data) => {
          alert(data.trim());
          window.location.reload();
        })
        .catch((error) => {
          console.error("Error al actualizar stock:", error);
          alert("❌ Error inesperado al actualizar stock.");
        });
    });
  });
});
