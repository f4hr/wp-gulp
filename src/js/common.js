/**
 * Input mask
 */
document.querySelectorAll('input[type="tel"]').forEach(el => {
  IMask(el, {
    mask: '+{7} (000) 000-00-00',
    lazy: false
  });
});

/**
 * [helper] check is element on page
 */
function isOnPage (elementID) {
  return ($(elementID).length > 0);
}
