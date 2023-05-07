window.addEventListener("DOMContentLoaded", function() {
  const deleters = this.document.querySelectorAll("#deleteParent");

  deleters.forEach(deleter => {
    var parent = deleter.parentElement;
    deleter.addEventListener("click", function() {
      parent.classList.add("go-out");
      setTimeout(() => {
        parent.remove();
      }, 300);
    });
  });
});
