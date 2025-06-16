
<?php


/**
 * session user
 *
 * @return only true
 */
function current_user() {
  return auth('usuario')->user();
}

function current_tienda() {
  return session()->get('current_tienda');
}

function close_sessions() {
  if(Auth::guard('usuario')->check()) {
    Auth::guard('usuario')->logout();
  }

  // session()->flush();
  // session()->forget('gp_config');
  return true;
}
