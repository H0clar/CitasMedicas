document.addEventListener('DOMContentLoaded', () => {
    // Inicializar AOS
    AOS.init({
        duration: 1200, // duración de las animaciones
        easing: 'ease-out-cubic', // tipo de easing
        once: false, // permitir que las animaciones se reproduzcan cada vez que los elementos entran en el viewport
        mirror: true, // permitir que las animaciones se reproduzcan al volver a entrar al viewport
    });

    // Navegación suave
    const links = document.querySelectorAll('a[href^="#"]');
    for (const link of links) {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = link.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - document.querySelector('header').offsetHeight,
                    behavior: 'smooth'
                });
            }
        });
    }
});
