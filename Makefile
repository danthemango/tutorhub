# start docker container
# note: run 'make build' before using this the first time
up: res/docker-compose.yml
	echo "http://localhost:8000" > inc/.siteurl # used to resolve css/js addresses
	docker-compose -f res/docker-compose.yml up

# attaches to a command line on the apache linux container
bind:
	docker exec -ti tutorhubApache /bin/bash
