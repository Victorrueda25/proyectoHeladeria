document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".actualizar-stock").forEach(boton => {
        boton.addEventListener("click", () => {
            let id = boton.getAttribute("data-id");
            let nuevoStock = document.getElementById(`nuevo-stock-${id}`).value;

            if (nuevoStock === "" || nuevoStock < 0) {
                alert("Ingrese un valor válido.");
                return;
            }

            // Enviar datos al servidor para actualizar el JSON
            fetch("actualizar_inventario.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ id: id, cantidad: parseInt(nuevoStock) })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById(`stock-${id}`).textContent = nuevoStock;
                    alert("Stock actualizado correctamente.");
                } else {
                    alert("Error al actualizar el stock.");
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
});
