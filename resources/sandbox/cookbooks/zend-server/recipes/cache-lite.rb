include_recipe "zend-server::server"

execute "Installing Cache_Lite pear package" do
  command "/usr/local/zend/bin/pear install Cache_Lite"
end