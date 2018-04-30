# Crave Control
Crave control is a responsive web based app that enables control of systems such as clipsal c-bus, fibaro, and advantageair using a single interface.

This repo contains a base install that installs docker and docker-compose, and then installs nginx, php7, and clipsal c-gate and launches them into separate containers. The project is tested to work on the raspberry pi 3+ and Mac OSX. My understanding is that as of the raspberry pi 3, that the standard nginx and php images will work and this is what I have used. I have only tested this so far on a raspberry pi 3+ and on mac OSX.

This project has been created in order to make setting up c-gate on docker, and integrating it with a web interface as simple as possible. **This is not the full codebase for Crave Control - just the setup to install and launch nginx, php, and clipsal c-gate.**

To get everything started, launch a terminal prompt either directly or using ssh and enter the following commands;

`sudo git clone https://github.com/mhulo/cravectl-1.git`

`cd cravectl-1`

At this point you now will have some files and a cgate-config directory. You need to replace the MYHOME.XML with your own tags file that you would have had clipsal toolkit create for you when setting up the network.

After you have a MYHOME.XML with your own XML config in it, you need to install docker by typing;

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

At this stage c-gate should hopefully respond with the levels of everything in the lighting network. From here, you can create your own php script (as I am) to create something amazing, or pretty easily edit the docker-compose yaml file to switch out php with something else such as node or python and make something awesome with that.
