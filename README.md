# edge-training-site
Dockerfile & Website files for building the Edgewords Training Web Site as a Docker Container

the src/ folder contains:
- the three web sites
- the exported mysql database (edgew02_demo_1.sql)
- a simple php file to check mysql connectivity (db-connect-test.php)

start powershell (if on Windows 10)
cd to the directory with your dockerfile & src folder in e.g.:

cd "C:\Users\Tom\Documents\Edgewords\docker php project"

docker build -t edge-site .
docker image ls
docker container run --detach --publish 80:80 --name edge-site edge-site

Open browser and goto web sites:
localhost	(should show PHP info so we know apache/php running)
localhost/training-site	(basic site, no mysql so should work ok)
localhost/webdriver
localhost/webdriver2

To check database connectivity:
in webdriver2 site, click the register link and register yourself, you should now be able to log in and add/delete records. If not, then test mysql by going into bash shell of running container:

docker container exec -it edge-site bash
#mysql
>show databases;
>use edgew02_demo_1;
>show tables;
>quit;

I also created a simple php file that checks database connectivity, so you can also run the following from the bash to check mysql:
#php -f db-connect-test.php
