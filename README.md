# SAE 401 BO

## Table of contents

* [General info](#general-info)
* [Technologies](#technologies)
* [Setup](#setup)
    * [Requirements](#requirements)
    * [Installation](#installation)
* [Features](#features)
* [Status](#status)
* [License](#license)
* [Contributors](#contributors)
* [Thanks](#thanks)

## General info

The web site is made for a company that sells escape games. The web site is made with pure HTML, CSS, JavaScript and
PHP. The web site is responsive and works on all devices.

## Technologies

<a href="https://www.w3.org/TR/html5/" title="HTML5"><img src="https://github.com/get-icon/geticon/raw/master/icons/html-5.svg" alt="HTML5" width="64px" height="64px"></a>
<a href="https://www.w3.org/TR/CSS/" title="CSS3"><img src="https://github.com/get-icon/geticon/raw/master/icons/css-3.svg" alt="CSS3" width="64px" height="64px"></a>
<a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" title="Javascript"><img src="https://github.com/get-icon/geticon/raw/master/icons/javascript.svg" alt="Javascript" width="64px" height="64px"></a>
<a href="https://php.net/" title="PHP"><img src="https://github.com/get-icon/geticon/raw/master/icons/php.svg" alt="PHP" width="64px" height="64px"></a>
<a href="https://mariadb.org/" title="MariaDB"><img src="https://github.com/get-icon/geticon/raw/master/icons/mariadb.svg" alt="MariaDB" width="64px" height="64px"></a>
<a href="https://www.linuxfoundation.org/" title="Linux"><img src="https://github.com/get-icon/geticon/raw/master/icons/linux-tux.svg" alt="Linux" width="64px" height="64px"></a>

## Setup

The site has an automatic install script for Linux.

### Requirements

* A Linux server
    * RHEL 8 or later (Any clone of RHEL should work)
    * Ubuntu 22.04 or later
    * Fedora 36 or later
    * Debian 11 can work if you add an extra repository for PHP 8.0 like https://deb.sury.org
* PHP 8.0 or later
* MariaDB
* Apache 2.4

The project has been tested on AlmaLinux 8.7, AlmaLinux 9.1, Fedora 37, Ubuntu 22.04 and Debian 12 (In the testing phase
daily build from 2023-04-13).

### Installation

The install script will install all the requirements and the web site. It will also create a database and a user for the
web site. It will also create a user for the admin panel.

The default admin username is `admin@admin.fr` and the default password is `Admin#1234`. Please change it after the
installation, for security reasons.

1. Get the install script

```bash
wget https://raw.githubusercontent.com/MathiasLinux/sae_401_bo/main/installUpdate.sh
```

2. Make the script executable

```bash
chmod +x installUpdate.sh
```

3. Run the script as root

```bash
sudo bash installUpdate.sh
```

4. Follow the instructions
5. Enjoy your new website !
6. If you want to update the web ite, just run the script again and choose the update option.

## Features

List of features

### User Features

* Responsive design
* Contact form
* Escape games selling
* Gift cards selling
* Jobs offers
* Login system
* User profile
* User settings
* User orders history
* User reviews
* Translation system (English, French)
* Q&A system
* Partnerships

### Admin Features

* Admin panel
* Escape games management
* Contact form management
* Reservation management
* Gift card management
* Q&A management
* User management
* Review management

To access the admin panel, go to `https://yourwebsite.com/index.php?action=admin` when you are logged in.

## Status

Project is: _working_

## License

This project is licensed under the GNU General Public License v2.0 - see the LICENSE file for details

## Contributors

Thanks to the following people who have contributed to this project:

* @XemWebs
* @Benvalda
* @CLAVURE

## Thanks

Thanks to GitHub for creating the awesome copilot feature. It helped us a lot to create this project.

<a href="https://github.com/" title="Github"><img src="https://github.com/get-icon/geticon/raw/master/icons/github-icon.svg" alt="Github" width="64px" height="64px"></a>

I wanted also to thank Jetbrains for creating the awesome PHPStorm IDE. I used it to create this project.

<a href="https://www.jetbrains.com/phpstorm/" title="PhpStorm"><img src="https://github.com/get-icon/geticon/raw/master/icons/phpstorm.svg" alt="PhpStorm" width="64px" height="64px"></a>

Finally, I wanted to thank my team for their help and their work.

