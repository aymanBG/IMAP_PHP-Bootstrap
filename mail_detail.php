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
    <link rel="stylesheet" href="./summernote/summernote-lite.css">

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
	'{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX', //host
	'MAIL', //username
	'PASS' //password
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
                                <a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Transférer" data-modal-target="modal2"><i class="fa fa-reply"></i></a>
                                <a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Imprimer"><i class="fa fa-print" onclick="window.print()"></i> </a>
                                <a href="" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Au Paradis"><i class="fa fa-trash-o" onclick="myAjax()"></i> </a>
                            </div>




                            <h2>
                            Boîte de réception
                            </h2>
                            <div class="mail-tools tooltip-demo m-t-md">


                                <h3 id="inbox">
                        <span class="font-noraml view">Sujet： </span><?php 
foreach($tabval as $tabs):?>
    <?php echo $tabs->subject;?>
<?php endforeach; ?>
                                </h3>
                                <h5>
                        <span class="pull-right font-noraml"><?php 
foreach($tabval as $tabs):?>
    <?php echo $tabs->date;?>
<?php endforeach; ?></span>
                        <span class="font-noraml">De： </span><?php 
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
                                    
                                    <a href="mail_detail.php?uid=<?php echo $tabs->uid;?>&part=<?php echo $tabs->attachments[$i]->part;?>&file=<?php echo $tabs->attachments[$i]->file;?>&encoding=<?php echo $tabs->attachments[$i]->encoding;?>&id=<?php echo $tabs->uid;?>" class="file" download="attachment/<?php echo $tabs->attachments[$i]->file;?>"><?php echo $tabs->attachments[$i]->file;?>
                                   </a> 
                                   <?php endforeach; ?>
                                   <?php endfor; ?>
                                </p>
                            </div>
                            
                            <div class="clearfix"></div>



                        </div>



                    <a class="btn btn-block btn-primary compose-mail" onclick="myFun()" href="#">Répondre</a>
                    <div id="myDIV" style="display:none">
                        <div id="mail-status"></div>

                    <div class="mail-box">


                            <div class="mail-body">
                            

                                <form class="form-horizontal" method="POST" id="frmEnquiryed" enctype='multipart/form-data'>
                                <div id="mail-status"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">À：</label>

                                        <div class="col-sm-8">
                                            <input type="text" name="userEmail" id="userEmail" class="form-control demoInputBox1" value="<?php foreach($tabval as $tabs):?><?php echo $tabs->from->address;?>
<?php endforeach; ?>">
                                        </div>
                                        <a onclick="myFunction()" class="col-sm-2 control-label">Autre Destinataire</a>

                                    </div>
                                    <div id="myDIV" style="display:none">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">À：</label>

                                        <div class="col-sm-8">
                                            <input type="text" name="userEmail1" id="userEmail1" class="form-control demoInputBox1" value="">
                                        </div>
                                        <a onclick="myFunctio()" class="col-sm-2 control-label">Autre Destinataire</a>
                                    </div>
                                    </div>
                                    <div id="myDIVn" style="display:none">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">À：</label>

                                        <div class="col-sm-10">
                                            <input type="text" name="userEmail2" id="userEmail2" class="form-control demoInputBox1" value="">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">CC：</label>

                                        <div class="col-sm-8">
                                            <input type="text" name="cc" id="cc" class="form-control demoInputBox1" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">BCC：</label>

                                        <div class="col-sm-8">
                                            <input type="text" name="bcc" id="bcc" class="form-control demoInputBox1" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Objet：</label>

                                        <div class="col-sm-10">
                                            <input type="text" name="subject" id="subject" class="form-control demoInputBox1" value="FWD:<?php foreach($tabval as $tabs):?><?php echo $tabs->subject;?>
<?php endforeach; ?>">
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






    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js?v=3.4.0"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/hplus.js?v=2.2.0"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="./summernote/summernote-lite.js"></script>
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

    <script type="text/javascript">

