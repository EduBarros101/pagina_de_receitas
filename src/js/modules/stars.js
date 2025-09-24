const commentStarsContainer = document.querySelector(
  '#comment-stars-container'
);

function createStars() {
  let stars = 5;

  for (let i = 0; i < stars; i++) {
    let templateBlackStar = `
        <i class="fa-notdog fa-solid fa-star" data-index="${i}"></i>
    `;

    commentStarsContainer.innerHTML += templateBlackStar;

    console.log(templateBlackStar);
  }
}

export default createStars;
