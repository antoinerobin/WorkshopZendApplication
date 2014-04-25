include_recipe "sass::default"

execute "Installing compass package" do
  command "gem install compass"
  action :run
  not_if { ::File.exists?("/opt/vagrant_ruby/bin/compass") }
end

template "/etc/init.d/compass" do
  source "daemon.erb"
  mode 0755
  action :create_if_missing
end

execute "Starting compass watcher" do
  command "/etc/init.d/compass start"
  action :run
end

