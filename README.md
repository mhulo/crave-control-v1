# Crave Control
Crave control is a responsive web based app that enables control of systems such as clipsal c-bus, fibaro, and advantageair using a single interface.

This repo contains a base install that installs docker and docker-compose, and then installs nginx, php7, and clipsal c-gate and launches them into separate containers. The project is tested to work on the raspberry pi 3+ and Mac OSX.

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

If you then open up ip address of the machine you just installed this on your browser, you should see a response from c-gate.
