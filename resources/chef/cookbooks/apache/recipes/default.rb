template "/etc/apache2/sites-available/vagrant" do
  source "vhost.erb"
end

file "/etc/apache2/sites-enabled/000-default" do
  action :delete
end

link "/etc/apache2/sites-enabled/000-vagrant" do
  to "/etc/apache2/sites-available/vagrant"
  action :create
end

execute "Allowing apache to access vagrant files" do
  command "adduser www-data vagrant"
  action :run
end

service "apache2" do
  action :restart
end