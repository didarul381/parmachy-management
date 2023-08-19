$(document).ready(function(){
   //Ajax Call form Already exist Email Varification
   $("#stuemail").on("keypress blur",function(){
      var stuemail=$("#stuemail").val();
      $.ajax({
         url:'student/addstudent.php',
         method:'POST',
         data:{
            cheackemail:"cheackemail",
            stuemail:stuemail,
           
         },
         success:function(data){
            console.log(data);
            if(data!=0){
               $("#statusMsg2").html('<small> Email Id al ready exist</small>');
              $("#singup").attr("disabled",true);

            }else if(data==0){

               // $("#statusMsg2").html('<small> There you gos </small>');
               $("#singup").attr("disabled",false);
            }
         }
      })
   })
})



function addStu()
{
   var reg=/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
   var stuname=$("#stuname").val();
   var stuemail=$("#stuemail").val();
   var stupassword=$("#stupassword").val();
   // console.log(stuname);
   // console.log(stuemail);
   // console.log(stupassword);


   //Cheaking form fileds on form submmision
   if(stuname.trim()==""){
      $("#statusMsg1").html('<small >Please Enter Name</small>');
      $("#stuname").focus();
      return false;
   }else if(stuemail.trim()==""){
      $("#statusMsg2").html('<small>Please Enter Email</small>');
      $("#stuemail").focus();
      return false;
     }else if(stuemail.trim()!="" && !reg.test(stuemail)){
      $("#statusMsg2").html('<small>Please Enter valid Email</small>');
       $("#stuemail").focus();
       return false;
    }
   else if(stupassword.trim()==""){
      $("#statusMsg3").html('<small>Please Enter password</small>');
      $("#stupassword").focus();
      return false;
   }else{

      $.ajax({
         url:'student/addstudent.php',
         dataType:"json",
         method:'POST',
         data:{
          stusingup:"stusingup",
          stuname:stuname,
           stuemail:stuemail,
           stupassword:stupassword,
         },
  
     success:function(data){
      console.log(data);
       if(data =="OK"){
       $("#successMsg").html("<span class='alert alert-success'>Resgistration Successful..</span>");
       clearRegFileds();
     }
     else if(data == "Failed"){
        $("#successMsg").html('<span class="alert alert-success">Resgistration not Successful..</span>');
     
        }//else{
     //    $("#successMsg").html("<span class='alert alert-success'>Resgistration Successful..</span>");
     // }
     }
     });
     
   }
  
}
//Empty all fileds

function clearRegFileds(){
   $("#stuRegForm").trigger("reset");
   $("#statusMsg1").html(" ");
   $("#statusMsg2").html(" ");
   $("#statusMsg3").html(" ");
}

//Ajax call for student Login verification
function  addMedicine(){
   console.log("Log");
   var stuLogEmail=$("#stuLogemail").val();
   var stuPass=$("#stuLogpassword").val();
   $.ajax({

      url:'student/addstudent.php',
      method:"POST",
      data:{
         checkLogEmail:"checkLogEmail",
         stuLogEmail:stuLogEmail,
         stuPass:stuPass,

      },
      success:function(data){
         console.log(data);
         if(data==0){
            $("#StatusLogMsg").html('<smallclass="alert alert-danger">Invalid email id or password</smallclass=>');

         }else if(data==1){
            $("#StatusLogMsg").html(
            '<div class="spinner-border text-success" role="status"></div>'
            
            );
            setTimeout(()=>{
               window.location.href="index.php";
            },1000);
         }
      }
   })




}
// function addMedicine(){
//    console.log("hhh");
// }

