import IMask from 'imask';

/**
 * Input mask
 */
document.querySelectorAll('input[type="tel"]').forEach(el => {
  IMask(el, {
    mask: '+{7} (000) 000-00-00',
    lazy: false
  });
});
