include_recipe "zend-server::repository"

package "zend-server-php-#{node[:zend_server][:php_version]}"
package "sqlite"

conf_plain_file '/etc/profile' do
  pattern  /\/usr\/local\/zend\/bin/
  new_line 'PATH=$PATH:/usr/local/zend/bin'
  action   :insert_if_no_match
end

conf_plain_file '/etc/profile' do
  pattern  /\/usr\/local\/zend\/lib/
  new_line 'LD_LIBRARY_PATH=$LD_LIBRARY_PATH:/usr/local/zend/lib'
  action   :insert_if_no_match
end

execute "Starting Zend Server" do
  command "/usr/local/zend/bin/zendctl.sh restart"
  not_if { ::File.exists?("/usr/local/zend/chef.bootstrap")}
end

execute "Initializing Zend Server" do
  command "/usr/local/zend/bin/zs-manage bootstrap-single-server -p vacvacvac -r FALSE -d vacvacvac -a TRUE"
  not_if { ::File.exists?("/usr/local/zend/chef.bootstrap")}
end

execute "Restarting Zend Server" do
  command "/usr/local/zend/bin/zendctl.sh restart"
  not_if { ::File.exists?("/usr/local/zend/chef.bootstrap")}
end

link "/usr/bin/php" do
  to "/usr/local/zend/bin/php"
  action :create
end

file "/usr/local/zend/chef.bootstrap" do
  action :touch
end
