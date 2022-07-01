@extends('layouts.backend')
    
    <link href="{{ asset('datepicker/dist/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
    <link href="{{asset('select2/select2.min.css')}}" rel="stylesheet" />


@section('content')

<style>
.center {
  margin: auto;
  width: 100%;
  padding: 10px;
}
body {
      font-family: 'Kanit', sans-serif;
      font-size: 14px;
      
      }

      .form-control{
            font-family: 'Kanit', sans-serif;
            font-size: 13px;
            }

label{
            font-family: 'Kanit', sans-serif;
            font-size: 14px;
            
      }   

      input::-webkit-calendar-picker-indicator{ 
  
    font-family: 'Kanit', sans-serif;
            font-size: 14px;
          
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

?>
<?php
function RemoveDateThai($strDate)
{
  $strYear = date("Y",strtotime($strDate))+543;
  $strMonth= date("n",strtotime($strDate));
  $strDay= date("j",strtotime($strDate));

  $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
  $strMonthThai=$strMonthCut[$strMonth];
  return "$strDay $strMonthThai $strYear";
  }
  function Removeformate($strDate)
{
  $strYear = date("Y",strtotime($strDate));
  $strMonth= date("m",strtotime($strDate));
  $strDay= date("d",strtotime($strDate));

  return $strDay."/".$strMonth."/".$strYear;
  }  

  $datenow = date('Y-m-d');


  $m_budget = date("m");
  //$m_budget = 10;
 // echo $m_budget; 
  if($m_budget>9){
    $yearbudget = date("Y")+544;
  }else{
    $yearbudget = date("Y")+543;
  }
  //echo $yearbudget;
  

?>  

<body >
                    <!-- Advanced Tables -->
                    <div class="bg-body-light">
                    <div class="content">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                             <h1 style="font-family: 'Kanit', sans-serif; font-size:15px;font-size: 1.3rem;font-weight:normal;">{{ $inforpersonuser -> HR_PREFIX_NAME }}   {{ $inforpersonuser -> HR_FNAME }}  {{ $inforpersonuser -> HR_LNAME }}</h1> 
                             <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                <div class="row">
                                <div>
                                <a href="{{ url('general_asset/dashboard/'.$inforpersonuserid -> ID)}}" class="btn" style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;background-color:#DCDCDC;color:#696969;">Dashboard</a> 
                                </div>
                                <div>&nbsp;</div>     
                                <div>
                                <a href="{{ url('general_asset/genassetindex/'.$inforpersonuserid -> ID)}}" class="btn" style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;background-color:#DCDCDC;color:#696969;">ทะเบียนครุภัณฑ์</a> 
                                </div>
                                <div>&nbsp;</div>                      
                                <div>
                                <a href="{{ url('general_asset/genassetdisburseindex/'.$inforpersonuserid -> ID)}}" class="btn" style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;background-color:#00BFFF;color:#F0FFFF;">ทะเบียนเบิกครุภัณฑ์  
                                </a> 
                                </div>
                                <div>&nbsp;</div>
                                <div>
                                <a href="{{ url('general_asset/infolendindex/'.$inforpersonuserid -> ID)}}" class="btn" style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;background-color:#DCDCDC;color:#696969;">ทะเบียนยืม
                                </a>   
                                </div>           
                                <div>&nbsp;</div>
                                <div>
                                <a href="{{ url('general_asset/infogiveindex/'.$inforpersonuserid -> ID)}}" class="btn" style="font-family: 'Kanit', sans-serif; font-size: 10px;font-size: 1.0rem;font-weight:normal;background-color:#DCDCDC;color:#696969;">ทะเบียนถูกยืม
                                </a>   
                                </div>    
                         
                                
                                </div>
                                </ol>
                            </nav> 
                        </div>
                    </div>
                </div>
                <div class="content">
                <div class="block block-rounded block-bordered">

            
                <div class="block-content">    
                <h2 class="content-heading pt-0" style="font-family: 'Kanit', sans-serif;"><i class="fas fa-plus"></i> เพิ่มการขอเบิกทรัพย์สิน</h2> 
                        
       
           <form  method="post" action="{{ route('asset.infodisbursesave') }}"  enctype="multipart/form-data"> 
        @csrf
       
       

       <div class="row push">
            <div class="col-sm-2">
                <label>ผู้ขอเบิก :</label>
            </div> 
            <div class="col-lg-4">
            {{$inforpersonuser -> HR_FNAME}} {{$inforpersonuser -> HR_LNAME}} 
            <input type="hidden" name="SAVE_HR_ID" id="SAVE_HR_ID"  value="{{ $inforpersonuserid -> ID }}">    
            <input type="hidden" name="SAVE_HR_NAME" id="SAVE_HR_NAME" value="{{ $inforpersonuser -> HR_PREFIX_NAME }}{{ $inforpersonuser -> HR_FNAME }}  {{ $inforpersonuser -> HR_LNAME }}">    
            </div> 
           
            <div class="col-sm-2">
                <label>หน่วยงานผู้ขอเบิก :</label>
            </div> 
            <div class="col-lg-4">
            {{$inforpersonuser -> HR_DEPARTMENT_SUB_SUB_NAME}}

   
            <input type="hidden" name="DEP_SUB_SUB_ID" id="DEP_SUB_SUB_ID" value="{{$inforpersonuser -> HR_DEPARTMENT_SUB_SUB_ID}}">
            <input type="hidden" name="DEP_SUB_SUB_NAME" id="DEP_SUB_SUB_NAME" value="{{$inforpersonuser -> HR_DEPARTMENT_SUB_SUB_NAME}}">
            </div>
         
        </div>
       <div class="row push">
            <div class="col-sm-2">
                <label>ปีงบประมาณ :</label>
            </div> 
            <div class="col-lg-4">
                                    <select name="YEAR_ID" id="YEAR_ID" class="form-control input-lg" style=" font-family: 'Kanit', sans-serif;" onchange="checkdatebegin();checkdateend();checkall();">
                                    @foreach ($budgetyears as $budgetyear) 
                                            @if($budgetyear ->LEAVE_YEAR_ID == $yearbudget)
                                            <option value="{{ $budgetyear ->LEAVE_YEAR_ID  }}" selected>{{ $budgetyear->LEAVE_YEAR_NAME }}</option>
                                            @else
                                            <option value="{{ $budgetyear ->LEAVE_YEAR_ID  }}">{{ $budgetyear->LEAVE_YEAR_NAME }}</option>
                                            @endif
                                    @endforeach 
                                    </select> 
            
            </div>
            <div class="col-sm-2">
                <label>ใบสำคัญเบิกเลขที่ :</label>
            </div> 
            <div class="col-lg-4">
            <input name="BILL_NUMBER" id="BILL_NUMBER" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" >
            
            </div>


           
        </div>

        <div class="row push">
            <div class="col-sm-2">
                <label>วันที่ต้องการ :</label>
            </div> 
            <div class="col-lg-4">
            <input name="DATE_WANT" id="DATE_WANT" class="form-control input-sm datepicker" data-date-format="mm/dd/yyyy"  readonly>
            
            </div>
            <div class="col-sm-2">
                <label>วันที่เบิก :</label>
            </div> 
            <div class="col-lg-4">
            <input name="DATE_OPEN" id="DATE_OPEN" class="form-control input-sm datepicker" data-date-format="mm/dd/yyyy"  readonly>
            
            </div>


           
        </div>

       <div class="row push">

       <div class="col-sm-2">
        <label>เหตุผลการขอเบิก :</label>
        </div> 
        <div class="col-sm-10">
        <input name="REQUEST_FOR" id="REQUEST_FOR" class="form-control input-sm" style=" font-family: 'Kanit', sans-serif;" >
        </div> 
       </div>

       <table class="table gwt-table" >
            <thead style="background-color: #FFEBCD;">
                <tr height="40">
                    
                    <td style="text-align: center;border: 1px solid #180202;">ครุภัณฑ์ที่ต้องการเบิก </td>
                    <td style="text-align: center;border: 1px solid #180202;">หน่วยนับ </td>
                    <td style="text-align: center;border: 1px solid #180202;">ราคาต่อหน่วย </td>
                
                    <td style="text-align: center;border: 1px solid #180202;" width="12%">
                        <a  class="btn btn-hero-sm btn-hero-success addRow" style="color:#FFFFFF;"><i class="fa fa-plus-square"></i></a>
                    </td>
                </tr>
            </thead>
            <tbody class="tbody1">
                <tr height="40">
                 
                    <td>
                       
                    
                        <select name="ASSET_REQUEST_SUB_ARTICLE_ID[]" id="ASSET_REQUEST_SUB_ARTICLE_ID0" class="form-control input-sm " onchange="checkunitname(0);checkpice(0);" style=" font-family: 'Kanit', sans-serif;" >
                        <option value="" selected>--กรุณาเครุภัณฑ์--</option>
                                           @foreach ($inforequestassets as $inforequestasset)                    
                                            <option value="{{ $inforequestasset -> ARTICLE_ID }}">{{ $inforequestasset -> ARTICLE_NUM }} >> {{ $inforequestasset -> ARTICLE_NAME }}</option>           
                                            @endforeach  
                         </select> 
                    
                    
                    
                    </td>

                    <td><div class="showunitname0"></div></td>
                    <td><div class="showpice0"></div></td>

                 
                  
                    <td style="text-align: center;"><a class="btn btn-hero-sm btn-hero-danger remove" style="color:#FFFFFF;"><i class="fa fa-trash-alt"></i></a></td>
                </tr>
            </tbody>
        </table>
              <br> 
        <div class="modal-footer">
            <div align="right">
                <button type="submit"  class="btn btn-hero-sm btn-hero-info" ><i class="fas fa-save mr-2"></i> บันทึกข้อมูล</button>
                    <a href="{{ url('general_asset/genassetdisburseindex/'.$inforpersonuserid -> ID) }}" class="btn btn-hero-sm btn-hero-danger" onclick="return confirm('ต้องการที่จะยกเลิกการเพิ่มข้อมูล ?')" ><i class="fas fa-window-close mr-2"></i> ยกเลิก</a>
            </div>
        </div>
    </form>  

   
                  

@endsection

@section('footer')



<script src="{{ asset('asset/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
<script>jQuery(function(){ Dashmix.helpers(['masked-inputs']); });</script>
<script src="{{ asset('select2/select2.min.js') }}"></script>
<script src="{{ asset('datepicker/dist/js/bootstrap-datepicker-custom.js') }}"></script>
<script src="{{ asset('datepicker/dist/locales/bootstrap-datepicker.th.min.js') }}" charset="UTF-8"></script>
<script>
  $(document).ready(function () {
            
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: true,
                language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                thaiyear: true,
                autoclose: true                         //Set เป็นปี พ.ศ.
            });  //กำหนดเป็นวันปัจุบัน
    });

    $(document).ready(function() {
    $('select').select2();
});

