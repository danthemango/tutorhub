#!/usr/local/bin/bash
###############################################
## Filename:   post-recevie
## Author:     Daniel Guenther (565154853)
## Date:       Spring 2018
## Modified    -
## Class:      CSCI 311
## Project:    Tutorhub
## Group:      SCAD (group C, with Sami, Camille, Angelo and Dan)
## Purpose:    To load-up files after git push
###############################################

echo "checking out branch into ~/public_html"
git --work-tree=/home/student/csci311c/public_html/ --git-dir=/home/student/csci311c/tutorhub.git/ checkout -f
echo "setting permissions for html/css/js/images:  644"
find /home/student/csci311c/public_html/ -iname "*.html" -o -iname "*.css" -o -iname "*.js" -o -iname "*.jpeg" -o -iname "*.jpg" -o -iname "*.png" | xargs chmod 644
echo "setting permissions for public folders: 755"
find /home/student/csci311c/public_html/ -type d | xargs chmod 755
echo "setting permissions for php and server-side scripts 600"
find /home/student/csci311c/public_html/ -iname "*.php" -o -iname "*.inc" | xargs chmod 600
