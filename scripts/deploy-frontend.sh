#!/usr/bin/env bash

# Source and destination directories
echo "... setting the source directory"
source_directory="/var/www/nairaboom.ng/public_html"

echo "... setting the destination directory"
destination_directory="/var/www/nairaboom.ng/fe-backup"
dump_destination_directory="/var/www/nairaboom.ng/public_html/dump"

# Excluded folder
echo "... excluding not required directories"
excluded_folder="fe-backup"

# Use rsync to copy files, excluding the specified folder
echo "... copying the files"
rsync -av "$source_directory/" "$destination_directory/"

echo "... running the deployment script"
echo "Changing directory to /var/www/nairaboom.ng/public_html"
cd /var/www/nairaboom.ng/public_html

echo "Removing old files in directory"
find . -type f -not -name '*.zip' -delete

echo "Unzipping deployment file $1"
unzip $1

echo "Copying new files"
#mv out/* .
rsync -av out/* . --remove-source-files

echo "Removing temporary files and archives"
rm -r out/ $1

