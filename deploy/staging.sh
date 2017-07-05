now="$(date +'%d/%m/%Y/%r')"
echo $now

# remove wordpress uploads
rm -rf ./wp-content/uploads/

# copy all files to temporary dist folder
rsync -av --exclude ./dist ./ ./dist


# make a new git repo
cd ./dist
rm -rf .git
git init .

# deploy
git add --all
git commit -m "$now"
git remote add deploy ubuntu@54.255.203.71:/home/ubuntu/staging.git

git push deploy master --force

# reset everything
cd ../
rm -rf ./dist
git checkout ./
