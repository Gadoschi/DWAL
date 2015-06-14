<?php

	include 'classes/connection.php';
	?>
	
<!DOCTYPE html>
<html>
<head>

	<title>ZKD 2014</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" href="css/grid.css" />
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body id="top">
	<header class="site-header">
		<div class="row">
			<h1 class="logo"><img src="images/logo.png" style="width: 400px; height: 60px;"/></h1>
			<a href="login.html">Prijava</a>
			<a href="#top">Znanja</a>
			<a href="#skolovanje">Školovanje</a>
			<a href="#top">Osobno</a>
					
		</div>
	</header>
  
    <section class="gray-boxes row">
		<nav class="main-navigation">
			<ul>
			  <li><a href="index.html">Pocetna</a></li>
			  <li><a href="popis_proizvoda.php">Popis proizvoda</a></li>
			  <li><a href="unos_proizvoda.php">Unos proizvoda</a></li>
			  <li><a href="#">Kako nas naci</a></li>
			  <li><a href="#">Kontakt</a></li>
			</ul>
		</nav>

    <div class="column column-9">

    		<div class="mainContent">
    			<form class="form-horizontal form1" role="form" method="get">
    				<div class="form-group">
    					<label class="col-sm-2 control-label" for="name">Ime</label>
    					<div class="input-group col-sm-9">
    						<input id="name" name="name" type="text" class="form-control" placeholder="Upišite ime" />
    						<span class="input-group-btn">
    								<button type="button" class="btn btn-default btnSearchByName">
    									<span class="glyphicon glyphicon-search"> Traži</span>
    								</button>
    						</span>
    					</div>
    				</div>
    			</form>

                <form class="form-horizontal form2" role="form" method="get">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="id">Id</label>
                        <div class="input-group col-sm-9">
                            <input id="id" name="id" type="text" class="form-control" placeholder="Upišite ID" />
                            <span class="input-group-btn">
                                    <button type="button" class="btn btn-default btnSearchById">
                                        <span class="glyphicon glyphicon-search"> Traži</span>
                                    </button>
                            </span>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                        <!-- This table is where the data is display. -->
                            <table id="resultTable" class="table table-striped table-hover">
                                <thead>
                                    <th>Id</th>
                                    <th>Naziv</th>
                                    <th>Tip</th>
                                    <th>Cijena</th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                </div>
            </div>
		</div>
	</section>
		
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	jQuery(document).ready(function($) {
            // This is the code to search by name
    		$('.btnSearchByName').click(function(){
                if (!validateData($('input#name').val())) {
                    showErrorPanel("You need to fill the data in order to get results!");
                    return false;
                }
    			makeAjaxRequest("name");
    		});

            $('.form1').submit(function(e){
                e.preventDefault();
                if (!validateData($('input#name').val())) {
                    showErrorPanel("You need to fill the data in order to get results!");
                    return false;
                }
                validateData()
                makeAjaxRequest("name");
                return false;
            });
            // end code to search by name
            // This is the code to search by Id
            $('.btnSearchById').click(function(){
                if (!validateData($('input#id').val())) {
                    showErrorPanel("You need to fill the data in order to get results!");
                    return false;
                }
                makeAjaxRequest("id");
            });

            $('.form2').submit(function(e){
                e.preventDefault();
                if (!validateData($('input#id').val())) {
                    showErrorPanel("You need to fill the data in order to get results!");
                    return false;
                }
                validateData()
                makeAjaxRequest("id");
                return false;
            });
            // end code to search by id


            function makeAjaxRequest(type) {
                if (type == "name") {
                    $.ajax({url: 'classes/search.php',
                        type: 'get',
                        data: {name: $('input#name').val()},
                        success: function(response) {
                            $('table#resultTable tbody').html(response);
                        }
                    });
                } else if (type == "id") {
                    $.ajax({url: 'classes/searchById.php',
                        type: 'get',
                        data: {id: $('input#id').val()},
                        success: function(response) {
                            $('table#resultTable tbody').html(response);
                        }
                    });
                }
            }
            function validateData(data) {
                if (data == "") {
                    return false;
                } else {
                    return true;
                }
            }

            function showErrorPanel(msg) {
                $('.notificationPanel div:eq(1)').text(msg).wrap("<strong></strong>");
                $('.notificationPanel').slideDown('normal');
                setTimeout(function() {
                    $('.notificationPanel').slideUp('normal');
                }, 3500)

            }
    	});
    </script>

	<footer class="site-footer">
		<p>Copyright &copy ZKD j.d.o.o. @2015. </p>
		
	</footer>
	
</body>
</html>