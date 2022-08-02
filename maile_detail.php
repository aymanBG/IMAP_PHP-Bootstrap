<?php
include_once('lib/class.imap.php');
$email = new Imap();
error_reporting(0);


    ?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">
    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">
<!-- dataTables -->
<link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
<title>PHENIX Mail</title>
    <meta name="keywords" content="PHENIXASSURANCES,FENIASSUR,IMAP,MAIL">
    <meta name="description" content="Phenix IMAP Connection">
    <link href="css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=2.2.0" rel="stylesheet">
    <style>
    .alert-box
	{
	  max-width : 300px;
	  min-height: 300px;
	  
	  
	}</style>
</head>

<body>
    <div id="wrapper">
        
        <div id="" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                
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


                    <?php
                            // include Imap.Class

$connect = $email->connect(
	'{imap.gmail.com:993/imap/ssl/novalidate-cert}[Gmail]/Messages envoy&AOk-s', //host
	'MAIL',
    'PASS'//password
);


if($connect){
	if(isset($_GET['id'])){
		// inbox array
		$inbox = $email->getMessages('html');
		$kos =  json_encode($inbox, JSON_PRETTY_PRINT);
        
	}else if(!empty($_GET['uid']) && !empty($_GET['part']) && !empty($_GET['file']) && !empty($_GET['encoding'])){
		// attachments
		$inbox = $email->getFiles($_GET);
		echo $inbox;
	}else {
		echo json_encode(array("status" => "errorss", "message" => "Not connect."), JSON_PRETTY_PRINT);
	}
}else{
	echo json_encode(array("status" => "error", "message" => "Not connect."), JSON_PRETTY_PRINT);
}
$tta = json_decode($kos);


?>
<?php
$tabval = array();
foreach($tta as $tt => $values){
    //echo ($value);
    $tabval = $values;
}

$tab = $tabval[0];
//print_r($tabval);
//print_r($tab);
$att = $tabval;


?>


                    <div class="col-lg-9 animated fadeInRight">
                        <div class="mail-box-header">
                            <div class="pull-right tooltip-demo">
                                <a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Transférer"><i class="fa fa-reply"></i></a>
                                <a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Imprimer"><i class="fa fa-print" onclick="window.print()"></i> </a>
                                <a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Au Paradis"><i class="fa fa-trash-o" onclick="myAjax()"></i> </a>
                            </div>
                            <h2>
                            Boîte de réception
                            </h2>
                            <div class="mail-tools tooltip-demo m-t-md">


                                <h3 id="inbox">
                        <span class="font-noraml view" data-toggle="modal" data-target="#addModal">Sujet： </span><?php 
foreach($tabval as $tabs):?>
    <?php echo $tabs->subject;?>
<?php endforeach; ?>
                                </h3>
                                <h5>
                        <span class="pull-right font-noraml"><?php 
foreach($tabval as $tabs):?>
    <?php echo $tabs->date;?>
<?php endforeach; ?></span>
                        <span class="font-noraml">A： </span><?php 
foreach($tabval as $tabs):?>
    <?php echo $tabs->from->name;?>
<?php endforeach; ?>
                                </h5>
                            </div>
                    </div>
                        
                        <div class="mail-box">



                            <div class="mail-body">
                                <h4><?php 
foreach($tabval as $tabs):?>
    <?php echo $tabs->subject;?>
<?php endforeach; ?></h4>
                                <p>



<?php 
foreach($tabval as $tabs):?>
    <?php echo $tabs->message;?>
<?php endforeach; ?>
                                </p>

                            </div>
                            <div class="mail-attachment">
                                <p>
                                    <span><i class="fa fa-paperclip"></i> 
                                    <?php  $length = count($tabs->attachments); $i = 0; ?>
                                    <?php  for($i = 0; $i<$length; $i++): ?>
                                   <?php foreach($tabval as $tabs):?>
                                        <?php echo $tabs->attachments[$i]->part;?>
                                  
                                    - Attachements </span>
                                    
                                    <a href="maile_detail.php?uid=<?php echo $tabs->uid;?>&part=<?php echo $tabs->attachments[$i]->part;?>&file=<?php echo $tabs->attachments[$i]->file;?>&encoding=<?php echo $tabs->attachments[$i]->encoding;?>&id=<?php echo $tabs->uid;?>" class="file" download="attachment/<?php echo $tabs->attachments[$i]->file;?>"><?php echo $tabs->attachments[$i]->file;?>
                                   </a> 
                                   <?php endforeach; ?>
                                   <?php endfor; ?>
                                </p>
                            </div>
                            
                            <div class="clearfix"></div>


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

<script>
    $('body').on('click', '.file', function () {
		$.LoadingOverlay("show");
		var file = $(this).data('file').split(",");
		$.ajax({
			type: "POST",
			url: "maile_detail.php",
			data: {
				uid: file[0],
				part: file[1],
				file: file[2],
				encoding: file[3]
			},
			dataType: 'json'
		}).done(function(d) {
			if(d.status === "success"){
				$.LoadingOverlay("hide");
				window.open(d.path, '_blank');
			}else{
				alert(d.message);
			}
		});
	});
</script>

</body>

</html>