<?php

function role()
{
  $user = Auth::user();
  echo $user;
  if ($user)
  {
    return $result = "Hello $user->name";
  }

}
?>