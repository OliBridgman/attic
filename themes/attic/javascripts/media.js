var videoContainer = document.querySelector('.bastion.video');
var imageContainer = document.querySelector('.bastion.image');
var masonry = new Masonry(imageContainer, {
  // options
  columnWidth: '.bastion-child',
  itemSelector: '.bastion-child',
  gutter: 10
});
var masonry = new Masonry(videoContainer, {
  // options
  columnWidth: '.bastion-child',
  itemSelector: '.bastion-child'
});

var lightbox = new Lightbox();
lightbox.load();