$(document).ready(function(e) {
		$("#frmEnquiryed").on('submit', (function(e) {
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
    $('body').on('click', '.file', function () {
		$.LoadingOverlay("show");
		var file = $(this).data('file').split(",");
		$.ajax({
			type: "POST",
			url: "mail_detail.php",
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
<script>
function myFun() {
  var x = document.getElementById("myDIV");
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
<script>
const modalTriggerButtons = document.querySelectorAll("[data-modal-target]");
const modals = document.querySelectorAll(".modal");
const modalCloseButtons = document.querySelectorAll(".modal-close");

modalTriggerButtons.forEach(elem => {
  elem.addEventListener("click", event => toggleModal(event.currentTarget.getAttribute("data-modal-target")));
});
modalCloseButtons.forEach(elem => {
  elem.addEventListener("click", event => toggleModal(event.currentTarget.closest(".modal").id));
});
modals.forEach(elem => {
  elem.addEventListener("click", event => {
    if(event.currentTarget === event.target) toggleModal(event.currentTarget.id);
  });
});

// Close Modal with "Esc"...
document.addEventListener("keydown", event => {
  if(event.keyCode === 27 && document.querySelector(".modal.modal-show")) {
    toggleModal(document.querySelector(".modal.modal-show").id);
  }
});

function toggleModal(modalId) {
  const modal = document.getElementById(modalId);

  if(getComputedStyle(modal).display==="flex") { // alternatively: if(modal.classList.contains("modal-show"))
    modal.classList.add("modal-hide");
    setTimeout(() => {
      document.body.style.overflow = "initial";
      modal.classList.remove("modal-show", "modal-hide");
      modal.style.display = "none";      
    }, 200);
  }
  else {
    document.body.style.overflow = "hidden";
    modal.style.display = "flex";
    modal.classList.add("modal-show");
  }
}
    </script>
</body>














<style>
                .modal {
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  display: none;
  justify-content: center;
  align-items: flex-start;
  z-index: 1000;
  overflow: auto;
  background-color: rgba(0,0,0,0.7);
}
.modal.modal-show {
  animation: fadeIn 0.1s ease-in-out forwards;
}
.modal.modal-hide {
  animation: fadeOut 0.1s ease-in-out 0.1s forwards;
}
.modal-content {
  position: relative;
  background-color: #fff;
  margin: 2rem;
  padding: 2rem;
  border-radius: 0.25rem;
  width: 50%;
  max-height: 75%;
  overflow: auto;
  box-shadow: 0 4px 20px rgba(0,0,0,0.4);
}
.modal.modal-show .modal-content {
  animation: fadeInDown 0.3s ease-in-out forwards;
}
.modal.modal-hide .modal-content {
  animation: fadeOutUp 0.2s ease-in-out forwards;
}
.modal-content h1 {
  text-align: center;
  margin-bottom: 2rem;
}
.modal-content p {
  margin: 1rem 0;
  line-height: 1.5rem;
}
.modal-close {
  position: absolute;
  top: 0;
  right: 0;
  font-size: 1.75rem;
  font-weight: bold;
  padding: 0 0.75rem;
  color: rgba(0,0,0,0.2);
  cursor: pointer;
  user-select: none;
}
.modal-close:hover, .modal-close:focus {
  color: rgba(0,0,0,0.5);
}

.modal:nth-of-type(2) {
  justify-content: initial;
  align-items: initial;
  background-color: transparent;
}
.modal:nth-of-type(2) .modal-content {
  margin: 0;
  padding: 2rem 5rem;
  border-radius: 0;
  box-shadow: initial;
  width: 100%;
  height: 100%;
  max-height: 100%;
  text-align: justify;
}
.modal:nth-of-type(2) .modal-close {
  font-size: 3rem;
  padding: 0;
  width: 3rem;
  height: 3rem;
  display: flex;
  justify-content: center;
  align-items: center;
}
.modal:nth-of-type(2).modal-show {
  animation: none;
}
.modal:nth-of-type(2).modal-hide {
  animation: none;
}
.modal:nth-of-type(2).modal-show .modal-content {
  animation: zoomIn 0.3s ease-in-out forwards; 
}
.modal:nth-of-type(2).modal-hide .modal-content {
  animation: zoomOut 0.2s ease-in-out forwards;
}

.modal:nth-of-type(3) {
  justify-content: flex-end;
  align-items: flex-end;
  background-color: transparent;
  overflow: hidden;
}
.modal:nth-of-type(3).modal-show {
  animation: none;
}
.modal:nth-of-type(3).modal-hide {
  animation: none;
}
.modal:nth-of-type(3).modal-show .modal-content {
  animation: fadeInLeft 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; 
}
.modal:nth-of-type(3).modal-hide .modal-content {
  animation: fadeOutRight 0.2s ease-in-out forwards;
}

.modal:nth-of-type(4) .modal-content {
  padding: 0;
}
.modal:nth-of-type(4) .modal-header, .modal:nth-of-type(4) .modal-footer  {
  background-color: steelblue;
  padding: 1rem;
  color: #fff;
  text-align: center;
}
.modal:nth-of-type(4) .modal-header h1 {
  margin: 0;
}
.modal:nth-of-type(4) .modal-body {
  padding: 1.25rem;
}
.modal:nth-of-type(4) .modal-close {
  color: rgba(255,255,255,0.5);
}
.modal:nth-of-type(4) .modal-close:hover, .modal:nth-of-type(4) .modal-close:focus {
  color: rgba(255,255,255,0.75);
}

.modal:nth-of-type(5) {
  justify-content: center;
  align-items: center;
}
.modal:nth-of-type(5) .modal-content {
  padding: 0;
  height: 80%;
  max-height: 80%;
  width: auto;
  max-width: 80%;
  overflow: visible;
  border: 3px solid #fff;
}
.modal:nth-of-type(5) .modal-content img {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;  
}
.modal:nth-of-type(5) .modal-close {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0;
  width: 3rem;
  height: 3rem;
  font-size: 3rem;
  top: -1.5rem;
  right: -1.5rem;
  border-radius: 50%;
  color: #111;
  background-color: #fff;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.2);
}
.modal:nth-of-type(5) .modal-close:hover, .modal:nth-of-type(5) .modal-close:focus {
  color: #111; /* color: rgba(255,0,0,0.5); */
}
.modal:nth-of-type(5).modal-show .modal-content {
  animation: zoomIn 0.3s ease-in-out forwards;
}
.modal:nth-of-type(5).modal-hide .modal-content {
  animation: zoomOut 0.2s ease-in-out forwards;
}

/* Animations */
@keyframes fadeIn {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
@keyframes fadeOut {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
@keyframes fadeInDown {
  0% {
    opacity: 0;
    transform: translateY(-3rem);
  }
  100% {
    opacity: 1;
    transform: translateY(0); 
  }
}
@keyframes fadeOutUp {
  0% { 
    opacity: 1;
    transform: translateY(0);
  }
  100% {
    opacity: 0;
    transform: translateY(-3rem);
  }
}
@keyframes zoomIn {
  0% {
    opacity: 0;
    transform: scale(0.3);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}
@keyframes zoomOut {
  0% {
    opacity: 1;
    transform: scale(1);
  }
  100% {
    opacity: 0;
    transform: scale(0.3);
  }
}
@keyframes fadeInLeft {
  0% {
    opacity: 0;
    transform: translateX(100%);
  }
  100% {
    opacity: 1;
    transform: translateY(0); 
  }
}
@keyframes fadeOutRight {
  0% { 
    opacity: 1;
    transform: translateY(0);
  }
  100% {
    opacity: 0;
    transform: translateX(100%);
  }
}

/* Responsiveness */
@media(max-width: 992px) {
  html { font-size: 14px; }
  .modal-content { width: 80%; }
}
@media(max-width:767px) {
  html { font-size: 12px; }
  .modal-content { padding: 2rem 1rem 1rem 1rem; width: 90%; }
  .modal-content h1 { margin-bottom: 1.5rem; }
  .modal:nth-of-type(2) .modal-content { padding: 2rem 3rem; }
  .modal:nth-of-type(3) { justify-content: center; }
  .modal:nth-of-type(3) .modal-content { width: 80%; }
  .modal:nth-of-type(5) .modal-content { max-width: 85%; }
}



    .alert-box
	{
	  max-width : 300px;
	  min-height: 300px;
	
	}</style>
            
            <div class="modal" id="modal2">
  <div class="modal-content">
    <span class="modal-close">&times;</span>
    <link rel="stylesheet" href="./summernote/summernote-lite.css">

                            <form class="form-horizontal" method="POST" id="frmEnquiryef" enctype='multipart/form-data'>
                            <div id="mail-status"></div>
                                                                <div class="form-group">
                                        <label class="col-sm-2 control-label">À：</label>

                                        <div class="col-sm-8">
                                            <input type="text" name="userEmail" id="userEmail" class="form-control demoInputBox1" value="">
                                        </div>
                                        <a onclick="myFunction()" class="col-sm-2 control-label">Autre Destinataire</a>

                                    </div>
                                    <div id="myDIV" style="display:none">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">À：</label>

                                        <div class="col-sm-8">
                                            <input type="text" name="userEmail1" id="userEmail1" class="form-control demoInputBox1" value="">
                                        </div>
                                        <a onclick="myFunctio()" class="col-sm-2 control-label">Autre Destinataire</a>
                                    </div>
                                    </div>
                                    <div id="myDIVn" style="display:none">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">À：</label>

                                        <div class="col-sm-10">
                                            <input type="text" name="userEmail2" id="userEmail2" class="form-control demoInputBox1" value="">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">CC：</label>

                                        <div class="col-sm-8">
                                            <input type="text" name="cc" id="cc" class="form-control demoInputBox1" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">BCC：</label>

                                        <div class="col-sm-8">
                                            <input type="text" name="bcc" id="bcc" class="form-control demoInputBox1" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Objet：</label>

                                        <div class="col-sm-10">
                                            <input type="text" name="subject" id="subject" class="form-control demoInputBox1" value="">
                                        </div>
                                    </div>
                               

                            <div class="mail-text h-200"  >
                                   <textarea id="contents" name="content"  cols="60" rows="6">
                                   <?php 
foreach($tabval as $tabs):?>
    <?php echo $tabs->message;?>
<?php endforeach; ?>
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
                            <script src="./summernote/summernote-lite.js"></script>

                            <script>
	$('#contents').summernote({
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
<script type="text/javascript">

$(document).ready(function(e) {
		$("#frmEnquiryef").on('submit', (function(e) {
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
</div>
</div>


        </div>
    </div>
    </div>
</html>