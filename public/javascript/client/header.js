// Menu Sidebar

document.getElementById('openMenu').onclick = function (e) {
    e.preventDefault();
    document.getElementById('header__side').classList.toggle('activeMenu');

}

document.getElementById('closeMenu').onclick = function (e) {
    e.preventDefault();
    document.getElementById('header__side').classList.toggle('activeMenu');
    document.getElementById('drop1').classList.remove('header__side-category-active');
    document.getElementById('drop2').classList.remove('header__side-collection-active');
    document.getElementById('drop3').classList.remove('header__side-brand-active');
    document.getElementById('dropdown2').classList.remove('icon2');
    document.getElementById('dropdown1').classList.remove('icon1');
    document.getElementById('dropdown3').classList.remove('icon3');
}

document.getElementById('dropdown1').onclick = function (e) {
    e.preventDefault();
    document.getElementById('drop1').classList.toggle('header__side-category-active');
    document.getElementById('dropdown1').classList.toggle('icon1');
    document.getElementById('drop2').classList.remove('header__side-collection-active');
    document.getElementById('drop3').classList.remove('header__side-brand-active');
}

document.getElementById('dropdown2').onclick = function (e) {
    e.preventDefault();
    document.getElementById('drop2').classList.toggle('header__side-collection-active');
    document.getElementById('dropdown2').classList.toggle('icon2');
    document.getElementById('drop1').classList.remove('header__side-category-active');
    document.getElementById('drop3').classList.remove('header__side-brand-active');
}

document.getElementById('dropdown3').onclick = function (e) {
    e.preventDefault();
    document.getElementById('drop3').classList.toggle('header__side-brand-active');
    document.getElementById('dropdown3').classList.toggle('icon3');
    document.getElementById('drop1').classList.remove('header__side-category-active');
    document.getElementById('drop2').classList.remove('header__side-collection-active');
}

// topUpdate

setInterval(function(){
    var update = document.querySelectorAll('.header__update-1');
    document.getElementById('topUpdate').appendChild(update[0]);
},3000);


// show log

document.getElementById('log').onclick = function (e) {
    e.preventDefault();
    document.getElementById('openLog').classList.toggle('active');
    document.getElementById('shoppingCart').classList.remove('activeCart');
}

// shoppingCart

document.getElementById('showCart').onclick = function (e) {
    e.preventDefault();
    document.getElementById('shoppingCart').classList.toggle('activeCart');
    document.getElementById('openLog').classList.remove('active');

}

document.getElementById('hideCart').onclick = function (e) {
    e.preventDefault();
    document.getElementById('shoppingCart').classList.toggle('activeCart');
    document.getElementById('openLog').classList.remove('active');
}
