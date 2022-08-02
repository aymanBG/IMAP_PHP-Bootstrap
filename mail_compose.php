<?php 

error_reporting(0);
?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">

    <title>PHENIX Mail</title>
    <meta name="keywords" content="PHENIXASSURANCES,FENIASSUR,IMAP,MAIL">
    <meta name="description" content="Phenix IMAP Connection">

    <link href="css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="font-awesome/css/font- awesome.css?v=4.3.0" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=2.2.0" rel="stylesheet">
    <link rel="stylesheet" href="./summernote/summernote-lite.css">
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
                    <div class="col-lg-9 animated fadeInRight">
                        <div class="mail-box-header">
                            <div class="pull-right tooltip-demo">
                            <div id="mail-status"></div>
                            </div>
                            <h2>
                    Composer
                </h2>
                
                        </div>
                        <div class="mail-box">


                            <div class="mail-body">
                            

                                <form class="form-horizontal" method="POST" id="frmEnquiry" enctype='multipart/form-data'>
                                
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">À：</label>

                                        <div class="col-sm-8">
                                            <input type="text" name="userEmail" id="userEmail" class="form-control demoInputBox" value="">
                                        </div>
                                        <a onclick="myFunction()" class="col-sm-2 control-label">Autre Destinataire</a>

                                    </div>
                                    <div id="myDIV" style="display:none">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">À：</label>

                                        <div class="col-sm-8">
                                            <input type="text" name="userEmail1" id="userEmail1" class="form-control demoInputBox" value="">
                                        </div>
                                        <a onclick="myFunctio()" class="col-sm-2 control-label">Autre Destinataire</a>
                                    </div>
                                    </div>
                                    <div id="myDIVn" style="display:none">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">À：</label>

                                        <div class="col-sm-10">
                                            <input type="text" name="userEmail2" id="userEmail2" class="form-control demoInputBox" value="">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">CC：</label>

                                        <div class="col-sm-8">
                                            <input type="text" name="cc" id="cc" class="form-control demoInputBox" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">BCC：</label>

                                        <div class="col-sm-8">
                                            <input type="text" name="bcc" id="bcc" class="form-control demoInputBox" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Objet：</label>

                                        <div class="col-sm-10">
                                            <input type="text" name="subject" id="subject" class="form-control demoInputBox" value="">
                                        </div>
                                    </div>
                               

                            </div>

                            <div class="mail-text h-200"  >
                                   <textarea id="content" name="content"  cols="60" rows="6">
                                   <hr>
                                    <br><br><br><br><br><p>
                                    <img src="https://ci4.googleusercontent.com/proxy/8mNML7dqiIYPGGol1UVdczVdvZp3bhUQY_bigQ3CNN-48l-CsmpGFEEVMukX7YIYnXepA8Y_xQ3sJ8tnnZw8sAKfgp2amwZ4OWY=s0-d-e1-ft#https://phenixassurances.fr/images/icons/ic-logo-01.png"></img><br>
                                    <hr>
                                    <b>37 Rue d'Amsterdam 75008 PARIS France</b><br> 
                                    
                                    <span>SIREN :  </span><span class="label label-primary">&yen;	830 081 147</span><br>
                                    <span>Orias :  </span><span class="label label-primary">&yen;	17004289</span><br>
                                    
                                    <b>Entreprise soumise au contrôle de l'ACPR</b>    
                                    <hr>
                                    </p>
                                    </textarea>
                            </div>
                                                <div>
                            <label>Attachment</label><br /> <input type="file"
                                name="attachment[]" class="demoInputBox" multiple="multiple">
                        </div>
                             <div class="mail-body text-right tooltip-demo">
                            <button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Envoyé"><i class="fa fa-reply"></i> Envoyé</button>
                            </div>
                            <div class="clearfix"></div>
                            </form>


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

    <!-- SUMMERNOTE -->
    <script src="./summernote/summernote-lite.js"></script>
    <script type="text/javascript">

$(document).ready(function(e) {
		$("#frmEnquiry").on('submit', (function(e) {
			e.preventDefault();
			$('#loader-icon').show();
			var valid;
			valid = validateContact();
			if (valid) {
				$.ajax({
					url: "mail-send.php",
					type: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {
						$("#mail-status").html(data);
						$('#loader-icon').hide();
					},
					error: function() {}

				});
			}
		}));

		function validateContact() {
			var valid = true;
			$(".demoInputBox").css('background-color', '');
			$(".info").html('');
			$("#userEmail").removeClass("invalid");
			$("#subject").removeClass("invalid");
			$("#content").removeClass("invalid");


			if (!$("#userEmail").val()) {
				$("#userEmail").addClass("invalid");
				$("#userEmail").attr("title", "Required");
				valid = false;
			}
			if (!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
				$("#userEmail").addClass("invalid");
				$("#userEmail").attr("title", "Invalid Email");
				valid = false;
			}
			if (!$("#subject").val()) {
				$("#subject").addClass("invalid");
				$("#subject").attr("title", "Required");
				valid = false;
			}
			if (!$("#content").val()) {
				$("#content").addClass("invalid");
				$("#content").attr("title", "Required");
				valid = false;
			}

			return valid;
		}

	});
</script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });


           

        });
       
     
    </script>
<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<script>
function myFunctio() {
  var x = document.getElementById("myDIVn");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>

<script>
	$('#content').summernote({
		placeholder: 'Create you content here.',
		tabsize: 5,
		height: '50vh',
		toolbar: [
			['style', ['style']],
			['font', ['bold', 'underline', 'clear']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			['table', ['table']],
			['view', ['fullscreen', 'codeview', 'help']]
		]
	});
</script>
</body>

</html>
