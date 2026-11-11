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
window.matchMedia('(min-width: 1001px)').addEventListener('change', () => setMenu(false));
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

const projectDialog = document.querySelector('[data-project-dialog]');
const projectContent = projectDialog?.querySelector('[data-project-content]');
let projectTrigger = null;

function closeProject() {
    projectDialog?.close();
}

document.querySelectorAll('[data-project-open]').forEach((button) => {
    button.addEventListener('click', () => {
        const template = document.getElementById(button.dataset.projectOpen);
        if (!template || !projectDialog || !projectContent) return;
        projectTrigger = button;
        projectContent.replaceChildren(template.content.cloneNode(true));
        document.documentElement.classList.add('has-project-dialog');
        projectDialog.showModal();
        projectDialog.scrollTop = 0;
        projectDialog.querySelector('[data-project-close]').focus({ preventScroll: true });
    });
});
projectDialog?.querySelector('[data-project-close]').addEventListener('click', closeProject);
projectDialog?.addEventListener('click', (event) => {
    if (event.target !== projectDialog) return;
    const bounds = projectDialog.getBoundingClientRect();
    if (event.clientX < bounds.left || event.clientX > bounds.right || event.clientY < bounds.top || event.clientY > bounds.bottom) closeProject();
});
projectDialog?.addEventListener('close', () => {
    document.documentElement.classList.remove('has-project-dialog');
    projectContent.replaceChildren();
    projectTrigger?.focus({ preventScroll: true });
});
