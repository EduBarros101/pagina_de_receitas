const commentStarsContainer = document.querySelector(
  '#comment-stars-container'
);

function createStars() {
  let starsQty = 5;

  for (let i = 0; i < starsQty; i++) {
    let templateBlackStar = `
    <i class="fa-notdog fa-solid fa-star" data-index="${i}"></i>
    `;

    commentStarsContainer.innerHTML += templateBlackStar;
  }

  const starsArray = Array.from(commentStarsContainer.querySelectorAll('i'));

  console.log(starsArray);

  starsArray.forEach((element, i) => {
    element.addEventListener('click', () => {
      console.log(`clicou na estrela ${i}`);

      starsArray[i].style.color = '#ffd43b';
    });
  });
}

export default createStars;
