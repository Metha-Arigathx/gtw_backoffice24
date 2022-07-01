@extends('layouts.backend_admin')
    <link href="{{ asset('datepicker/dist/css/bootstrap-datepicker.css') }}" rel="stylesheet" />


@section('content')
<style>
    .center {
    margin: auto;
    width: 100%;
    padding: 10px;
    }
    body {
        font-family: 'Kanit', sans-serif;
        font-size: 13px;
       
        }

    label{
                font-family: 'Kanit', sans-serif;
                font-size: 13px;
              
        } 
</style>
<script>
    function checklogin(){
    window.location.href = '{{route("index")}}'; 
    }
</script>
<?php

    if(Auth::check()){
        $status = Auth::user()->status;
        $id_user = Auth::user()->PERSON_ID;   
    }else{
        
        echo "<body onload=\"checklogin()\"></body>";
        exit();
    } 
    $url = Request::url();
    $pos = strrpos($url, '/') + 1;
    $user_id = substr($url, $pos); 

    if($status=='USER' and $user_id != $id_user  ){
        echo "You do not have access to data.";
        exit();
    }
?>          
                    <!-- Advanced Tables -->               
<div class="content">
    <div class="block block-rounded block-bordered">
        <div class="block-content"> 
            <h2 class="content-heading pt-0" style="font-family: 'Kanit', sans-serif;">แก้ไขข้อมูลความเร่งด่วน</h2> 
    <form  method="post" action="{{ route('admin.updateinformcompriority') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row push">
                            {{-- <div class="col-lg-2">
                                <label >รหัส</label>
                            </div>
                            <div class="col-lg-4">
                                    <input name = "PRIORITY_ID"  id="PRIORITY_ID" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;" value="{{$compriorityT->PRIORITY_ID}}" readonly>
                                
                            </div> --}}
                            <div class="col-lg-2">
                                    <label >ความเร่งด่วน</label>
                                </div>
                            <div class="col-lg-4">
                                    <input  name = "PRIORITY_NAME"  id="PRIORITY_NAME" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;" value="{{$compriorityT->PRIORITY_NAME}}" onkeyup="check_priorityname();">
                                    <div style="color: red; font-size: 16px;" id="priorityname"></div> 
                                </div>                       
                            <input type="hidden" name = "PRIORITY_ID"  id="PRIORITY_ID" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;" value="{{$compriorityT->PRIORITY_ID}}">
                            <div class="col-lg-6">
                                   
                                </div>  
                    </div>
            <div class="modal-footer">
                <div align="right">
                    <button type="submit"  class="btn btn-hero-sm btn-hero-info" >บันทึกข้อมูล</button>
                        <a href="{{ url('admin_repair/Setupinformcompriority')  }}" class="btn btn-hero-sm btn-hero-danger" onclick="return confirm('ต้องการที่จะยกเลิกการเพิ่มข้อมูล ?')" >ยกเลิก</a> 
                </div>  
            </div>
    </form>  
 
@endsection

@section('footer')

<script>   
    function check_priorityname()
    {                         
        priorityname = document.getElementById("PRIORITY_NAME").value;             
            if (priorityname==null || priorityname==''){
            document.getElementById("priorityname").style.display = "";     
            text_priorityname = "*กรุณาระบุความเร่งด่วน";
            document.getElementById("priorityname").innerHTML = text_priorityname;
            }else{
            document.getElementById("priorityname").style.display = "none";
            }
    }
    

   </script>
    <script>      
    $('form').submit(function () {
     
      var priorityname,text_priorityname; 
     
      priorityname = document.getElementById("PRIORITY_NAME").value; 
   
                     
      if (priorityname==null || priorityname==''){
      document.getElementById("priorityname").style.display = "";     
      text_priorityname = "*กรุณาระบุความเร่งด่วน";
      document.getElementById("priorityname").innerHTML = text_priorityname;
      }else{
      document.getElementById("priorityname").style.display = "none";
      }
  
  
      if(priorityname==null || priorityname==''     
       )
    {
    alert("กรุณาตรวจสอบความถูกต้องของข้อมูล");      
    return false;   
    }
    }); 
</script>

@endsection