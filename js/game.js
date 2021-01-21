'use strict';


function ready() {
    let cards = document.querySelectorAll('.card');

    cards.forEach(card => {
        card.children[1].addEventListener('click', function() {
            this.parentElement.classList.toggle('selected');
        });
    });
}

document.addEventListener('DOMContentLoaded', ready);


function cardSelect() {

}

document.addEventListener('DOMContentLoaded', ready);