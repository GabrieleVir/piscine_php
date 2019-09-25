<?php
  function ft_split($str)
  {
    if (($trimmed = trim($str)) === "")
      return (array());
    $res = split("[ ]+", $trimmed);
    sort($res);
    return ($res);
  }
?>