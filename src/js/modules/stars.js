function createStars() {
  let starsQty = 5;
  let htmlString = '';
  const commentStarsContainer = document.querySelector(
    '#comment-stars-container'
  );

  for (let i = 0; i < starsQty; i++) {
    htmlString += `
    <i class="fa-notdog fa-solid fa-star" data-index="${i}"></i>
    `;
  }

  commentStarsContainer.innerHTML = htmlString;

  const starsArray = commentStarsContainer.querySelectorAll('i');

  console.log(starsArray);

  starsArray.forEach((clickedStar) => {
    clickedStar.addEventListener('click', () => {
      const clickedIndex = parseInt(clickedStar.dataset.index);

      starsArray.forEach((star, currentIndex) => {
        if (currentIndex <= clickedIndex) {
          star.style.color = '#ffd43b';
        } else {
          star.style.color = '#000000';
        }
      });
    });
  });
}

export default createStars;
