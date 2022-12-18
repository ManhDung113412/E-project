$ = function (ID) {
    return document.getElementById(ID);
}

$('returnPolicy').addEventListener('click', function (e) {
    e.preventDefault();
    window.scrollTo(0, 500);
});


$('warranty').addEventListener('click', function (e) {
    e.preventDefault();
    window.scrollTo(0, 1500);
});

$('payment').addEventListener('click', function (e) {
    e.preventDefault();
    window.scrollTo(2000, 2000);
});


$('contact').addEventListener('click', function (e) {
    e.preventDefault();
    window.scrollTo(2500, 2500);
});

