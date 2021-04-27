<?php
include("./connection/DB.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Notifications</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <script src="./assets/js/jquery.min.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
  <style>
    .round {
      width: 20px;
      height: 20px;
      border-radius: 50%;
      position: relative;
      background: red;
      display: inline-block;
      padding: 0.3rem 0.2rem !important;
      margin: 0.3rem -1rem !important;
      left: -18px;
      top: 10px;
      z-index: 99 !important;
    }

    .round>span {
      color: white;
      display: block;
      text-align: center;
      font-size: 1rem !important;
      padding: 0 !important;
    }
  </style>
</head>

<body>
  <?php
  $find_notifications = "Select * from inf where active = 1";
  $result = mysqli_query($connection, $find_notifications);
  $count_active = '';
  $notifications_data = array();
  $deactive_notifications_dump = array();
  while ($rows = mysqli_fetch_assoc($result)) {
    $count_active = mysqli_num_rows($result);
    $notifications_data[] = array(
      "n_id" => $rows['n_id'],
      "notifications_name" => $rows['notifications_name'],
      "message" => $rows['message']
    );
  }

  ?>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Notifications System</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-bell" id="over" data-value="<?php echo $count_active; ?>" style="z-index:-99 !important;font-size:32px;color:white;margin:0.5rem 0.4rem !important;"></i></a></li>
        <?php if (!empty($count_active)) { ?>
          <div class="round" id="bell-count" data-value="<?php echo $count_active; ?>"><span><?php echo $count_active; ?></span></div>
        <?php } ?>
    </div>
    </ul>
    </div>
  </nav>



</body>
<script>
  $(document).ready(function() {
    var ids = new Array();
    $('#over').on('click', function() {
      $('#list').toggle();
    });

    //Message with Ellipsis
    $('div.msg').each(function() {
      var len = $(this).text().trim(" ").split(" ");
      if (len.length > 12) {
        var add_elip = $(this).text().trim().substring(0, 65) + "…";
        $(this).text(add_elip);
      }

    });


    $("#bell-count").on('click', function(e) {
      e.preventDefault();

      let belvalue = $('#bell-count').attr('data-value');

      if (belvalue == '') {

        console.log("inactive");
      } else {
        $(".round").css('display', 'none');
        $("#list").css('display', 'block');
      }
    });


  });
</script>

</html>