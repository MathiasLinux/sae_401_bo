#!/bin/bash
# Script to install KaiserStuhl Escape web site on Ubuntu server or RHEL server (RHEL, AlmaLinux, RockyLinux, CentOS) or Fedora server
#This script can possibly work on Debian 11, but with an external source for PHP 8.0 or higher

# Change the language of the system
export LC_ALL=C

# Colors
SETCOLOR_FAILURE="\\033[1;31m"
SETCOLOR_SUCCESS="\\033[1;32m"
SETCOLOR_WARNING="\\033[1;33m"
SETCOLOR_NORMAL="\\033[0;39m"
success() {
    echo -e "${SETCOLOR_SUCCESS}$*${SETCOLOR_NORMAL}"
}
error() {
    echo -e "${SETCOLOR_FAILURE}$*${SETCOLOR_NORMAL}"
}
warn() {
    echo -e "${SETCOLOR_WARNING}$*${SETCOLOR_NORMAL}"
}

success '+-----------------------------------------------------------------------------------------------+'
success "| Script to install KaiserStuhl Escape web site                                                 |"
success "| On Ubuntu server or RHEL server (RHEL, AlmaLinux, RockyLinux, CentOS) or Fedora server        |"
success "| This script can possibly work on Debian 11, but with an external source for PHP 8.0 or higher |"
success '+-----------------------------------------------------------------------------------------------+'

# check for root access
SUDO=
if [ "$(id -u)" -ne 0 ]; then
    SUDO=$(command -v sudo 2> /dev/null)

    if [ ! -x "$SUDO" ]; then
        echo "Error: Run this script as root with 'sudo' or as root user. Aborting..."
        exit 1
    fi
fi

check_cmd() {
    command -v "$1" 2> /dev/null
}

# Install dependencies for Debian based systems
install_apt() {
if check_cmd apt-get; then
    # Update the package list and upgrade all packages
    warn "Updating the package list and upgrading all packages..."
    $SUDO apt-get -qq update
    $SUDO apt-get -qq upgrade -y
    # Check if the php version in the repository is superior to 8.0
    # shellcheck disable=SC2046
    if [ $(apt-cache policy php | grep -Eo '8\.[0-9]+' | head -n 1 | cut -d '.' -f 2) -ge 0 ]; then
        # Install the dependencies for a LAMP stack
        warn "Installing the dependencies for a LAMP stack..."
        $SUDO apt-get -qq install -y apache2 php libapache2-mod-php mariadb-server php-mysql
        # Install the dependencies for the web application
        $SUDO apt-get -qq install -y php-curl php-gd php-intl php-json php-mbstring php-xml php-zip
        # Install git and unzip
        $SUDO apt-get -qq install -y git unzip
        warn "Enabling the apache2 and mariadb services..."
        # Launch and enable the apache2 service
        $SUDO systemctl enable --now apache2.service
        # Launch and enable the mariadb service
        $SUDO systemctl enable --now mariadb.service
        # Enable the firewall
        # check if ufw is installed
        if check_cmd ufw; then
            $SUDO ufw allow in "Apache Full"
        fi
        # check if firewalld is installed
        if check_cmd firewall-cmd; then
            $SUDO firewall-cmd --permanent --add-service=http
            $SUDO firewall-cmd --permanent --add-service=https
            $SUDO firewall-cmd --reload
        fi
    else
        error "PHP 8.0 is not available in the repository of your distribution. Please install it manually. Aborting..."
        exit 1
    fi
    
    
fi
}

