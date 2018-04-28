#!/bin/bash

sudo apt-get update && sudo apt-get upgrade
curl -sSL https://get.docker.com | sh

# This adds the user "pi" to the group "docker". Log out and back in for this to take effect
sudo usermod -aG docker pi

sudo apt-get install python-pip
sudo pip install docker-compose
sudo docker-compose --version

sudo cp /crave-ctl-v1/crave-ctl-v1.service /etc/systemd/system/crave-ctl-v1.service
sudo systemctl enable docker-compose-opt
