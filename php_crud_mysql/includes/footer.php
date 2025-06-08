<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" 
crossorigin="anonymous"></script>
<script>
    // Espera 3 segundos para cerrar el mensaje
    setTimeout(function () {
        let alert = document.querySelector('.alert');
        if (alert) {
            // Oculta el mensaje visualmente
            alert.classList.add('fade');
            alert.classList.remove('show');

            // Elimina el alert del DOM después de 0.5s
            setTimeout(function () {
                alert.remove();

                // Luego hace scroll al inicio de la página
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });

                // También puede enfocar el campo título si querés:
                let inputTitulo = document.querySelector('input[name="title"]');
                if (inputTitulo) inputTitulo.focus();

            }, 500); // espera que termine la transición CSS
        }
    }, 3000); // el mensaje dura 3 segundos en pantalla
</script>



</body>
</html>
