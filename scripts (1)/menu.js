var m = document.getElementById('menu-trigger');
var s = document.getElementById('sidebar');
var zmdi = document.getElementById('profile-info');
var pm = document.getElementById('profile-menu');
var mmu = document.getElementById('main-menu-user');
window.onload = function() {
    if(window.innerWidth<=691)
    {m.classList.remove('open');
    s.classList.remove('toggled');}
else {
    m.classList.add('open');
    s.classList.add('toggled');}
};

window.onresize = function() {
    if(window.innerWidth<=691)
    {m.classList.remove('open');
    s.classList.remove('toggled');}
else {
    m.classList.add('open');
    s.classList.add('toggled');}
};
m.onclick = function() {
  if (m.classList.contains('open') === true) {
    m.classList.remove('open');
    s.classList.remove('toggled');
  } else {
    m.classList.add('open');
    s.classList.add('toggled');
  }
};

function togglesubmenu() {
  if (pm.classList.contains('toggled') === true) {
    pm.classList.remove('toggled');
    mmu.classList.remove('toggled');
  } else {
    pm.classList.add('toggled');
    mmu.classList.add('toggled');
  }
}


