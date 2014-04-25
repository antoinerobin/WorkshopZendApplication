include_recipe "apt"

# add the Zend Server repo
apt_repository "zend-server" do
  uri "http://repos.zend.com/zend-server/6.3/deb_ssl1.0"
  distribution "server"
  components ["non-free"]
  key "zend.key"
  action :add
end