const commentStarsContainer = document.querySelector(
  '#comment-stars-container'
);
const formButton = document.querySelector('#form-button');

function createStars() {
  let starsQty = 5;
  let htmlString = '';
  formButton.setAttribute('disabled', true);

  for (let i = 0; i < starsQty; i++) {
    htmlString += `
    <i class="fa-notdog fa-solid fa-star" data-index="${i}"></i>
    `;
  }

  commentStarsContainer.innerHTML = htmlString;

  const starsArray = commentStarsContainer.querySelectorAll('i');

  starsArray.forEach((clickedStar) => {
    clickedStar.addEventListener('click', () => {
      formButton.removeAttribute('disabled');
      const clickedIndex = parseInt(clickedStar.dataset.index);
      const starValue = clickedIndex + 1;
      formButton.setAttribute('data-btnid', starValue);

      starsArray.forEach((star, currentIndex) => {
        if (currentIndex <= clickedIndex) {
          // alterar a classe para chamar a cor via JS
          star.style.color = '#ffd43b';
        } else {
          star.style.color = '#000000';
        }
      });
    });
  });
}

export default createStars;
