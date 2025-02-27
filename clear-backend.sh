#!/usr/bin/env bash

echo "... clearing cache files"
find writable/cache/ -type f -not -name 'index.html' -delete

echo "... clearing debugbar files"
find writable/debugbar/ -type f -not -name 'index.html' -delete

echo "... clearing logs files"
find writable/logs/ -type f -not -name 'index.html' -delete

echo "... clearing session files"
find writable/session/ -type f -not -name 'index.html' -delete

# echo "... zipping and uploading files to the server"
# zip -r nairaboom.zip . -x \.env \*.git\* -x "vendor/*" -x "writable/uploads/*" -x "public/uploads/*" \
# && gcloud compute scp --project="nairaboom-be" --zone="europe-west1-b" nairaboom.zip \
# nairaboom-php-server:/var/www/nairaboom.com.ng/public_html && rm nairaboom.zip