# Install dependencies for RedHat based systems
install_yum() {
if check_cmd yum; then
    # Update the package list and upgrade all packages
    warn "Updating the package list and upgrading all packages..."
    $SUDO yum update -y
    # check if the rhel version is 8
    # shellcheck disable=SC2046
    if [ $(cat /etc/redhat-release | grep -Eo '[0-9]+' | head -n 1) -eq 8 ]; then
        # enable the php 8.0 module
        $SUDO yum module enable -y php:8.0
    fi
    # Check if the php version in the repository is superior to 8.0
    # shellcheck disable=SC2046
    if [ $(yum list php | grep -Eo '8\.[0-9]+' | head -n 1 | cut -d '.' -f 2) -ge 0 ]; then
        # Install the dependencies for a LAMP stack
        warn "Installing the dependencies for a LAMP stack..."
        $SUDO yum install -y httpd php mariadb mariadb-server php-{gd,pdo,xml,mbstring,zip,mysqlnd,opcache,json} mod_ssl openssl
        # Install git and unzip
        $SUDO yum install -y git unzip
        warn "Enabling the apache2, php-fpm and mariadb services..."
        # Launch and enable the apache2 service
        $SUDO systemctl enable --now httpd.service
        # Launch and enable the php-fpm service
        $SUDO systemctl enable --now php-fpm.service
        # Launch and enable the mariadb service
        $SUDO systemctl enable --now mariadb.service
        # Enable the firewall
        $SUDO firewall-cmd --permanent --add-service=http
        $SUDO firewall-cmd --permanent --add-service=https
        $SUDO firewall-cmd --reload
    else
        error "PHP 8.0 is not available in the repository of your distribution. Please install it manually. Aborting..."
        exit 1
    fi
fi
}

# Install dependencies for Fedora based systems
install_dnf() {
if check_cmd dnf; then
    # Update the package list and upgrade all packages
    warn "Updating the package list and upgrading all packages..."
    $SUDO dnf update -y
    # Check if the php version in the repository is superior to 8.0
    # shellcheck disable=SC2046
    if [ $(dnf list php | grep -Eo '8\.[0-9]+' | head -n 1 | cut -d '.' -f 2) -ge 0 ]; then
        # Install the dependencies for a LAMP stack
        warn "Installing the dependencies for a LAMP stack..."
        $SUDO dnf install -y httpd php mariadb php-{gd,pdo,xml,mbstring,zip,mysqlnd,opcache,json} mod_ssl openssl
        # Install git and unzip
        $SUDO dnf install -y git unzip
        warn "Enabling the apache2, php-fpm and mariadb services..."
        # Launch and enable the apache2 service
        $SUDO systemctl enable --now httpd.service
        # Launch and enable the php-fpm service
        $SUDO systemctl enable --now php-fpm.service
        # Launch and enable the mariadb service
        $SUDO systemctl enable --now mariadb.service
        # Enable the firewall
        $SUDO firewall-cmd --permanent --add-service=http
        $SUDO firewall-cmd --permanent --add-service=https
        $SUDO firewall-cmd --reload
    else
        error "PHP 8.0 is not available in the repository of your distribution. Please install it manually. Aborting..."
        exit 1
    fi
fi
}

verify_if_install(){
    if [ -f "$directory/index.php" ]; then
        error "The web site is already installed in $directory. Aborting..."
        exit 1
    fi
}

