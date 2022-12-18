
// Top Collections

document.getElementById('next').onclick = function (e) {
    e.preventDefault();
    let lists = document.querySelectorAll('.container__slideCol-item');
    document.getElementById('slideS').appendChild(lists[0]);
}

document.getElementById('prev').onclick = function (e) {
    e.preventDefault();
    let lists = document.querySelectorAll('.container__slideCol-item');
    document.getElementById('slideS').prepend(lists[lists.length - 1]);
}


setInterval(function(){
    var slideTop = document.querySelectorAll('.container__slideCol-item');
    document.getElementById('slideS').appendChild(slideTop[0]);
},3000);
// New Arrivals Collection slide

document.getElementById('nextNew').onclick = function (e) {
    e.preventDefault();
    let colLists = document.querySelectorAll('.container__newArrivals-collection-list');
    document.getElementById('colListNew').appendChild(colLists[0]);
}

document.getElementById('prevNew').onclick = function (e) {
    e.preventDefault();
    let colLists = document.querySelectorAll('.container__newArrivals-collection-list');
    document.getElementById('colListNew').prepend(colLists[colLists.length - 1]);
}


