import createStars from './stars.js';
import like from './like.js';

const commentForm = document.querySelector('#comment-form');
const commentArea = document.querySelector('#comment');
const commentPost = document.querySelector('#comments');
const formButton = document.querySelector('#form-button');

createStars();

function renderComments(comment) {
  const templateHTML = `
    <div>
      <h4>Fulano da Silva</h4>
      <p>${comment.txt_comentario}</p>
    </div>
  `;

  commentPost.insertAdjacentHTML('afterbegin', templateHTML);
}

function renderLikeButton() {
  const likeContainer = document.querySelector('#like-container');
  if (!likeContainer) return;

  const likeButtonHTML = `
    <button id="like-button" class="like-button" type="button">
      <i class="fa-regular fa-thumbs-up"></i>
    </button>
  `;

  likeContainer.innerHTML = likeButtonHTML;
}

renderLikeButton();
like();

function comments() {
  if (!commentPost || !commentArea || !commentForm) return;

  commentForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const avaliacao = Number(formButton.getAttribute('data-btnid'));
    const commentText = commentArea.value;
    const recipeId = new URLSearchParams(window.location.search).get('id');
    const likeButton = document.querySelector('#like-button');
    const isLiked = likeButton ? likeButton.classList.contains('liked') : false;

    if (!commentText.trim() || !recipeId || avaliacao === 0) {
      alert('Não é possível enviar um comentário vazio ou sem avaliação.');
      return;
    }

    const commentData = {
      action: 'add_comment_like',
      comment: commentText,
      recipeId: recipeId,
      avaliacao: avaliacao,
      isLiked: isLiked,
    };

    fetch('../api/api.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(commentData),
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error('A resposta da rede não foi OK');
        }
        return response.json();
      })
      .then((newComment) => {
        renderComments(newComment);

        commentArea.value = '';
        formButton.setAttribute('disabled', true);
        const starsArray = document.querySelectorAll(
          '#comment-stars-container i'
        );
        starsArray.forEach((star) => (star.style.color = '#000000'));

        if (likeButton && isLiked) {
          likeButton.click();
        }

        if (isLiked) {
          const likeCounterSpan = document.querySelector('#like-counter span');

          if (likeCounterSpan) {
            const currentLikes = parseInt(likeCounterSpan.textContent, 10);

            likeCounterSpan.textContent = currentLikes + 1;
          }
        }
      })
      .catch((error) => {
        console.error('Erro ao enviar comentário: ', error);
        alert('Não foi possível enviar seu comentário. Tente novamente.');
      });
  });
}

export default comments;
