<?php

function is_logged_in()
{
  $ci = get_instance();
  $ci->load->library('user_agent');
  if (!$ci->session->userdata('email')) {
    if ($ci->agent->is_referral()) {
      echo $ci->agent->referrer();
    }
    redirect('auth');
  } else {
  }
}
