const modeToggle = document.getElementById('modeToggle');
const modeText = document.getElementById('modeText');
const icon = modeToggle.querySelector('i');
const body = document.body;
const navbar = document.getElementById('navbar');
const sections = document.querySelectorAll('section, footer, .card');

// === Cek status terakhir dari localStorage ===
if (localStorage.getItem('mode') === 'dark') {
  enableDarkMode();
} else {
  enableLightMode();
}

// === Fungsi Aktifkan Dark Mode ===
function enableDarkMode() {
  body.classList.add('dark-mode');
  navbar.classList.add('dark-mode');
  modeToggle.classList.add('dark-mode');
  sections.forEach(e => e.classList.add('dark-mode'));

  icon.classList.replace('bi-moon', 'bi-sun');
  modeText.textContent = 'Light Mode';
  localStorage.setItem('mode', 'dark');
}

// === Fungsi Aktifkan Light Mode ===
function enableLightMode() {
  body.classList.remove('dark-mode');
  navbar.classList.remove('dark-mode');
  modeToggle.classList.remove('dark-mode');
  sections.forEach(e => e.classList.remove('dark-mode'));

  icon.classList.replace('bi-sun', 'bi-moon');
  modeText.textContent = 'Dark Mode';
  localStorage.setItem('mode', 'light');
}

// === Event Listener Toggle ===
modeToggle.addEventListener('click', () => {
  if (body.classList.contains('dark-mode')) {
    enableLightMode();
  } else {
    enableDarkMode();
  }
});
