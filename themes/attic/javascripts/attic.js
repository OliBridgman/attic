document.addEventListener('DOMContentLoaded', function() {
  var tabs = document.querySelectorAll('.accordion-tabs');
  Array.prototype.forEach.call(tabs, function(el, i){
    // Tab section
    Array.prototype.forEach.call(el.children, function(el, i) {
      // Header and content section
      var tabHeaders = el.querySelectorAll('.tab-link');
      tabHeaders[0].addEventListener('click', tabWasClicked);
    });
  });
});

function tabWasClicked(event) {
  event.preventDefault();
  if (this.classList) {
    if(!this.classList.contains('is-active')) {
      var tabs = closest(this, '.accordion-tabs');
      var link = tabs.querySelectorAll('.is-active');
      var content = tabs.querySelectorAll('.is-open');
      link[0].classList.remove('is-active');
      content[0].classList.remove('is-open');

      this.classList.add('is-active');
      this.nextElementSibling.classList.add('is-open');

    }
  }
}

function closest(elem, selector) {
  var matchesSelector = elem.matches ||
          elem.webkitMatchesSelector ||
             elem.mozMatchesSelector ||
             elem.msMatchesSelector;
  while (elem) {
    if (matchesSelector.bind(elem)(selector)) {
      return elem;
    } else {
      elem = elem.parentElement;
    }
  }
  return false;
}


