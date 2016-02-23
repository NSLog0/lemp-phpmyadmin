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
