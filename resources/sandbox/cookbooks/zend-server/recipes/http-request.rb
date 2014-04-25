include_recipe "zend-server::server"

execute "Installing HTTP_Request pear package" do
  command "/usr/local/zend/bin/pear install HTTP_Request"
end