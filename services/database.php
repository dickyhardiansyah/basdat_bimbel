<?php

function get_connection()
{
  $HOSTNAME = "127.0.0.1";
  $USERNAME = "root";
  $PASSWORD = "";
  $DATABASE = "basdat_bimbel";

  return mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
}