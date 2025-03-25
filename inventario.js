document.addEventListener("DOMContentLoaded", function () {
    const botonesSumar = document.querySelectorAll(".sumar");
    const botonesRestar = document.querySelectorAll(".restar");

    function actualizarInventario(id, accion) {
        fetch("actualizar_inventario.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ id, accion })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById(`cantidad-${id}`).textContent = data.nuevaCantidad;
            } else {
                alert("No se puede restar más de la cantidad existente.");
            }
        });
    }

    botonesSumar.forEach(btn => {
        btn.addEventListener("click", () => actualizarInventario(btn.dataset.id, "sumar"));
    });

    botonesRestar.forEach(btn => {
        btn.addEventListener("click", () => actualizarInventario(btn.dataset.id, "restar"));
    });
});
