<?php

  session_start();
  //remove all sessions
  session_unset();

  //destroy
  session_destroy();

?>