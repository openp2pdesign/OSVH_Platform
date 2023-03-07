![OSVH_Platform](IMG/villagehosts_logo.png)

# Platform for the Open School of Village Hosts - Erasmus+ VET project

## Installation

1. *git clone https://github.com/openp2pdesign/OSVH_Platform.git* (See also all the options for cloning in GitHub) / or Dowloand and unzip the file 
2. modify the usernames and passwords environment files (.env_w, .env_m, .env_l)
3. if using the git repo, create a .gitgnore file with them (.env_w, .env_m, .env_l) in it to avoiding overwriting / committing your passwords
4. Wordpress: copy your plugins/themes/uploads in the *installation/wordpress/wp-content/* folder (in each respective subfolder), and they will be installed - this is especially for proprietary and own content not to be shared
5. Moodle: copy your plugins/themes in the *installation/moodle/* folder (in each respective subfolder), and they will be installed - this is especially for proprietary and own content not to be shared
6. Lanch the containers with *docker-compose up -d*
7. Go to DOMAIN:9000 to create your Portainer admin account
8. ... 
