


function createStar() {
    const star = document.createElement('div');
    star.classList.add('star');
    star.style.left = `${Math.random() * window.innerWidth}px`;
    star.style.animationDuration = `${Math.random() * 2 + 1}s`;
    document.body.appendChild(star);

   
    setTimeout(() => {
        star.remove();
    }, 3000);
}


setInterval(createStar, 100);


const cursorEffect = document.querySelector('.cursor-effect');

document.addEventListener('mousemove', (e) => {
    cursorEffect.style.top = `${e.clientY - 10}px`;
    cursorEffect.style.left = `${e.clientX - 10}px`;
    cursorEffect.style.transform = 'scale(1.5)'; 
});

document.addEventListener('mouseout', () => {
    cursorEffect.style.transform = 'scale(1)'; 
});
