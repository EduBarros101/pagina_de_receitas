const commentForm = document.querySelector('#comment-form');
const commentArea = document.querySelector('#comment');

const commentPost = document.getElementById('comments');

console.log(commentArea);

function comments(teste) {
  if (!commentForm || !commentArea || !commentPost) return;

  console.log(teste);
}

export default comments;
