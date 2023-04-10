const rating = document.querySelector('#rating');
rating.value = 5;
const ratingValue = document.querySelector('#ratingValue');
ratingValue.textContent = rating.value;
rating.addEventListener('input', () => {
    ratingValue.textContent = rating.value;
});