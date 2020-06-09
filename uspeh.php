<?php
session_start();
  echo "Вы успешно отправили сообщение на".$_SESSION["to"];
?>