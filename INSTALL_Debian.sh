#!/bin/bash

echo -e "\nWELCOME TO THE ATTENDANCE APP INSTALLATION WIZARD"

touch library/db_config.php

echo -e "\nDATABASE PREPARATION"

echo -e "\nEnter your MySQL credentials"
echo "These credentials are only for the installation process — they won’t be used by the app."
echo -n "MySQL user         : "; read MYSQL_USER
read -sp "MySQL password     : " MYSQL_PASS; echo

echo -e "\nEnter your MySQL configuration for the application"

echo -e "\nDatabase name"
echo -n "Enter database name = "; read DB_NAME

sudo mysql -u $MYSQL_USER --password=$MYSQL_PASS -e "CREATE DATABASE IF NOT EXISTS \`$DB_NAME\`"

sudo mysql -u $MYSQL_USER --password=$MYSQL_PASS $DB_NAME -e "CREATE TABLE IF NOT EXISTS \`users\` (
    \`user_id\` INT(5) PRIMARY KEY AUTO_INCREMENT,
    \`username\` VARCHAR(20) NOT NULL,
    \`password\` VARCHAR(40) NOT NULL
)"
sudo mysql -u $MYSQL_USER --password=$MYSQL_PASS $DB_NAME -e "CREATE TABLE IF NOT EXISTS \`forms\` (
    \`form_id\` INT(3) PRIMARY KEY AUTO_INCREMENT,
    \`name\` VARCHAR(50) NOT NULL,
    \`deadline_unix\` BIGINT NOT NULL
)"
sudo mysql -u $MYSQL_USER --password=$MYSQL_PASS $DB_NAME -e "CREATE TABLE IF NOT EXISTS \`records\` (
    \`input_id\` INT(5) PRIMARY KEY AUTO_INCREMENT,
    \`student_id\` VARCHAR(15) NOT NULL,
    \`name\` VARCHAR(70) NOT NULL,
    \`class\` VARCHAR(10) NOT NULL,
    \`form_id\` INT(3) NOT NULL,
    \`timestamp_unix\` BIGINT NOT NULL,
    FOREIGN KEY (\`form_id\`) REFERENCES \`forms\`(\`form_id\`) ON DELETE CASCADE
)"

echo -e "\nAdministrator credentials"
echo -n "Enter a MySQL username for admin access  = "; read ADMIN_DBUSER
echo -n "Enter a MySQL password for admin access  = "; read -s ADMIN_DBPASS; echo
sudo mysql -u $MYSQL_USER --password=$MYSQL_PASS -e "CREATE USER IF NOT EXISTS '${ADMIN_DBUSER}'@'localhost' IDENTIFIED BY '${ADMIN_DBPASS}'"
sudo mysql -u $MYSQL_USER --password=$MYSQL_PASS -e "GRANT SELECT, INSERT, UPDATE, DELETE ON \`$DB_NAME\`.\`forms\` TO \`$ADMIN_DBUSER\`@\`localhost\`"
sudo mysql -u $MYSQL_USER --password=$MYSQL_PASS -e "GRANT SELECT ON \`$DB_NAME\`.\`records\` TO \`$ADMIN_DBUSER\`@\`localhost\`"

echo -e "\nGuest credentials"
echo -n "Enter a MySQL username for guest access  = "; read GUEST_DBUSER
echo -n "Enter a MySQL password for guest access  = "; read -s GUEST_DBPASS; echo
sudo mysql -u $MYSQL_USER --password=$MYSQL_PASS -e "CREATE USER IF NOT EXISTS '${GUEST_DBUSER}'@'localhost' IDENTIFIED BY '${GUEST_DBPASS}'"
sudo mysql -u $MYSQL_USER --password=$MYSQL_PASS -e "GRANT SELECT ON \`$DB_NAME\`.\`forms\` TO \`$GUEST_DBUSER\`@\`localhost\`"
sudo mysql -u $MYSQL_USER --password=$MYSQL_PASS -e "GRANT SELECT ON \`$DB_NAME\`.\`users\` TO \`$GUEST_DBUSER\`@\`localhost\`"
sudo mysql -u $MYSQL_USER --password=$MYSQL_PASS -e "GRANT INSERT ON \`$DB_NAME\`.\`records\` TO \`$GUEST_DBUSER\`@\`localhost\`"


echo -e "\nPreparing database configuration ..."
echo "<?php" > library/db_config.php
echo "    define(\"DB_NAME\", \"$DB_NAME\");" >> library/db_config.php
echo "    define(\"MYSQL_ADMIN_USER\", \"$ADMIN_DBUSER\");" >> library/db_config.php
echo "    define(\"MYSQL_ADMIN_PASS\", \"$ADMIN_DBPASS\");" >> library/db_config.php
echo "    define(\"MYSQL_GUEST_USER\", \"$GUEST_DBUSER\");" >> library/db_config.php
echo "    define(\"MYSQL_GUEST_PASS\", \"$GUEST_DBPASS\");" >> library/db_config.php
echo "?>" >> library/db_config.php

echo " Done"

echo -e "\nADMIN USER CREATION"
echo "This will be your initial admin account. You can add more admin accounts later manually."
echo -n "Username     : "; read ACCOUNT_USER
read -sp "Password     : " ACCOUNT_PASS; echo
echo -e "\nCreating the admin user account ..."
sudo mysql -u $MYSQL_USER --password=$MYSQL_PASS $DB_NAME -e "PREPARE create_account FROM 'INSERT INTO users SET \`username\`=?, \`password\`=?';
    SET @username = '$ACCOUNT_USER'; SET @password = md5('$ACCOUNT_PASS');
    EXECUTE create_account USING @username, @password;
    DEALLOCATE PREPARE create_account;"

echo " Done"

echo -e "\nVIRTUAL HOST CONFIGURATION FILE"
echo -n "Enter the VirtualHost Configuration file name (Default: attendance-app.conf): "
read VH_NAME
if [[ -z "$VH_NAME" ]]; then
    VH_NAME="attendance-app.conf"
else
    VH_NAME="$VH_NAME"
fi
echo -e "\nCreating VirtualHost configuration file ..."
sudo tee /etc/apache2/sites-available/$VH_NAME > /dev/null <<EOF
<VirtualHost *:80>
    #ServerName attendance-app.local

    ServerAdmin webmaster@localhost
    DocumentRoot `pwd`

    ErrorLog \${APACHE_LOG_DIR}/error.log
    CustomLog \${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF
echo " Done"

echo -e "\nEnabling VirtualHost configuration file ..."
sudo a2ensite $VH_NAME
echo " Done"

echo -e "\nReloading Apache2 HTTP Server ..."
sudo systemctl reload apache2
echo " Done"

unset MYSQL_USER
unset MYSQL_PASS
unset DB_NAME
unset ADMIN_DBUSER
unset ADMIN_DBPASS
unset GUEST_DBUSER
unset GUEST_DBPASS
unset ACCOUNT_USER
unset ACCOUNT_PASS
unset VH_NAME

echo -e "\nINSTALLATION FINISHED"