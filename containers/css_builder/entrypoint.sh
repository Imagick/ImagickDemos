
cd /var/app/app

# Update is done in the JS container currently.
# echo "Updating/installing npm modules"
# npm update

echo "Running sass builder"

npm run sass:build:watch