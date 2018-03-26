# TutorHub
The student - tutor matchup website

## Pages
- index.php:   front page of tutorhub
- search.php:  get search results
- profile.php: view and edit your profile
- login.php:   login as a tutor
- signup.php:  signup as a tutor

## Directories
- res: resources. Any libraries and frameworks (e.g. jQuery, Bootstrap)
- inc: inclusions. Php files which aren't full pages (i.e. headers, footers, database-related)
- img: images
- css: styling
- js:  frontend code
- ops: operations (e.g. resetting the database, creating dummy data, etc.)

## Usage
To set up your own copy of this website to host / develop / test:
- clone directory: `git clone https://github.com/danthemango/tutorhub`
- open directory: `cd tutorhub`
- pull submodules: `git submodule update --init --recursive`
- create file for SQL credentials in `inc/dbinfo.inc` with the server-side credentials:
   - (or run `make dbinfo` to use the docker-compose defaults)
```php
<?php
   $host = 'HOST';
   $user = 'USER';
   $password = 'PASSWORD';
   $database = 'DATABASE';
?>
```

### Docker-Compose
The file ops/docker-swarm.yml specifies the basic container building routines needed for this project.

#### Container Startup
Assuming:
- You have [Docker](https://www.docker.com/) installed
- [Docker-Compose](https://docs.docker.com/compose/) installed
- Bash, Git, and Make installed
- [clone this repository and initialized submodules](#usage)

Then you may use the Makefile provided in in this reposity to startup the containers with a handful of targets:
1. Create the credentials file: `make inc/dbinfo.inc`
   - Used to connect the php code with the database. Please change credentials before deployment.
1. Create the containers: `make build`
1. Activate the containers: `make up`

#### Container Management
Once the containers are activated the website may be loaded on a browser at address '127.0.0.1:8000'.
- use `make bindApache` to open a bash terminal on the Apache server
- use `make bindDb` to open a bash terminal on the Apache server
- use `make down` to turn the containers off
- use `make rm` to delete the containers
