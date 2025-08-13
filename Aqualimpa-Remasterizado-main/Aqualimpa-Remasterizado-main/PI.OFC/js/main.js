// Mobile menu toggle
document.getElementById('menu-toggle').addEventListener('click', function () {
  const nav = document.querySelector('nav');
  if (nav.classList.contains('hidden')) {
    nav.classList.remove('hidden');
    nav.classList.add('flex', 'flex-col', 'absolute', 'top-16', 'right-4', 'bg-white', 'p-4', 'shadow-lg', 'rounded-lg', 'space-y-4', 'space-x-0');
  } else {
    nav.classList.add('hidden');
    nav.classList.remove('flex', 'flex-col', 'absolute', 'top-16', 'right-4', 'bg-white', 'p-4', 'shadow-lg', 'rounded-lg', 'space-y-4', 'space-x-0');
  }
});

// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const targetId = this.getAttribute('href');
    if (targetId === '#') return;
    const targetElement = document.querySelector(targetId);
    if (targetElement) {
      targetElement.scrollIntoView({ behavior: 'smooth' });
    }
  });
});
