# attendance-app

A simple web app for managing attendance using deadline-based form submissions.

## Features

### Core features:
- Interface language: Indonesian.
- Each form includes a name and a deadline
- A form cannot be filled once its deadline has passed.

### Administrators (registered users) can:
1. View the list of forms.
2. Fill out a form.
3. Add, edit, and delete forms.
4. View the results of a form.
5. Export form result to a CSV file.

### Unregistered users can:
1. View the list of forms.
2. Fill out a form.

## Requirements
1. Apache2 HTTP Server
2. PHP (minimum version: 8.1.2)
3. MariaDB Server 10.6
 
## Installation

### Guided installation (Debian-based distros only)
This script helps set up:
- MYSQL configuration
- Admin user creation
- Apache VirtualHost configuration

This guided setup does not configure a local domain (e. g. `attendance-app.local`) or HTTPS.
It's recommended to run this guided setup first. You may later customise configurations manually as needed.

This method assumes:
- You are using a Debian-based distro (e.g., Debian, Ubuntu, Linux Mint)
- The above requirements are already installed.
- Your MySQL/MariaDB server is running in the `localhost`

#### Steps:
1. Open your terminal and navigate to the project directory.
2. Execute the installation script as the root user:
    ```bash
    sudo ./INSTALL_Debian.sh
    ```
    or
    ```bash
    sudo bash ./INSTALL_Debian.sh
    ```
3. Follow the on-screen instruction.
