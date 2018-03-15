DBINFO=dbinfo.inc

# initializes and pulls git files from any submodules
initSubmodules:
	git submodule update --init --recursive

# start docker container
# note: run 'make build' before using this the first time
up: res/docker-compose.yml
	echo "http://localhost:8000" > inc/.siteurl # used to resolve css/js addresses
	docker-compose -f res/docker-compose.yml up

# attaches to a command line on the apache linux container
bind:
	docker exec -ti tutorhubApache /bin/bash

# creates a inc/dbinfo.inc file based on the default credentials (should match those in res/docker-compose.yml)
dbinfo:
	echo "<?php" > ${DBINFO}
	echo "   \$$host = 'localhost'" >> ${DBINFO}
	echo "   \$$user = 'csci311c'" >> ${DBINFO}
	echo "   \$$password = 'semisecret'" >> ${DBINFO}
	echo "   \$$database = 'csci311c'" >> ${DBINFO}
	echo "?>" >> ${DBINFO}