install_web_site(){

# Define the apache user

APACHE_USER=""

# Launch the installation of the dependencies
if check_cmd apt-get; then
    install_apt
    APACHE_USER="www-data"
elif check_cmd yum; then
    install_yum
    APACHE_USER="apache"
elif check_cmd dnf; then
    install_dnf
    APACHE_USER="apache"
else
    error "Your distribution is not supported by this script. Aborting..."
    exit 1
fi

# Define the web site directory
warn "Please enter the directory where you want to install the web site (default: /var/www/html):"
read -r -p "Directory: " directory
if [ -z "$directory" ]; then
    directory="/var/www/html"
fi
warn "The web site will be installed in $directory"
warn "Is it correct? (y/n)"
read -r -p "Answer: " answer
if [ "$answer" != "y" ]; then
    error "Aborting..."
    exit 1
fi

# Download the web site
warn "Downloading the web site..."
# Create the directory if it does not exist
if [ ! -d "$directory" ]; then
    $SUDO mkdir -p "$directory"
fi
# Change the directory
cd "$directory" || exit
# Download the web site
$SUDO git clone https://github.com/MathiasLinux/sae_401_bo.git .

# Create the database
warn "Creating the database..."
# Create the database
# Ask for the database name
warn "Please enter the name of the database (default: kaiserstuhlEscape):"
read -r -p "Database name: " database
# Check if the database name is empty
if [ -z "$database" ]; then
    database="kaiserstuhlEscape"
fi
warn "The name of the database is $database"
warn "Is it correct? (y/n)"
read -r -p "Answer: " answer
if [ "$answer" != "y" ]; then
    error "Aborting..."
    exit 1
fi
# Create the database
$SUDO mysql -e "CREATE DATABASE $database;"
warn "Creating the user linked to the database..."
# Ask for the user name
warn "Please enter the name of the user linked to the database (default: kaiserstuhlEscape):"
read -r -p "User name: " user
# Check if the user name is empty
if [ -z "$user" ]; then
    user="kaiserstuhlEscape"
fi
warn "The name of the user linked to the database is $user"
warn "Is it correct? (y/n)"
read -r -p "Answer: " answer
if [ "$answer" != "y" ]; then
    error "Aborting..."
    exit 1
fi
# Ask for the password of the user linked to the database
warn "Please enter the password of the user linked to the database (default: kaiserstuhlEscape):"
read -r -p "Password: " password
# Ask for the confirmation of the password
warn "Please confirm the password of the user linked to the database (default: kaiserstuhlEscape):"
read -r -p "Password: " password2
# Check if the password is correct
if [ "$password" != "$password2" ]; then
    error "The passwords do not match. Aborting..."
    exit 1
fi
# Check if the password is empty
if [ -z "$password" ]; then
    password="kaiserstuhlEscape"
fi
warn "The password of the user linked to the database is $password"
warn "Is it correct? (y/n)"
read -r -p "Answer: " answer
if [ "$answer" != "y" ]; then
    error "Aborting..."
    exit 1
fi
# Create the user linked to the database
$SUDO mysql -e "CREATE USER '$user'@'localhost' IDENTIFIED BY '$password';"
# Grant all privileges to the user
$SUDO mysql -e "GRANT ALL PRIVILEGES ON $database.* TO '$user'@'localhost';"
# Flush the privileges
$SUDO mysql -e "FLUSH PRIVILEGES;"
# Import the database
warn "Importing the database..."
$SUDO mysql "$database" < database.sql

# Configure the web site
warn "Configuring the web site..."
# Change the directory
cd "$directory" || exit
# Modify the configuration file
cd config || exit
# create the configuration file
$SUDO touch config.class.php
# Add the content of the configuration file

$SUDO cat > config.class.php << EOF
<?php
abstract class config
{
    // Definition des paramètres de la BDD
    public const DBNAME = "$database";
    public static \$DBHost = "localhost";

    // Login
    public static \$DBUser = "$user";

    // Password
    public static \$DBPwd = "$password";
}
EOF
# Change the directory
cd .. || exit
# Change git config to create a safe directory
$SUDO git config --global --add safe.directory $directory
# Modify the rights of the whole directory
warn "Modifying the rights of the whole directory..."
$SUDO chmod -R 755 "$directory"
# Modify the user and the group of the whole directory
warn "Modifying the user and the group of the whole directory..."
$SUDO chown -R "$APACHE_USER":"$APACHE_USER" "$directory"

# Restart the apache2 service
warn "Restarting the apache2 service..."
if check_cmd apt-get; then
    $SUDO systemctl restart apache2.service
elif check_cmd yum; then
    $SUDO systemctl restart httpd.service
elif check_cmd dnf; then
    $SUDO systemctl restart httpd.service
fi

# Display the end of the script
success "The installation is finished. You can now access the web site at the following address: http://localhost !"

success "The default user is admin@admin.fr and the default password is Admin#1234"

success "Thank you for using this script. If you have any questions, please contact me on GitHub: MathiasLinux"
}

