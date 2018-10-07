<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- Bootstrap core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.8/css/mdb.min.css" rel="stylesheet">
	<!-- JQuery -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.8/js/mdb.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>

</head>
	<!-- Nav tabs -->
	<h6 id="testInput"></h6>
 <ul class="nav nav-tabs md-tabs nav-justified" style="background-color: #000080" role="tablist">
     <li class="nav-item">
         <a class="nav-link active" data-toggle="tab" href="#members" role="tab" onclick="getKeys();"><i class="fa fa-users"></i> Members</a>
     </li>
     <li class="nav-item">
         <a class="nav-link" data-toggle="tab" href="#discussions" role="tab" onclick="getValues();"><i class="fa fa-comments"></i> Discussions</a>
     </li>
     <li class="nav-item" id="navhotel">
         <a class="nav-link" data-toggle="tab" href="#summary" role="tab" onclick="ajaxCall();"><i class="fa fa-list-alt"></i> Summary</a>
     </li>
 </ul>

<body>
 <!-- Tab panels -->
 <div class="tab-content">
 	<!-- <div class="container"> -->
 		<div class="row">
 			<div class="col-md-4">
 				<!--Panel 1-->
			     <div class="tab-pane fade in show active" id="members" role="tabpanel">
			         <br>
			         
			     </div>
     <!--/.Panel 1-->
 			</div>
 			<div class="col-md-4">
 				<!--Panel 2-->
			     <div class="tab-pane fade" id="discussions" role="tabpanel">
			         <br>
			     </div>
			     <!--/.Panel 2-->
 			</div>
 			<div class="col-md-4">
 				<!--Panel 3-->
			     <div class="tab-pane fade" id="summary" role="tabpanel">
			         <br>

			     </div>
			     <!--/.Panel 3-->

 			</div>
 		</div>
 	<!-- </div> -->
     

     

     
 </div>
</body>


  <script src="https://www.gstatic.com/firebasejs/5.5.3/firebase.js"></script>
  <script>
    // Initialize Firebase
    // TODO: Replace with your project's customized code snippet
    var config = {
      apiKey: "AIzaSyC0T0dJ6baQ8N4c_6yAA1qkrpG9n-B-UGc",
      authDomain: "audiowala-5dc5f.firebaseapp.com",
      databaseURL: "https://audiowala-5dc5f.firebaseio.com",
      projectId: "audiowala-5dc5f"
      // storageBucket: "<BUCKET>.appspot.com",
      // messagingSenderId: "<SENDER_ID>",
    };

    firebase.initializeApp(config);
    var database = firebase.database().ref();
    var childData="";
    var keys = [];
    var values = [];
    database.on('value',function(snapshot){
      snapshot.forEach(function(childSnapshot){
        k = childSnapshot.key;
        v = childSnapshot.val();
        keys.push(k);
        values.push(v);
        childData = childData + v;
        // alert(childData);
        document.getElementById('testInput').value = childData;
      });
    });
    
    function getKeys()
    {
    	var output = "";
    	for(var i=0;i<keys.length;i++)
    	{
    		output += keys[i] + "<br>"; 
    	}
    	document.getElementById("members").innerHTML = output;
    	document.getElementById("discussions").innerHTML = "";
    	document.getElementById("summary").innerHTML = "";
    }

    function getValues()
    {
    	var output = "";
    	for(var i=0;i<values.length;i++)
    	{
    		output += values[i] + "<br><br>"; 
    	}
    	//output += "</ul>";
    	document.getElementById("discussions").innerHTML = output;
    	document.getElementById("summary").innerHTML = "";
    	document.getElementById("members").innerHTML= "";
    }
    
  </script>
  <script type="text/javascript">
    

      function ajaxCall()
      {
        var firebaseData = $('#testInput').val();
        // alert("Inside ajaxCall()");
        // alert(firebaseData);
        $.ajax({
          url: "python.php",
          method: "POST",
          data: {'data' : firebaseData},
          success : function(response) {
                  //alert("inside success!");
                $('#summary').html(response);
                $('#members').html('');
                $('#discussions').html('');
              }
          });
      }
  </script>