#!/bin/bash

chef_version=$(gem list chef | grep chef | awk -F '[()]' {'print ($2)'} |tr -d "[\r\n]")

echo -n "Gem Version:" $chef_version

if [ "$chef_version" != "11.4.2" ] ; then

    echo "Uninstalling version prior 11.4.2"
    gem uninstall --version '< 11.4.2' chef
    echo "--- Updating Chef"
    apt-get install make --yes
    echo "   --- installing chef"
    gem install -no-rdoc --no-ri --version 11.4.2 chef

    echo "   --- set chef path"
    echo "export PATH=$PATH:$(dirname $(ruby -r rubygems -e "p Gem.bin_path('chef','chef-client')") | cut -d "\"" -f 2)" > /etc/profile.d/chef.sh

else
    echo "--- Skipping Chef update."
fi