
// const plus = document.querySelector('.incrementQuantity'),
//     minus = document.querySelector('.decrementQuantity');

var a = document.getElementById('quantity').value;



document.getElementById('incrementQuantity').addEventListener('click', (e) =>
{
    e.preventDefault();
    a++;
    console.log(a   );
});

document.getElementById('decrementQuantity').addEventListener('click', (e) =>
{
    e.preventDefault();
    if(a !== 1){
        a--;
    }
    console.log(a);

});


