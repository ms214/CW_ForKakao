<html>
  <head><meta charset="utf-8"></head>
  <body>
    <?php
    $userkey = $_GET['userkey'];
    $content = $_GET['content'];
    include("./database/db.php"); //db관리파일

    ckhistory($userkey);
    uphistory($userkey, $content);
    $return = selecthistory($userkey);
    print_r($return);
    ?>
  </body>
</html>
