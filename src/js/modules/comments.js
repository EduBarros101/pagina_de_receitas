const commentForm = document.querySelector('#comment-form');
const commentArea = document.querySelector('#comment');
const commentPost = document.querySelector('#comments');

function comments() {
  if (!commentPost || !commentArea || !commentForm) return;

  commentForm.addEventListener('submit', function (e) {
    // validar os comentários
    e.preventDefault();

    let user = 'fulano';
    let comment = commentArea.value;

    let templateHTML = `
      <div>
        <h4>${user}</h4>
        <p>${comment}</p>
      </div>
    `;

    commentPost.insertAdjacentHTML('afterbegin', templateHTML);

    commentArea.value = '';
  });
}

export default comments;
