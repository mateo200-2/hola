// script.js

// Función para generar estrellas
function createStar() {
    const star = document.createElement('div');
    star.classList.add('star');
    star.style.left = `${Math.random() * window.innerWidth}px`;
    star.style.animationDuration = `${Math.random() * 2 + 1}s`;
    document.body.appendChild(star);

    // Remover la estrella después de que caiga
    setTimeout(() => {
        star.remove();
    }, 3000);
}

// Generar estrellas cada 100ms
setInterval(createStar, 100);

// Efecto de círculo de colores alrededor del cursor
const cursorEffect = document.querySelector('.cursor-effect');

document.addEventListener('mousemove', (e) => {
    cursorEffect.style.top = `${e.clientY - 10}px`;
    cursorEffect.style.left = `${e.clientX - 10}px`;
    cursorEffect.style.transform = 'scale(1.5)';  // Agranda el círculo al mover el cursor
});

document.addEventListener('mouseout', () => {
    cursorEffect.style.transform = 'scale(1)';  // Vuelve a su tamaño normal
});
