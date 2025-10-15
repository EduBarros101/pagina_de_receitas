function like() {
  const likeButton = document.querySelector('#like-button');
  if (!likeButton) return;

  likeButton.addEventListener('click', () => {
    likeButton.classList.toggle('liked');

    const icon = likeButton.querySelector('i');
    if (likeButton.classList.contains('liked')) {
      icon.classList.replace('fa-regular', 'fa-solid');
      likeButton.style.backgroundColor = 'orange';
    } else {
      icon.classList.replace('fa-solid', 'fa-regular');
      likeButton.style.backgroundColor = 'peachpuff';
    }
  });
}

export default like;
