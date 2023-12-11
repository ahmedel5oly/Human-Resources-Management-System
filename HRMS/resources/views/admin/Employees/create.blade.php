@extends('layouts.admin')
@section('title')
بيانات الموظفين
@endsection
@section("css")
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('contentheader')
قائمة الضبط
@endsection
@section('contentheaderactivelink')
<a href="{{ route('Employees.index') }}">     الموظفين</a>
@endsection
@section('contentheaderactive')
اضافة
@endsection
@section('content')
<div class="col-12">
   <div class="card">
      <div class="card-header">
         <h3 class="card-title card_title_center">  اضافة  موظف جديد
         </h3>
      </div>
      <div class="card-body">
         <form action="{{ route('Employees.store') }}" method="post" enctype="multipart/form-data">
            @csrf
      
   <!-- /.card -->
   <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title text-right" style="width: 100%;
        text-align: right !important;">
          <i class="fas fa-edit"></i>
          البيانات المطلوبة للموظف
        </h3>
      </div>
      <div class="card-body">
      
        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="personal_date" data-toggle="pill" href="#custom-content-personal_data" role="tab" aria-controls="custom-content-personal_data" aria-selected="true">البيانات الاساسية</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="jobs_data" data-toggle="pill" href="#custom-content-jobs_data" role="tab" aria-controls="custom-content-jobs_data" aria-selected="false">بيانات العمل</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" id="addtional_data" data-toggle="pill" href="#custom-content-addtional_data" role="tab" aria-controls="custom-content-addtional_data" aria-selected="false">بيانات اضافية</a>
          </li> --}}
          
        </ul>
        <div class="tab-content" id="custom-content-below-tabContent">
          <div class="tab-pane fade show active" id="custom-content-personal_data" role="tabpanel" aria-labelledby="personal_date">
          <br>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>    اسم الموظف  </label>
                     <input type="text" name="emp_name" id="emp_name" class="form-control" value="{{ old('emp_name') }}" >
                     @error('emp_name')
                     <span class="text-danger">{{ $message }}</span> 
                     @enderror
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>  النوع </label>
                     <select  name="emp_gender" id="emp_gender" class="form-control">
                     <option   @if(old('emp_gender')==1) selected @endif  value="1">ذكر</option>
                     <option @if(old('emp_gender')==2 ) selected @endif value="1">انثي</option>
                     </select>
                     @error('emp_gender')
                     <span class="text-danger">{{ $message }}</span> 
                     @enderror
                  </div>
               </div>
              
               <div class="col-md-4">
                  <div class="form-group">
                     <label>        تاريخ الميلاد</label>
                     <input type="date" name="brith_date" id="brith_date" class="form-control" value="{{ old('brith_date') }}" >
                     @error('brith_date')
                     <span class="text-danger">{{ $message }}</span> 
                     @enderror
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>   الرقم القومى</label>
                     <input type="text" name="emp_national_idenity" id="emp_national_idenity" class="form-control" value="{{ old('emp_national_idenity') }}" >
                     @error('emp_national_idenity')
                     <span class="text-danger">{{ $message }}</span> 
                     @enderror
                  </div>
               </div>
                
               <div class="col-md-4">
                  <div class="form-group">
                     <label>    الجنسية</label>
                     <select name="emp_nationality_id" id="emp_nationality_id" class="form-control select2 ">
                        <option value="">اختر الجنسية</option>
                        @if (@isset($other['nationalities']) && !@empty($other['nationalities']))
                        @foreach ($other['nationalities'] as $info )
                        <option @if(old('emp_nationality_id')==$info->id) selected="selected" @endif value="{{ $info->id }}"> {{ $info->name }} </option>
                        @endforeach
                        @endif
                     </select>
                     @error('emp_nationality_id')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>
               </div>
               
               <div class="col-md-4">
                  <div class="form-group">
                     <label>    العنوان</label>
                     <input type="text" name="staies_address" id="staies_address" class="form-control" value="{{ old('staies_address') }}" >
                     @error('staies_address')
                     <span class="text-danger">{{ $message }}</span> 
                     @enderror
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>     رقم تليفون</label>
                     <input type="text" name="emp_work_tel" id="emp_work_tel" class="form-control" value="{{ old('emp_work_tel') }}" >
                     @error('emp_work_tel')
                     <span class="text-danger">{{ $message }}</span> 
                     @enderror
                  </div>
               </div>
         </div>
          <div class="tab-pane fade" id="custom-content-jobs_data" role="tabpanel" aria-labelledby="jobs_data">
            <br>
            <div class="row">
            <div class="col-md-4 " >
               <div class="form-group">
                  <label>   تاريخ التعاقد</label>
                  <input type="date" name="emp_start_date" id="emp_start_date" class="form-control" value="{{ old('emp_start_date') }}" >
                  @error('emp_start_date')
                  <span class="text-danger">{{ $message }}</span> 
                  @enderror
               </div>
            </div>

            
            <div class="col-md-4" >
               <div class="form-group">
                  <label>     الراتب</label>
                  <input type="text" name="emp_sal" id="emp_sal" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" class="form-control" value="{{ old('emp_sal') }}" >
                  @error('emp_sal')
                  <span class="text-danger">{{ $message }}</span> 
                  @enderror
               </div>
            </div>

         </div>

         </div>
     
        </div>
       
      </div>
      <!-- /.card -->
    </div>
    <!-- /.card -->


            
            <div class="col-md-12">
               <div class="form-group text-center">
                  <button class="btn btn-sm btn-success" type="submit" name="submit">اضف الموظف </button>
                  {{-- <a href="{{ route('Religions.index') }}" class="btn btn-danger btn-sm">الغاء</a> --}}
               </div>
            </div>
         </form>
      </div>
   
   
   </div>
