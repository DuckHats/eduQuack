const card = document.getElementById('card');
const likeButton = document.getElementById('like');
const dislikeButton = document.getElementById('dislike');

likeButton.addEventListener('click', () => {
    card.style.transform = 'translate(500px) rotate(30deg)';
    setTimeout(() => {
        card.style.transform = 'none';
    }, 300);
});

dislikeButton.addEventListener('click', () => {
    card.style.transform = 'translate(-500px) rotate(-30deg)';
    setTimeout(() => {
        card.style.transform = 'none';
    }, 300);
});
