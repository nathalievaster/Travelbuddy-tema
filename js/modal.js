document.addEventListener('DOMContentLoaded', () => {
  const openBtn = document.querySelector('[data-open-modal]');
  const modal = document.getElementById('bookingModal');
  const closeBtn = modal.querySelector('.modal__close');
  const overlay = modal.querySelector('.modal__overlay');

  if (!openBtn || !modal) return;

  openBtn.addEventListener('click', () => {
    modal.classList.add('active');
    modal.setAttribute('aria-hidden', 'false');
  });

  [closeBtn, overlay].forEach(el =>
    el.addEventListener('click', () => {
      modal.classList.remove('active');
      modal.setAttribute('aria-hidden', 'true');
    })
  );
});