</div>
@endsection
@section("script")
<script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"> </script>
<script>
   //Initialize Select2 Elements
   $('.select2').select2({
     theme: 'bootstrap4'
   });

   $(document).on('change','#country_id',function(e){
      get_governorates();
      });
   function get_governorates(){
   var country_id=$("#country_id").val();
   jQuery.ajax({
   url:'{{ route('Employees.get_governorates') }}',
   type:'post',
   'dataType':'html',
   cache:false,
   data:{"_token":'{{ csrf_token() }}',country_id:country_id},
   success: function(data){
   $("#governorates_Div").html(data);
   },
   error:function(){
   alert("عفوا لقد حدث خطأ ");
   }
   
   });
}

$(document).on('change','#governorates_id',function(e){
      get_centers();
      });
   function get_centers(){
   var governorates_id=$("#governorates_id").val();
   jQuery.ajax({
   url:'{{ route('Employees.get_centers') }}',
   type:'post',
   'dataType':'html',
   cache:false,
   data:{"_token":'{{ csrf_token() }}',governorates_id:governorates_id},
   success: function(data){
   $("#centers_div").html(data);
   },
   error:function(){
   alert("عفوا لقد حدث خطأ ");
   }
   
   });
}

$(document).on('change','#emp_military_id',function(e){
      var emp_military_id=$(this).val();
      if(emp_military_id==1){
         $(".related_miltary_1").show();
         $(".related_miltary_2").hide();
         $(".related_miltary_3").hide();
      }else if(emp_military_id==2){
         $(".related_miltary_1").hide();
         $(".related_miltary_2").show();
         $(".related_miltary_3").hide(); 
      }
      else if(emp_military_id==3){
         $(".related_miltary_1").hide();
         $(".related_miltary_2").hide();
         $(".related_miltary_3").show();   
      }else{
         $(".related_miltary_1").hide();
         $(".related_miltary_2").hide();
         $(".related_miltary_3").hide();

      }
      });

      $(document).on('change','#does_has_Driving_License',function(e){
 if($(this).val()==1  ){
$(".related_does_has_Driving_License").show();
 }else{
   $(".related_does_has_Driving_License").hide();
 }
   });
   $(document).on('change','#has_Relatives',function(e){
 if($(this).val()==1  ){
$(".Related_Relatives_detailsDiv").show();
 }else{
   $(".Related_Relatives_detailsDiv").hide();
 }
   });

   $(document).on('change','#is_Disabilities_processes',function(e){
 if($(this).val()==1  ){
$(".Related_is_Disabilities_processesDiv").show();
 }else{
   $(".Related_is_Disabilities_processesDiv").hide();
 }
   });

   $(document).on('change','#is_has_fixced_shift',function(e){
 if($(this).val()==1  ){
$(".relatedfixced_shift").show();
$("#daily_work_hourDiv").hide();
 }else{
   $(".relatedfixced_shift").hide();
   $("#daily_work_hourDiv").show();

 }
   });
   
   $(document).on('change','#MotivationType',function(e){
 if($(this).val()!=1 ){
$("#MotivationDIV").hide();
 }else{
   $("#MotivationDIV").show();

 }
 
   });

   $(document).on('change','#isSocialnsurance',function(e){
 if($(this).val()!=1 ){
$(".relatedisSocialnsurance").hide();
 }else{
   $(".relatedisSocialnsurance").show();

 }

   });
   

   $(document).on('change','#ismedicalinsurance',function(e){
 if($(this).val()!=1 ){
$(".relatedismedicalinsurance").hide();
 }else{
   $(".relatedismedicalinsurance").show();

 }

   });
</script>
@endsection