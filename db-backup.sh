#!/bin/bash
DATE=$(date +%s)
## Check for Database backup folder
if !
## Check for Database installation

## Backup all current Databases
date +%s

mysqldump -- all-databases > ${DATE}-dbbackup.sql 
## Verify file is saved in correct folder 
