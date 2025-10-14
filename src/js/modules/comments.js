const commentForm = document.querySelector('#comment-form');
const commentArea = document.querySelector('#comment');
const commentPost = document.querySelector('#comments');
const formButtom = document.querySelector('#form-buttom');

function renderComments(comment) {
  const templateHTML = `
    <div>
      <h4>Fulano da Silva</h4>
      <p>${comment.txt_comentario}</p>
    </div>
  `;

  commentPost.insertAdjacentHTML('afterbegin', templateHTML);
}

function comments() {
  if (!commentPost || !commentArea || !commentForm) return;

  commentForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const avaliacao = Number(formButtom.getAttribute('data-btnid'));

    const commentText = commentArea.value;
    const recipeId = new URLSearchParams(window.location.search).get('id');

    // Para não receber comentários vazios. Posso pensar em algo mais visual para o usuário em outro momento.
    if (!commentText.trim() || !recipeId) return;

    const commentData = {
      comment: commentText,
      recipeId: recipeId,
      avaliacao: avaliacao,
    };

    fetch('../api/api.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(commentData),
      // });
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
      })
      .catch((error) => {
        console.error('Erro ao enviar comentário: ', error);
        alert('Não foi possível enviar seu comentário. Tente novamente.');
      });
  });
}

export default comments;
