<?php
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">

    <title>PHENIX Mail</title>
    <meta name="keywords" content="PHENIXASSURANCES,FENIASSUR,IMAP,MAIL">
    <meta name="description" content="Phenix IMAP Connection">
    <link href="css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=2.2.0" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
       

        <div id="" class="gray-bg dashbard-1">
            <div class="row border-bottom">
            <?php
        $mbox = imap_open("{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX", 'MAIL', 'PASS')
  or die("can't connect: " . imap_last_error());

  if ($mbox) {
  $lists = imap_search($mbox, 'ALL', SE_UID);
}

foreach ($lists as $key => $value) {
  $arr[] = $value;
}
$last = end($arr);
$last = current(array_slice($arr, -1));
if (isset($_GET['lp'])) {
  $lp = $_GET['lp'];
  $fp = $_GET['lp'] - 10;
} else if (isset($_GET['plp'])) {
  $lp = $_GET['plp'];
  $fp = $_GET['plp'] + 10;
} else {
  $lp = $last;
  $fp = $last - 10;
}
$result = imap_fetch_overview($mbox, "$fp:$lp", FT_UID);






@$mid =  $_GET['id'];
$rlt = imap_fetch_overview($mbox, $mid);

?>
            </div>

            <div class="wrapper wrapper-content">
                <div class="row">
                <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content mailbox-content">
                                <div class="file-manager">
                                    <a class="btn btn-block btn-primary compose-mail" href="mail_compose.php">Composer</a>
                                    <div class="space-25"></div>
                                    <h5>DOSSIER</h5>
                                    <ul class="folder-list m-b-md" style="padding: 0">
                                        <li>
                                            <a href="index.php"> <i class="fa fa-inbox "></i> Boite de récéption  
                                            </a>
                                        </li>
                                        <li>
                                            <a href="sent.php"> <i class="fa fa-envelope-o"></i> Message envoyé</a>
                                        </li>
                                       
                                    </ul>
                                    <h5>Equipe</h5>
                                    <ul class="category-list" style="padding: 0">
                                        <li>
                                            <a href="mail_compose.html#"> <i class="fa fa-circle text-navy"></i> Morgan FREEMAN</a>
                                        </li>
                                        <li>
                                            <a href="mail_compose.html#"> <i class="fa fa-circle text-danger"></i> Said ELHAWAT</a>
                                        </li>
                                        <li>
                                            <a href="mail_compose.html#"> <i class="fa fa-circle text-primary"></i> Walter O'brien</a>
                                        </li>
                                        <li>
                                            <a href="mail_compose.html#"> <i class="fa fa-circle text-info"></i> Cheb ELARBI</a>
                                        </li>
                                        <li>
                                            <a href="mail_compose.html#"> <i class="fa fa-circle text-warning"></i> Fati-FLEUR</a>
                                        </li>
                                    </ul>

                                    
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 animated fadeInRight">
                        <div class="mail-box-header">

                            <form method="get" action="index.html" class="pull-right mail-search">
                               
                            </form>
                            <h2>
                            Boîte de réception 
                </h2>
                            <div class="mail-tools tooltip-demo m-t-md">
                                <div class="btn-group pull-right">
                                    <button class="btn btn-white btn-sm" id="<?php echo $lp + 10; ?>"  onClick="repclick(this.id)"><i class="fa fa-arrow-left"></i>
                                    </button>
                                    <button class="btn btn-white btn-sm" id="<?php echo $lp - 10; ?>"  onClick="repclick(this.id)"><i class="fa fa-arrow-right"></i>
                                    </button>
                                    <script>
function repclick(clicked_id) {
window.location = "index.php?lp="+clicked_id;
}
</script>

<script>
function reclick(clicked_id) {
window.location = "index.php?plp="+clicked_id;
}
</script>
<script>
              function reply_click(clicked_id) {
                window.location = "mail_detail.php?id=" + clicked_id;
              }
            </script>

                                </div>
                                <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="Actualiser" onclick="window.location.reload();"><i class="fa fa-refresh"></i></button>
                                

                            </div>
                        </div>
                        <div class="mail-box">

                            <table class="table table-hover table-mail">
                                <tbody>
                                    
                                  <?php foreach ($result as $overview) : ?>
                                    <tr class="unread" id="<?php echo imap_utf8($overview->uid); ?>" onClick="reply_click(this.id)">
                                        <td class="check-mail">
                                            <input type="checkbox" class="i-checks" checked>
                                        </td>
                                        <td class="mail-ontact"><?php echo $overview->from; ?></a>
                                        </td>
                                        <td class="mail-subject"><?php echo imap_utf8($overview->subject); ?>
                                        </td>
                                        <td class=""></td>
                                        <td class="text-right mail-date"><?php $intime = date('Y-m-d h:i:s a', strtotime($overview->date)); echo $intime; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js?v=3.4.0"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/hplus.js?v=2.2.0"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>


</body>

</html>
