window.addEventListener("DOMContentLoaded", function() {
  var elems = document.querySelectorAll(".ajax");
  var output = document.getElementById("output");

  const ajax = new XMLHttpRequest();
  ajax.addEventListener("readystatechange", function() {
    if (this.readyState == 4 && this.status == 200) {
      output.innerHTML = this.responseText;
    }
  });

  function loadHTML(evt) {
    ajax.open("GET", this.href, true);
    ajax.send();
    evt.preventDefault();
    localStorage.setItem('ajax-used-to', this.href)
  }

  elems.forEach(elem => {
    elem.addEventListener("click", loadHTML);
  });
  
  function rememberLoad(link) {
    ajax.open("GET", link, true);
    ajax.send();
    evt.preventDefault();
  }

  var needAJAX = localStorage.getItem('ajax-used-to');
  if (needAJAX) {
    rememberLoad(needAJAX);
  }
});