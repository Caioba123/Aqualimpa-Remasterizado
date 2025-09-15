// Mobile menu toggle
document.getElementById('menu-toggle').addEventListener('click', function () {
  const nav = document.getElementById('mobile-nav'); // pega só o menu mobile
  nav.classList.toggle('hidden');
});

// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const targetId = this.getAttribute('href');
    if (targetId === '#') return; // ignora links só com #
    const targetElement = document.querySelector(targetId);
    if (targetElement) {
      targetElement.scrollIntoView({ behavior: 'smooth' });
    }
  });
});
<nav id="mobile-nav" class="hidden flex flex-col absolute top-16 right-4 bg-white p-4 shadow-lg rounded-lg space-y-4 sm:hidden">
  <a href="#home">Home</a>
  <a href="#sobre">Sobre</a>
  <a href="#contato">Contato</a>
</nav>
