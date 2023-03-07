document.querySelectorAll('.titleQuestion').forEach(item => {

    item.addEventListener('click', function () {
        //get the next element
        let elem = this.nextElementSibling;
        elem.classList.toggle('displayQuestion');
        //change the arrow
        let arrow = this.querySelector('.arrow');
        arrow.classList.toggle('arrowDown');
    })
});