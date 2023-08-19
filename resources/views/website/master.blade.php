<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bongo-Learners</title>
    <!-- BootsStarp css -->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="{{asset('/')}}website/assets/css/responsive.css">
  <link rel="stylesheet" href="{{asset('/')}}website/assest/css/lineicons.css">
    <!-- fontwasome css -->
    <link rel="stylesheet" href="{{asset('/')}}website/assest/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
       <!-- custom css -->
       <link rel="stylesheet" href="./assest/css/style.css">
</head>
<body>
 @include('website.includes.header')
 <div class="container">
 @yield('body')
 </div>
















<!-- jquery and Booststarp js -->
<script  src="{{asset('/')}}website/assets/js/jquery-3.6.3.min.js"></script>
<script src="{{asset('/')}}website/assets/js/popper.min.js"></script>
<script src="{{asset('/')}}website/assets/js/bootstrap.bundle.min.js"></script>
<script  src="{{asset('/')}}website/assets/js/bootstrap.min.js"></script>
<script src="{{asset('/')}}website/assets/js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}website/assets/js/typeWrittine.js"></script>

<!-- Fontwasome Js -->
<script  src="{{asset('/')}}website/assets/js/all.min.js"></script>
<!-- ajxrequest Js -->
<script  src="{{asset('/')}}website/assets/js/ajxrequest.js"></script>
<!-- admin ajxrequest Js -->
<script  src="{{asset('/')}}website/assets/js/admin_ajx.js"></script>








<script>
  $(".delete").click(function(){//***Showing Alert When Deleting*****

var element = $(this);

var del_id = element.attr("id");

var info = 'id='+del_id;

if(confirm("Delte This Product!!Are You Sure??")){

  $.ajax({

    type :"GET",
    url  :'{{route('medicine.delete')}}',
    data :info,
    success:function(){
      location.reload(true);
    },
    error:function(){
      alert("error");
    }

  });
  
}
return false;

});//***Showing Alert When Deleting********

</script>
<script type="text/javascript">
function med_name1() {//***Search For Medicine *****
  var input, filter, table, tr, td, i;
  input = document.getElementById("name_med1");
  filter = input.value.toUpperCase();
  table = document.getElementById("table0");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function quanti() {//***Search For quantity *****
  var input, filter, table, tr, td, i;
  input = document.getElementById("med_name");
  filter = input.value.toUpperCase();
  table = document.getElementById("table0");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>


</body>


</html>