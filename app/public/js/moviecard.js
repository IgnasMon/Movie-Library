/* Hover over card effect and display button while hovering */
document.addEventListener("DOMContentLoaded", function() {
    const movieCards = document.querySelectorAll('.movie_card');

    movieCards.forEach(function(card) {
        const addButton = card.querySelector('button');

        // Initially hide the button
        addButton.style.display = 'none';

        card.addEventListener('mouseover', function() {
            card.style.opacity = '0.7';
            addButton.style.display = 'block';
        });

        card.addEventListener('mouseout', function() {
            card.style.opacity = '1';
            addButton.style.display = 'none';
        });
    });
});

function addMovieToLibrary(userId, movieId) {
    fetch("http://localhost/api/library/add", {
        method: "POST",
        body: JSON.stringify({
            userId: userId,
            movieId: movieId
        }),
        headers: {
            "Content-Type": "application/json; charset=UTF-8"
        }
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to add movie to library');
            }
            console.log('Movie added to library successfully');
        })
        .catch(error => {
            console.error('Error adding movie to library:', error);
        });
}