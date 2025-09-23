const commentForm = document.querySelector('#comment-form');
const commentArea = document.querySelector('#comment');
let commentPost = document.querySelector('#comments');

function comments() {
  // Verificar a implementação da verificação.

  commentForm.addEventListener('submit', function (e) {
    e.preventDefault();

    console.log('testando dentro da função');

    let user = 'fulano';
    let comment = commentArea.value;

    let templateHTML = `
      <div>
        <h4>${user}</h4>
        <p>${comment}</p>
      </div>
    `;

    commentPost.innerHTML += templateHTML;

    commentArea.value = '';
  });

  console.log('testando o final da função');
}

export default comments;
