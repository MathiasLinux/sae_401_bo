#!/bin/bash
# Script to install KaiserStuhl Escape web site on Ubuntu server or RHEL server (RHEL, AlmaLinux, RockyLinux, CentOS) or Fedora server
#This script can possibly work on Debian 11, but with an external source for PHP 8.0 or higher

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
    $SUDO apt-get update
    $SUDO apt-get upgrade -y
    # Check if the php version in the repository is superior to 8.0
    if [ $(apt-cache policy php | grep -Eo '8\.[0-9]+' | head -n 1 | cut -d '.' -f 2) -ge 0 ]; then
        # Install the dependencies for a LAMP stack
        warn "Installing the dependencies for a LAMP stack..."
        $SUDO apt-get install -y apache2 php libapache2-mod-php mariadb-server php-mysql
        # Install the dependencies for the web application
        $SUDO apt-get install -y php-curl php-gd php-intl php-json php-mbstring php-xml php-zip
        # Install git and unzip
        $SUDO apt-get install -y git unzip
        warn "Enabling the apache2 and mariadb services..."
        # Launch and enable the apache2 service
        $SUDO systemctl enable --now apache2.service
        # Launch and enable the mariadb service
        $SUDO systemctl enable --now mariadb.service
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
    # Check if the php version in the repository is superior to 8.0
    if [ $(yum list php | grep -Eo '8\.[0-9]+' | head -n 1 | cut -d '.' -f 2) -ge 0 ]; then
        # Install the dependencies for a LAMP stack
        warn "Installing the dependencies for a LAMP stack..."
        $SUDO yum install -y httpd php mariadb php-{gd,pdo,xml,mbstring,zip,mysqlnd,opcache,json} mod_ssl openssl
        # Install git and unzip
        $SUDO yum install -y git unzip
        warn "Enabling the apache2, php-fpm and mariadb services..."
        # Launch and enable the apache2 service
        $SUDO systemctl enable --now httpd.service
        # Launch and enable the php-fpm service
        $SUDO systemctl enable --now php-fpm.service
        # Launch and enable the mariadb service
        $SUDO systemctl enable --now mariadb.service
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
    else
        error "PHP 8.0 is not available in the repository of your distribution. Please install it manually. Aborting..."
        exit 1
    fi
fi
}

APACHE_USER=""

# Launch the installation of the dependencies
if check_cmd apt-get; then
    install_apt
    $APACHE_USER="www-data"
elif check_cmd yum; then
    install_yum
    $APACHE_USER="apache"
elif check_cmd dnf; then
    install_dnf
    $APACHE_USER="apache"
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
git clone https://github.com/MathiasLinux/sae_401_bo.git
# Change the directory
cd sae_401_bo || exit
# Move the content of the web site to the directory
$SUDO mv * ..
# Change the directory
cd .. || exit
# Remove the directory
$SUDO rm -rf sae_401_bo

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
if [z "$password" ]; then
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
    public const DBNAME = "sae401";
    public static $DBHost = "localhost";

    // Définition des paramètres du site
    public static $DBUser = "$user";

    // Menu par défaut
    public static $DBPwd = "$password";
}
EOF
# Change the directory
cd .. || exit
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

# End of the script
exit 0