$('.addRow').on('click',function(){
        addRow();
        $('select').select2();
    });

    function addRow(){
    var count = $('.tbody1').children('tr').length;
        var tr =   '<tr>'+
                '<td>'+
                '<select name="ASSET_REQUEST_SUB_ARTICLE_ID[]" id="ASSET_REQUEST_SUB_ARTICLE_ID'+count+'" class="form-control input-sm " style=" font-family: \'Kanit\', sans-serif;" onchange="checkunitname('+count+');checkpice('+count+');" >'+
                '<option value="" selected>--กรุณาเครุภัณฑ์--</option>'+
                '@foreach ($inforequestassets as $inforequestasset)'+                    
                '<option value="{{ $inforequestasset -> ARTICLE_ID }}">{{ $inforequestasset -> ARTICLE_NUM }} >> {{ $inforequestasset -> ARTICLE_NAME }}</option>'+           
                '@endforeach'+  
                ' </select>'+            
                '</td>'+

                '<td><div class="showunitname'+count+'"></div></td>'+
                '<td><div class="showpice'+count+'"></div></td>'+
              
                '<td style="text-align: center;"><a class="btn btn-hero-sm btn-hero-danger remove" style="color:#FFFFFF;"><i class="fa fa-trash-alt"></i></a></td>'+
                '</tr>';
    $('.tbody1').append(tr);
    };

    $('.tbody1').on('click','.remove', function(){
        $(this).parent().parent().remove();
});
</script>
<script> 
    $('body').on('keydown', 'input, select, textarea', function(e) {
    var self = $(this)
      , form = self.parents('form:eq(0)')
      , focusable
      , next
      ;
    if (e.keyCode == 13) {
        focusable = form.find('input,a,select,button,textarea').filter(':visible');
        next = focusable.eq(focusable.index(this)+1);
        if (next.length) {
            next.focus();
        } else {
            form.submit();
        }
        return false;
    }
});


 //-------------------------------------------------

 
 $('.type_sub').change(function(){
             if($(this).val()!=''){
             var select=$(this).val();
             var _token=$('input[name="_token"]').val();
             $.ajax({
                     url:"{{route('suplies.fetchdetail')}}",
                     method:"GET",
                     data:{select:select,_token:_token},
                     success:function(result){
                        $('.detail').html(result);
                     }
             })
            // console.log(select);
             }        
     });

 function chkNumber(ele){
var vchar = String.fromCharCode(event.keyCode);
if ((vchar<'0' || vchar>'9')) return false;
ele.onKeyPress=vchar;
}
//-----------------------------------------------------

 function checksummoney(number){
      
    
      var SUPPLIES_REQUEST_SUB_AMOUNT=document.getElementById("SUPPLIES_REQUEST_SUB_AMOUNT"+number).value;
      var SUPPLIES_REQUEST_SUB_PRICE=document.getElementById("SUPPLIES_REQUEST_SUB_PRICE"+number).value;
      
      //alert(PERSON_ID);
      
      var _token=$('input[name="_token"]').val();
           $.ajax({
                   url:"{{route('suplies.checksummoney')}}",
                   method:"GET",
                   data:{SUPPLIES_REQUEST_SUB_AMOUNT:SUPPLIES_REQUEST_SUB_AMOUNT,SUPPLIES_REQUEST_SUB_PRICE:SUPPLIES_REQUEST_SUB_PRICE,_token:_token},
                   success:function(result){
                      $('.summoney'+number).html(result);
                   }
           })

  }




function checkunitname(number){
      
    
    var ARTICLE_ID=document.getElementById("ASSET_REQUEST_SUB_ARTICLE_ID"+number).value;
      
      //alert(ARTICLE_ID);
      
      var _token=$('input[name="_token"]').val();
           $.ajax({
                   url:"{{route('asset.checkunitname')}}",
                   method:"GET",
                   data:{ARTICLE_ID:ARTICLE_ID,_token:_token},
                   success:function(result){
                      $('.showunitname'+number).html(result);
                   }
           })

        

  }

  function checkpice(number){
      
    
      var ARTICLE_ID=document.getElementById("ASSET_REQUEST_SUB_ARTICLE_ID"+number).value;
      
      //alert(ARTICLE_ID);
      
      var _token=$('input[name="_token"]').val();
           $.ajax({
                   url:"{{route('asset.checkpice')}}",
                   method:"GET",
                   data:{ARTICLE_ID:ARTICLE_ID,_token:_token},
                   success:function(result){
                      $('.showpice'+number).html(result);
                   }
           })

  }
  
  
</script>



@endsection