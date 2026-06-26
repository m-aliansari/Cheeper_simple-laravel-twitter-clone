import './bootstrap';

// Dark mode toggle. The <head> applies any saved theme before paint; here we
// sync the toggle's state and persist the user's choice. With no saved choice
// the app follows the system preference (handled by daisyUI's --prefersdark).
const themeToggle = document.getElementById('theme-toggle');

if (themeToggle) {
    const stored = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    themeToggle.checked = stored ? stored === 'dark' : prefersDark;

    themeToggle.addEventListener('change', () => {
        const theme = themeToggle.checked ? 'dark' : 'lofi';
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
    });
}
