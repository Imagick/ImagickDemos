# This script assumes that there is already a user called 'intahwebz' that 
# belongs to the 'www-data' group

# Create a directory for the files to live in
cd /home
mkdir imagick-demos
chown intahwebz:www-data imagick-demos

#Become the user the files will be run under
su intahwebz

cd /home/imagick-demos

#Get the files
git clone https://github.com/Danack/Imagick-demos imagick-demos/

