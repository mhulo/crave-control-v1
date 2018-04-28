# Crave Control
Crave control is a responsive web based app that enables control of systems such as clipsal c-bus, fibaro, and advantageair using a single interface.

This repo contains a base install that installs docker and docker-compose, and then installs nginx, php7, and clipsal c-gate and launches them into separate containers. The project is tested to work on the raspberry pi 3+ and Mac OSX. My understanding is that as of the raspberry pi 3, that the standard nginx and php images will work and this is what I have used. I have only tested this so far on a raspberry pi 3+ and on mac OSX.

This project has been created in order to make setting up c-gate on docker, and integrating it with a web interface as simple as possible.

To install Crave Control, launch a terminal prompt either directly or using ssh and enter the following commands;

`sudo git clone https://github.com/mhulo/cravectl-1.git`

`cd cravectl-1`

`sudo sh install-docker.sh`

You then need to log out and log back in so that the part of the install script that adds pi as a user takes effect. After you log back in then type;

`cd cravectl-1`

`sudo sh install-service.sh`

`docker-compose up -d`

If all works you should see;

```
Creating crave-ctl-1_web_1   ... done
Creating crave-ctl-1_cgate_1 ... done
Creating crave-ctl-1_php_1   ... done
```

If you then open up the ip address of the machine you just installed this on your browser, eg. http://192.168.1.xx you should see a response from c-gate.

At this stage c-gate should hopefully respond, but with an error because you still need to update ~/cravectl-1/c-gate-config/MYHOME.XML on the host with your actual tags file created by clipsal toolkit.

After you update MYHOME.XML with your own configuration data, then type;

`docker-compose down`

`docker-compose up -d`

This will close the previous containers and create new ones with the right configuration and will return the current status of each of the units on the c-bus network. From here, you can create your own php script (as I am) to create something amazing, or pretty easily edit the docker-compose yaml file to switch out php with something else such as node or python.
