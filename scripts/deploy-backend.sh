#!/usr/bin/env bash

# Source and destination directories
echo "... setting the source directory"
source_directory="/var/www/nairaboom.com.ng/public_html"

echo "... setting the destination directory"
destination_directory="/var/www/nairaboom.com.ng/public_html/nairaboom-backup"

# Excluded folder
echo "... excluding not required directories"
excluded_folder="nairaboom-backup"

echo "... clearing session files"
find /var/www/nairaboom.com.ng/public_html/writable/session/ -type f -not -name 'index.html' -delete

# Use rsync to copy files, excluding the specified folder
echo "... copying the files"
rsync -av --exclude="$excluded_folder" "$source_directory/" "$destination_directory/"

echo "Changing directory to $1"
cd /var/www/nairaboom.com.ng/public_html

echo "Unzipping deployment file"
unzip $1 -d nairaboom

echo "Removing old redundant deployment if found"
rm -r app config scripts template tests vendor


echo "Copying new files to current directory"
#mv nairaboom/* .
rsync -av nairaboom/* . --remove-source-files

echo "renaming envlive to .env"
mv envlive .env

# rsync -a nairaboom/public/ ./public/
# rsync -a nairaboom/writable/ ./writable/

echo "Removing deployment archive"
rm -r nairaboom/ $1

echo "Done"
