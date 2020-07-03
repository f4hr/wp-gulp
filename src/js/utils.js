/**
 * [helper] check is element on page
 */
const isOnPage = (elementID) => {
  return ($(elementID).length > 0);
}

export { isOnPage };
