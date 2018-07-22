# DEV IN PROGRESS

homebridge webinterface


## INSTALL
Install composer
install php-xml php-pdo and other php depedencies asked by composer
composer install
Create vhost with index set to public folder and override allowed
create symlink between public/config/config.json and your homebridge config file example :
```ln -s /var/www/homebridge/config/config.json ~/.homebridge/config.json```
give your apache user write rights to the config.json file

Using :
 - lumen php framekwork
 - json editor
 - jquery


## TO ADD IN WIKI

how to install the cron in crontab

how the cron allow the use of debian commands safely
how does the cron work
