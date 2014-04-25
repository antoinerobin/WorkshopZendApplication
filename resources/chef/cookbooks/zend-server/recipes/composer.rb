include_recipe "zend-server::server"

package "curl"

execute "Installing composer" do
  command "curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin"
  action :run
  not_if { ::File.exists?("/usr/bin/composer.phar") }
end