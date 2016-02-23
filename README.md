# lemp-phpmyadmin

inspired by https://github.com/kasperisager/php-dockerized and phpmyadmin by corbinu/docker-phpmyadmin

#How to use 
1. Run 
  ``` 
  $docker-compose up
  ```
  or 
  ``` 
  $docker-compose up -d 
  ```
  for background process
2. You can access phpmyadmin at www.yourdomain.com:8443/phpmyadmin
3. If you don't use phpmyadmin,you just run 
```
$docker-compose stop [phpmyadmin_name_of_container]
```
or 
```
$docker-compose start [phpmyadmin_name_of_container]
```
**If error while install tyr to use "sudo" 

#What's inside
##Database config 
use "mysql" instead "localhost", The name in docker-compose.yml
##support wordpress
###basic config nginx for wordpress security
```
 location ~ ^/(wp-admin|wp-login\.php) {
    #try_files  $uri =404;
    allow 192.168.1.0/24;
    allow 10.0.0.1/24;
    deny all;
  }
  
  #location ~ /wp-(admin|login|includes|content) {
  # try_files $uri $uri/ \1/index.php?$args;
  #}

location = /robots.txt {
	allow all;
	log_not_found off;
	access_log off;
}

# Deny access to any files with a .php extension in the uploads directory
# Works in sub-directory installs and also in multisite network
# Keep logging the requests to parse later (or to pass to firewall utilities such as fail2ban)
location ~* /(?:uploads|files)/.*\.php$ {
	deny all;
}
  
  #Prevent access to any files starting with a dot, like .htaccess
  #or text editor temp files
    location ~ /\. { access_log off; log_not_found off; deny all; }

  #Prevent access to any files starting with a $ (usually temp files)
    location ~ ~$ { access_log off; log_not_found off; deny all; }

  #Do not log access to robots.txt, to keep the logs cleaner
    location = /robots.txt { access_log off; log_not_found off; }

  #Do not log access to the favicon, to keep the logs cleaner
    location = /favicon.ico { access_log off; log_not_found off; }

    location ~* wp-admin/includes { deny all; }
    location ~* wp-includes/theme-compat/ { deny all; }
    location ~* wp-includes/js/tinymce/langs/.*\.php { deny all; }
    location /wp-content/ { internal; }
    location /wp-includes/ { internal; }
    location ~* wp-config.php { deny all; }

    location ~* ^/wp-content/uploads/.*.(html|htm|shtml|php)$ {
        types { }
        default_type text/plain;
    }


    rewrite /wp-admin$ $scheme://$host$uri/ permanent;
  ```
If you want to use SSL add this code to your config
```
# Redirect all other requests to HTTP.
location / {
    return 301 http://$host$request_uri;
 }
```
