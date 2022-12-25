document.getElementById('edit').onclick = function (e) {
    e.preventDefault();
    document.getElementById('showEdit').classList.add('active');
    document.getElementById('showOff').classList.add('off');
}

document.getElementById('offEdit').onclick = function (e) {
    e.preventDefault();
    document.getElementById('showEdit').classList.remove('active');
    document.getElementById('showOff').classList.remove('off');
}
