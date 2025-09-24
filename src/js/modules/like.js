const likeButton = document.querySelector('#like-button');
const likeCounter = document.querySelector('#like-counter');
let counter = 0;

function like() {
  likeButton.addEventListener('click', () => {
    console.log('teste');
    ++counter;

    likeCounter.innerHTML = counter;
  });
}

export default like;
