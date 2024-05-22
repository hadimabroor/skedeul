<?php 
  if (is_admin())
    redirect(base_url('admin/dashboard'));
  else if (is_customer())
    redirect(base_url('customer/appointments'));
  else if (is_staff())
    redirect(base_url('staff/appointments'));
  else if (is_user())
   redirect(base_url('admin/dashboard/user'));
?>
 