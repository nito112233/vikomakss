const header = document.querySelector('[data-header]');
const toggle = document.querySelector('[data-menu-toggle]');
const navigation = document.querySelector('#mobile-navigation');

function setMenu(open) {
    if (!header || !toggle || !navigation) return;
    header.classList.toggle('menu-is-open', open);
    toggle.setAttribute('aria-expanded', String(open));
    toggle.setAttribute('aria-label', open ? toggle.dataset.labelClose : toggle.dataset.labelOpen);
    navigation.inert = !open;
}

toggle?.addEventListener('click', () => setMenu(toggle.getAttribute('aria-expanded') !== 'true'));
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && toggle?.getAttribute('aria-expanded') === 'true') {
        setMenu(false);
        toggle.focus();
    }
});
document.addEventListener('click', (event) => {
    if (header && !header.contains(event.target)) setMenu(false);
});
navigation?.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => setMenu(false)));
window.matchMedia('(min-width: 761px)').addEventListener('change', () => setMenu(false));
const updateHeader = () => header?.classList.toggle('is-scrolled', window.scrollY > 25);
window.addEventListener('scroll', updateHeader, { passive: true });
updateHeader();

const enquiry = document.querySelector('[data-email-form]');
enquiry?.addEventListener('submit', (event) => {
    event.preventDefault();
    if (!enquiry.reportValidity()) return;
    const fields = new FormData(enquiry);
    const body = [...enquiry.querySelectorAll('label')].map((label) => {
        const input = label.querySelector('input, textarea');
        const title = label.childNodes[0].textContent.trim();
        return `${title}: ${fields.get(input.name) || '—'}`;
    }).join('\n\n');
    window.location.href = `mailto:${enquiry.dataset.email}?subject=${encodeURIComponent(enquiry.dataset.subject)}&body=${encodeURIComponent(body)}`;
});
