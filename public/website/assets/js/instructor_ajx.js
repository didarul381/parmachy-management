$(document).ready(function(){
    //Ajax Call form Already exist Email Varification
    $("#instemail").on("keypress blur",function(){
       var instemail=$("#instemail").val();
       $.ajax({
          url:'add-instructor.php',
          method:'POST',
          data:{
             cheackemail:"cheackemail",
             instemail:instemail,
            
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
 
 
 
 function addInst()
 {
    var reg=/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var instname=$("#instname").val();
    var instemail=$("#instemail").val();
    var instpassword=$("#instpassword").val();
    console.log(instname);
    // console.log(stuemail);
    // console.log(stupassword);
 
 
    //Cheaking form fileds on form submmision
    if(instname.trim()==""){
       $("#statusMsg1").html('<small >Please Enter Name</small>');
       $("#instname").focus();
       return false;
    }else if(instemail.trim()==""){
       $("#statusMsg2").html('<small>Please Enter Email</small>');
       $("#instemail").focus();
       return false;
      }else if(instemail.trim()!="" && !reg.test(instemail)){
       $("#statusMsg2").html('<small>Please Enter valid Email</small>');
        $("#instemail").focus();
        return false;
     }
    else if(instpassword.trim()==""){
       $("#statusMsg3").html('<small>Please Enter password</small>');
       $("#instpassword").focus();
       return false;
    }else{
 
       $.ajax({
          url:'add-instructor.php',
          dataType:"json",
          method:'POST',
          data:{
            instsingup:"stusingup",
            instname:instname,
            instemail:instemail,
            instpassword:instpassword,
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
    $("#instRegForm").trigger("reset");
    $("#statusMsg1").html(" ");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");
 }
 
 //Ajax call for student Login verification
 function  checkInstLogin(){
    console.log("Log");
    var instLogEmail=$("#instLogemail").val();
    var instPass=$("#instLogpassword").val();
    $.ajax({
 
       url:'add-instructor.php',
       method:"POST",
       data:{
          checkLogEmail:"checkLogEmail",
          instLogEmail:instLogEmail,
          instPass:instPass,
 
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
                window.location.href="../../../E-Learning/instructor/inst-deshbord.php";
             },1000);
          }
       }
    })
 
 
 }