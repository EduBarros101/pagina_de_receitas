const likeButton = document.querySelector('#like-button');
const likeCounter = document.querySelector('#like-counter');
let counter = 0;

function like() {
  likeButton.addEventListener('click', () => {
    ++counter;

    likeCounter.innerHTML = counter;
  });
}

export default like;

// posso implementar um fetch para salvar as curtidas no banco de dados futuramente refatorando o código do botão de curtir que já existe na página da receita
