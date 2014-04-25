template "/etc/profile.d/sandbox.sh" do
  source "sandbox.erb"
  mode 0644
end

package "gettext" do
  action :install
end