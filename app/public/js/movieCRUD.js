/* Get the fields from API Endpoint and Insert specific movie data into the form using JS */
document.addEventListener("DOMContentLoaded", function() {
    if (typeof movieId !== 'undefined') {
        fetch(`http://localhost/api/movies/movie?movieId=${movieId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                /* If you get an array you only get the first element */
                const movieData = Array.isArray(data) ? data[0] : data;

                fillFieldsWithValue(movieData);
            })
            .catch(error => console.error('Error fetching movie data:', error));
    }
});

function fillFieldsWithValue(movieData){
    document.getElementById('movieId').value = movieData.id;
    document.getElementById('title').value = movieData.title;
    document.getElementById('ageRating').value = movieData.age_rating;
    document.getElementById('director').value = movieData.director;
    document.getElementById('duration').value = movieData.duration;
    document.getElementById('description').value = movieData.description;

    /* Format the date to inserting it */
    let releaseDateValue = '';
    if (movieData.release_date) {
        const releaseDate = new Date(movieData.release_date);
        /* Change the format of the release date */
        releaseDateValue = releaseDate.toISOString().split('T')[0];
    } else {
        /* Default date current date */
        const currentDate = new Date();
        releaseDateValue = currentDate.toISOString().split('T')[0];
    }

    document.getElementById('releaseDate').value = releaseDateValue;
}