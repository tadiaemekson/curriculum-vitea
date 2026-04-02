(() => {
    const root = document.documentElement;
    const toggle = document.getElementById('theme-toggle');
    const icon = toggle?.querySelector('.theme-toggle__icon');
    const text = toggle?.querySelector('.theme-toggle__text');
    const storageKey = 'portfolio-theme';

    const getAutoTheme = () => {
        const hour = new Date().getHours();
        return hour >= 6 && hour < 18 ? 'light' : 'dark';
    };

    const applyTheme = (theme) => {
        root.setAttribute('data-theme', theme);

        if (!icon || !text) {
            return;
        }

        if (theme === 'light') {
            icon.textContent = '☀️';
            text.textContent = 'Morning';
            return;
        }

        icon.textContent = '🌙';
        text.textContent = 'Night';
    };

    const savedTheme = localStorage.getItem(storageKey);
    const initialTheme = savedTheme === 'light' || savedTheme === 'dark'
        ? savedTheme
        : getAutoTheme();

    applyTheme(initialTheme);

    if (!toggle) {
        return;
    }

    toggle.addEventListener('click', () => {
        const currentTheme = root.getAttribute('data-theme') === 'light' ? 'light' : 'dark';
        const nextTheme = currentTheme === 'light' ? 'dark' : 'light';
        localStorage.setItem(storageKey, nextTheme);
        applyTheme(nextTheme);
    });
})();
