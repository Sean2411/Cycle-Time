<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title contenteditable="false">CycleTime</title>
     <link rel="stylesheet" href="css/normalize.css">
     <link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="css/main.css">
     <link rel="stylesheet" href="css/responsive.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="css/dialog.css" rel="stylesheet">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">
     <link rel="stylesheet" href="css/header.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script src="js/dialog.js" type="text/javascript"></script>
  </head>
  <body> 
<?php include 'header.php';?>
<?php include 'dialog.php';?>
    <div id="wrapper">
    <section>
     <p>
      The company is looking to create a tool which can assist its clients to predict how long a process will take.
The client will be able to use the tool to define cycle times and a process algorithm (metrics, grouping,
sequence) based on historical data provided by the client or available on the company’s database. The
tool will use the information to predict how long the best customers will take to execute future tasks.
The tool must provide a simple drag and drop interface to allow the users to create a process map based
on a sequence of predefined cycle times (basic building blocks).
The process will consist of several steps:
</P>
<ul>
­<li> Some will need to be performed by a system admin. These include the loading of data into the
system, the process of data standardization in order to enable the company's database to store
data from different clients, the creation of cycle times, and the selection of the statistical values
that will be calculated.</li>

­<li> Clients (system users) will then have the ability to use the previously created cycle times or
create their own to define the process map. Once the process map has been defined, and
calculations completed, they will have the ability to apply a series of filters to obtain the best
possible candidates (customers) for completing future tasks. The results will be based on
calculations enabled by the definition of the process maps and customs filters applied by the
clients.</li>
</ul>
    </section>
  <?php include 'footer.php';?>
  </div>
  </body>
</html>