# Function to update the web site
update_web_site() {
# Define the web site directory
warn "Please enter the directory where the web site is installed (default: /var/www/html):"
read -r -p "Directory: " directory
# Check if the directory is empty
if [ -z "$directory" ]; then
    directory="/var/www/html"
fi
warn "The web site is installed in $directory"
warn "Is it correct? (y/n)"
read -r -p "Answer: " answer
if [ "$answer" != "y" ]; then
    error "Aborting..."
    exit 1
fi

# Check if the directory exists
if [ ! -d "$directory" ]; then
    error "The directory does not exist. Aborting..."
    exit 1
fi

# Change the directory
cd "$directory" || exit

# Verify if the directory is a git repository
warn "Verifying if the directory is a git repository..."
if ! $SUDO git rev-parse --git-dir > /dev/null 2>&1; then
    error "The directory is not a git repository. Aborting..."
    exit 1
fi

# Check if the directory has not the last updates main branch with git status
warn "Checking if the directory has not the last updates main branch..."
# Here it's little hacky but it works
if $SUDO git status | grep -q "is up to date"; then
    error "You already have the last updates. Aborting..."
    exit 1
fi
# Backup the configuration file and the images
warn "Backing up the configuration file and the images..."
# Create the backup directory
# Ask for the backup directory
warn "Please enter the directory where the backup will be stored (default: /var/www/backup):"
read -r -p "Directory: " backup_directory
# Check if the backup directory is empty
if [ -z "$backup_directory" ]; then
    backup_directory="/var/www/backup"
fi
warn "The backup will be stored in $backup_directory"
warn "Is it correct? (y/n)"
read -r -p "Answer: " answer
if [ "$answer" != "y" ]; then
    error "Aborting..."
    exit 1
fi
# Verify if the backup directory exists
if [ ! -d "$backup_directory" ]; then
    warn "The backup directory does not exist."
    # Ask the user if he wants to create the directory
    warn "Do you want to create the directory? (y/n)"
    read -r -p "Answer: " answer
    if [ "$answer" != "y" ]; then
        error "Aborting..."
        exit 1
    fi
    # Create the directory
    warn "Creating the directory..."
    $SUDO mkdir -p "$backup_directory"
fi
# Get the current date
date=$(date +%Y-%m-%d_%H-%M-%S)
# Create the backup directory with the current date
warn "Creating the backup directory with the current date..."
$SUDO mkdir "$backup_directory"/"$date"
# Change the directory
cd "$backup_directory"/"$date" || exit
# Backup the configuration file
$SUDO cp $directory/config/config.class.php "$backup_directory"/"$date"/config.class.php
# Backup the images
$SUDO cp -r $directory/img/escapeGames "$backup_directory"/"$date"/img/escapeGames
# Backup the database
warn "Backing up the database..."
# Ask for the database name
warn "Please enter the name of the database (default: kaiserstuhlEscape):"
read -r -p "Database name: " database
# Check if the database name is empty
if [ -z "$database" ]; then
    database="kaiserstuhlEscape"
fi
warn "The name of the database is $database"
warn "Is it correct? (y/n)"
read -r -p "Answer: " answer
if [ "$answer" != "y" ]; then
    error "Aborting..."
    exit 1
fi
# Backup the database
$SUDO mysqldump "$database" > "$backup_directory"/"$date"/database.sql

# Update the web site
warn "Updating the web site..."
# Change the directory
cd "$directory" || exit
# Delete the old web site
warn "Deleting the old web site..."
$SUDO rm -rf "$directory"
# Download the new web site
warn "Downloading the new web site..."
$SUDO git clone https://github.com/MathiasLinux/sae_401_bo.git .
# Restore the configuration file and the images
warn "Restoring the configuration file and the images..."
# Restore the configuration file
$SUDO cp "$backup_directory"/config.class.php config/config.class.php
# Restore the images
$SUDO cp -r "$backup_directory"/img/escapeGames img/escapeGames
# Ask if the user wants to restore the database
warn "Do you want to restore the database? (y/n)"
read -r -p "Answer: " answer
if [ "$answer" = "y" ]; then
    # Restore the database
    warn "Restoring the database..."
    $SUDO mysql "$database" < "$backup_directory"/database.sql
fi

# Restart the apache2 service
warn "Restarting the apache2 service..."
if check_cmd apt-get; then
    $SUDO systemctl restart apache2.service
elif check_cmd yum; then
    $SUDO systemctl restart httpd.service
elif check_cmd dnf; then
    $SUDO systemctl restart httpd.service
fi

# if yum or dnf is installed restart php-fpm
if check_cmd yum || check_cmd dnf; then
    $SUDO systemctl restart php-fpm.service
fi

# Display the end of the script
success "The update is finished. You can now access the web site at the following address: http://localhost !"

success "Thank you for using this script. If you have any questions, please contact me on GitHub: MathiasLinux"
}

# Check if the script is run as root
if [ "$EUID" -ne 0 ]; then
    error "Please run this script as root. Aborting..."
    exit 1
fi

# Ask if the user wants to install the web site or to update it
warn "Do you want to install the web site or to update it? (install/update)"
read -r -p "Answer: " answer
if [ "$answer" = "install" ]; then
    install_web_site
elif [ "$answer" = "update" ]; then
    update_web_site
else
    error "The answer is not valid. Aborting..."
    exit 1
fi

# Reset the language of the system
unset LC_ALL

# End of the script with a success code
exit 0