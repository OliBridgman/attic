var container = document.querySelector('.bastion');
var masonry = new Masonry(container, {
  // options
  columnWidth: '.bastion-child',
  itemSelector: '.bastion-child'
});