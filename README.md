# Movie.io - movie library website

[Github Repository](https://github.com/IgnasMon/Java2.1InhollandFinalAssignment)

## Project Details

### Startup steps

- Clone the project from [Github Repository](https://github.com/IgnasMon/Java2.1InhollandFinalAssignment).
- Open the project using desired IDE _(This was developed in [IntelliJ](https://www.jetbrains.com/idea/))_.
- Open terminal in the root of the project _(Should see files and directories like __app__, __sql__, this __README.md__)_.
- Be sure that you have [Docker Desktop](https://www.docker.com/products/docker-desktop/) running!
- In the terminal type:

```bash
docker compose up
```

- Wait until it finishes initializing.
- Visit the website using http://localhost
- To close the project in the terminal click CTRL+C two times

### Available Authorized Logins

#### System 

- __username:__ system, 
- __password:__ systempass

#### Admin

- __username:__ admin,
- __password:__ admin

#### User

- Not created on start, you can try registering through the page.

### SQL population file location:

In case, it doesn't automatically populate the database, you can use __sql/init.sql__ file and import it into [PHPMyAdmin](http://localhost:8080).

## API Endpoints

- __/api/movies__ 
<p>for all movie entries.</p>

- __/api/movies/movie__ 
<p>POST Method with parameter _movieId_ will retrieve that specific movie.</p>

- __/api/movies/movie?movieId=_{movie number}___ 
<p>GET Method with parameter _movieId_ will retrieve that specific movie.</p>

- __/api/library__
<p>POST Method with JSON containing <b>userId</b> as property</p>

## Author and Credits

- Based on - [PHP MVC Basic](https://github.com/ahrnuld/php-mvc-basic) project by Ahrnuld.
- Idea and Realization - by [Ignas Montvydas](https://github.com/IgnasMon)