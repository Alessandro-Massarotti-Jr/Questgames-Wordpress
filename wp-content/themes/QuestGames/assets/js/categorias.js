jQuery(document).ready(function( $ ) {
const cards = document.querySelectorAll('.categoryCard');
const filterInput = document.querySelector('#filterCategoryByName');

filterInput.addEventListener('change',()=>{
    cards.forEach(card =>{
        const categoryName = card.getAttribute('cardName');
        const categoryNameLower = categoryName.toLowerCase();
        const inputValue = filterInput.value;
        const inputValueLower = inputValue.toLowerCase();
        if(categoryNameLower.includes(inputValueLower)){
          card.classList.add('active')
        }
        else{
            card.classList.remove('active')
        }
    })
});

});