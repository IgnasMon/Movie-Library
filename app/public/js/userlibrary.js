function fetchLibrary() {
    fetch("http://localhost/api/library", {
        method: "POST",
        body: JSON.stringify({
            userId: userId
        }),
        headers: {
            "Content-Type": "application/json; charset=UTF-8"
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        const movieList = document.getElementById("movie-list");

        /* Clear previous */
        movieList.innerHTML = "";

        data.forEach(movie => {
            const listItem = document.createElement("li");
            listItem.textContent = movie.title;
            movieList.appendChild(listItem);
        });
    })
    .catch(error => console.error('Error fetching data:', error));
}