function fetchMovies()
{
    fetch("http://localhost/api/movies")
        .then(response => {
            console.log(data);
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => { console.log(data); })
        .catch(error => console.error('Error fetching data:', error));
}
