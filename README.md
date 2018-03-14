# tutorhub
The student - tutor matchup website

## pages
- index.php:   front page of tutorhub
- search.php:  get search results
- profile.php: view and edit your profile
- login.php:   login as a tutor
- signup.php:  signup as a tutor

## directories
- res: resources. Any libraries and frameworks (e.g. jQuery, Bootstrap)
- inc: inclusions. Php files which aren't full pages (i.e. headers, footers, database-related)
- img: images
- css: styling
- js:  frontend code

## using docker-compose
Assuming you have [Docker](https://www.docker.com/) and [Docker-Compose](https://docs.docker.com/compose/) installed then run `docker-compose -f res/docker-compose.yml up` to spin up an Apache and a MySQL container for local development, which should provide access to the website via localhost:8000
