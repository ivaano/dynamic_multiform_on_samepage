<?php
 // this would destroy the session variables on each reload
session_start();
session_destroy(); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/form.css" type="text/css" />
<title>Multi form Demo</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/multiform.js"></script>
</head>
<body>
	<div class="main_box">
		<h2>multiple dynamic forms on same page with jquery</h2>
		<div style='text-align: left'>The forms are constructed in php,an we make a call with jquery asking for the form that user has selecte, User data is saved in a session, everytime a new form is selected either
		via the Next/Previous buttons or by clicking on the Edit link for each form.
		<br/><br/>
	<a href="sessionview.php">Click Here</a> To view current session data.
		<br/><br/>
		To clear session just reload this page.
		<br/><br/>
		</div>
                        <div class="left_block_box">
                            	<div class="left_block_title">
                                	Form Steps 
                                </div>
                            	<div id="edit_step_box">
                                	<table width="100%" cellspacing="0" cellpadding="0" border="0" style="font-size: 11px;" id="stepTable">
                                      <tr class="stepSelected">
                                        <td class="formStep">Name</td>
										<td class="stepEdit"><span id="formstep1" class="pointer placeEdit">Edit</span> </td>
										</tr><tr >
                                        <td class="formStep">Address</td>
										<td class="stepEdit"><span id="formstep2" class="pointer placeEdit">Edit</span> </td>
										</tr><tr >
                                        <td class="formStep">Interests:</td>
										<td class="stepEdit"><span id="formstep3" class="pointer placeEdit">Edit</span></td>
										</tr>

									</table>
                                </div>
                            </div>
                        	<div class="right_block_box">
                            	<div class="right_block_title" id="formTitle">
                                	Form 1
                                </div>
                                <div class="multiform_part">
									Aqui va la forma
                                </div>
								<div id="form_step_nav_wrap">
									<div id="form_step_nav">
										<div id="form_step_left">
										<input type="button" value="Previous Step" id="prevStepBtn">	
										</div>
										<div id="form_step_right">
										<input type="button" value="Next Step" id="nextStepBtn" >	
										<input type="button" value="Preview Data" style="display: none" id="previewBtn" >	
										</div>
									</div>
								</div>
	</div>
</body>
</html>
