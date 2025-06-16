// assets/js/carousel.js

document.addEventListener('DOMContentLoaded', () => {
  const scene = document.getElementById('scene');
  const carousel = document.getElementById('carousel');

  // Variables injectées globalement par Twig, sinon tu peux les passer par data-attributes
  const total = window.carouselData.total;
  const radius = window.carouselData.radius;
  const tiltX = window.carouselData.tiltX;
  const translateY = window.carouselData.translateY;
  const step = 360 / total;

  let angle = 0;
  let isDragging = false;
  let startX = 0;
  let startTime = 0;
  let currentAngle = 0;

  // Initial transform (au cas où)
  carousel.style.transform = `translateY(${translateY}px) translateZ(-${radius}px) rotateX(${tiltX}deg) rotateY(0deg)`;

  // Clavier
  document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowLeft') {
      angle += step;
    } else if (e.key === 'ArrowRight') {
      angle -= step;
    }
    currentAngle = angle;
    carousel.style.transition = 'transform 1s';
    carousel.style.transform = `translateY(${translateY}px) translateZ(-${radius}px) rotateX(${tiltX}deg) rotateY(${angle}deg)`;
  });

  // Souris
  scene.addEventListener('pointerdown', (e) => {
    isDragging = true;
    startX = e.clientX;
    startTime = Date.now();
    carousel.style.transition = 'none';

    // Empêche le comportement de drag par défaut sur les liens
    if (e.target.tagName === 'A') {
      e.preventDefault();
    }
  });

  window.addEventListener('pointermove', (e) => {
    if (!isDragging) return;
    const deltaX = e.clientX - startX;
    const rotation = deltaX / 3;
    carousel.style.transform = `translateY(${translateY}px) translateZ(-${radius}px) rotateX(${tiltX}deg) rotateY(${currentAngle + rotation}deg)`;
  });

  window.addEventListener('pointerup', (e) => {
    if (!isDragging) return;
    isDragging = false;
    const deltaX = e.clientX - startX;
    const deltaTime = Date.now() - startTime;
    const velocity = deltaX / deltaTime;
    const inertia = velocity * 300;
    let totalRotation = (deltaX + inertia) / 3;
    currentAngle += totalRotation;
    currentAngle = Math.round(currentAngle / step) * step;
    carousel.style.transition = 'transform 1s';
    carousel.style.transform = `translateY(${translateY}px) translateZ(-${radius}px) rotateX(${tiltX}deg) rotateY(${currentAngle}deg)`;
  });

  // Tactile
  scene.addEventListener('touchstart', (e) => {
    if (e.touches.length !== 1) return;
    isDragging = true;
    startX = e.touches[0].clientX;
    startTime = Date.now();
    carousel.style.transition = 'none';
  }, { passive: true });

  scene.addEventListener('touchmove', (e) => {
    if (!isDragging || e.touches.length !== 1) return;
    const deltaX = e.touches[0].clientX - startX;
    const rotation = deltaX / 3;
    carousel.style.transform = `translateY(${translateY}px) translateZ(-${radius}px) rotateX(${tiltX}deg) rotateY(${currentAngle + rotation}deg)`;
  }, { passive: true });

  scene.addEventListener('touchend', (e) => {
    if (!isDragging) return;
    isDragging = false;
    const endX = e.changedTouches[0].clientX;
    const deltaX = endX - startX;
    const deltaTime = Date.now() - startTime;
    const velocity = deltaX / deltaTime;
    const inertia = velocity * 300;
    let totalRotation = (deltaX + inertia) / 3;
    currentAngle += totalRotation;
    currentAngle = Math.round(currentAngle / step) * step;
    carousel.style.transition = 'transform 1s';
    carousel.style.transform = `translateY(${translateY}px) translateZ(-${radius}px) rotateX(${tiltX}deg) rotateY(${currentAngle}deg)`;
  });
});
