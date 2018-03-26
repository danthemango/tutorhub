###############################################
## Filename:   Makefile
## Author:     Daniel Guenther (565154853)
## Date:       Spring 2018
## Modified 	2018-03-25 by Dan: added more targets
## Class:      CSCI 311
## Project:    Tutorhub
## Group:    	SCAD (group C, with Sami, Camille, Angelo and Dan)
## Purpose:    To run basic setup scripts for our project
##					(and hopefully allow it to be portable to other systems)
###############################################

help:
	@echo "Tutorhub make command usage:"
	@echo "make init: initialize servers and database"
	@echo "make dbinfo: creates dbinfo file for this example"
	@echo "make up: start apache and sql docker containers after init"
	@echo "make bindbindApache: connect to the apache docker container"
	@echo "make bindbindMysql: connect to the mysql docker container"

# initializes and pulls git files from any submodules
init: inc/dbinfo.inc
	git submodule update --init --recursive

# creates a inc/dbinfo.inc file based on the default credentials (should match those in res/docker-compose.yml)
inc/dbinfo.inc:
	@echo "creating example inc/dbinfo.inc for the docker system"
	@echo "please edit this file if you are planning on using it on your own installation"
	@echo "(e.g. for the VIU group projects)"
	@echo with the actual credentials you plan to use
	@echo "<?php" > inc/dbinfo.inc
	@echo "   \$$host = 'tutorhubDb';" >> inc/dbinfo.inc
	@echo "   \$$user = 'csci311c';" >> inc/dbinfo.inc
	@echo "   \$$password = 'semisecret';" >> inc/dbinfo.inc
	@echo "   \$$database = 'csci311c';" >> inc/dbinfo.inc
	@echo "?>" >> inc/dbinfo.inc

##########################
##### DOCKER TARGETS #####
##########################

# build docker container
build: ops/docker-swarm.yml
	docker-compose --file ops/docker-swarm.yml build

# start docker container
up: ops/docker-swarm.yml
	docker-compose --file ops/docker-swarm.yml up -d

down:	ops/docker-swarm.yml
	docker-compose --file ops/docker-swarm.yml down

# attaches to a command line on the containers
bindApache:
	docker exec -ti tutorhubApache /bin/bash

bindDb:
	docker exec -ti tutorhubDb /bin/bash

# remove tutorhub containers
rm:
	docker rm $$(docker ps -qaf 'name=tutorhub*')
