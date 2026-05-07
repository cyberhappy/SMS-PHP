var toggle = document.getElementById("flexSwitchCheckChecked");

// Load theme + sync switch
var theme = localStorage.getItem("theme") || "light";
document.body.dataset.bsTheme = theme;
if (toggle) toggle.checked = theme === "dark";

// Toggle theme
function myFunction() {
  var t = document.body.dataset.bsTheme === "light" ? "dark" : "light";
  document.body.dataset.bsTheme = t;
  localStorage.setItem("theme", t);
  if (toggle) toggle.checked = t === "dark";
}

// Keep your function
function stepFunction(event) {
  var el = document.getElementsByClassName("collapse");
  for (var i = 0; i < el.length; i++) {
    if (el[i] !== event.target.ariaControls) {
      el[i].classList.remove("show");
    }
  }
}