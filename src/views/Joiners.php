<?php
    session_start();
    require '../vendor/autoload.php';

    $objJobs = new JobRoles();
    $arrJobRoles = $objJobs->getJobRoles($_SESSION['company']);
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Joiner System</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
			body {font-family: Arial, Helvetica, sans-serif;}
			
			#content {
			
				margin: auto;
				width: 100%;
				height: 100vh;
				margin: auto;
			
			}
			
			.MainForm {
				border: 3px solid #f1f1f1;
				width: 50%;
				margin: auto;
				border-radius: 25px;
                position:relative;
			}

			input[type=text], input[type=date] {
				width: 100%;
				padding: 12px 5px;
				margin: 0px 0;
				display: inline-block;
				border: 1px solid #ccc;
				box-sizing: border-box;
			}
			
			input[type=radio] {
				padding:20px;
				display: inline-block;
				
			}
			
			select {
				font-size: 15px;
				width: 100%;
				padding: 12px 5px;
				margin: 0px 0;
				display: inline-block;
				border: 1px solid #ccc;
				box-sizing: border-box;
			
			}

			button {
				background-color: #0065A4;
				color: white;
				padding: 14px 20px;
				margin: 8px 0;
				border: none;
				cursor: pointer;
				width: 100%;
			}

			button:hover {
				opacity: 0.8;
			}

			.container {
				padding: 16px;
				border-radius: 25px;
				width: 100%;
			}

			img {
				height: 100px;
				padding-left: 40%;
			}
			
			.radio-choice * {
				vertical-align: middle;
			}

			.form-wrapper div{
				font-size: 20px;
				clear: both;
				border: 3px solid #f1f1f1;
				width: 140px;
				margin: auto;
				border-radius: 25px;
			}

			.form-wrapper span {
				display: inline-block;
				width: 50px;
				padding-right:20px;
				padding-left:20px;
			}

            textarea{
                width: 100%;
            }

            #loader{
                background: grey;
                position: absolute;
                top: 0;
                z-index: 1;
                bottom: 0;
                left: 0;
                right: 0;
                opacity: 0.5;
                display: none;
                align-items: center;
            }

		</style>
        <script>
            function showLoader() {
                /*display: flex;*/
                document.getElementById('loader').style.display = "flex";
            }
        </script>
    </head>
    <body>
        <br>
		<!--Following load the for-->
		<div id = "content" class = "main">
            <form action="../index.php" method="POST" class="MainForm" onsubmit="showLoader();/*console.log('asd');*/">
                <table class="container">
                    <tr>
                        <td><h4><b>First name:</b></h4>
                            <input type="text" name="FirstName" value="name" required>
                        </td>
                    </tr>
                    <tr>		
                        <td><h4><b>Surname:</b></h4>
                            <input type="text" name="Surname" value="surname" required>
                        </td>
                    </tr>
                    <tr>
                        <td><h4><b>Job Title</b></h4>
                            <select name="JobTitle">
                                <?php
                                    foreach ($arrJobRoles as $key => $role) {
                                        echo '<option value="' . $key . '">' . $role . '</option>';
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><h4><b>Department</b></h4>
                            <input type="text" name="Department" value="dep" required>
                        </td>
                    </tr>
                    <tr>
                        <td><h4><b>Line Manager</b></h4>
                            <input type="text" name="LineManager" value="manager" required>
                        <td>
                    </tr>
                    <tr>
                        <td><h4><b>Start Date</b></h4>
                            <input type="date" name="StartDate">
                        </td>
                    </tr>
                    <tr>
                        <td><h4><b>Comments</b></h4>
                            <textarea style='resize: none;' name='comments' rows='10' cols='auto'></textarea>
                        </td>
                    </tr>
                    <tr><td><button type="submit" name="joiner">Submit</button></td></tr>
                </table>
                <div id="loader">
                    <img src="../images/loader.gif"/>
                </div>
            </form>
        </div>
    </body>
</html>
