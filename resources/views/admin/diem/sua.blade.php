@extends('admin.layout.index')
@section('title', 'Thêm khoa')
@section('content')
<main>

  <div class="container-fluid">
    <h1 class="mt-4">Sửa điểm </h1>
    <div class="container">
      @if(count($errors)>0)
          <script type="text/javascript">
            Swal.fire({
                  icon: 'error',
                  title: 'Lỗi ...',
                  text:'{{$errors->first()}}',
                })
          </script>
       @endif
       @if(session('thongbao'))
            <script type="text/javascript">
                  Swal.fire(
                    'Thành công !',
                    '{{session('thongbao')}}',
                    'success'
                  )
                </script>


            @endif
       

         
      <form action="diem/sua/{{$diem->id}}" class="needs-validation" method="post" novalidate>
        @csrf
   
        
          
         <div class="form-group">
          <label for="pwd">Tên môn học :</label>
          <input type="text" class="form-control" id="pwd" value="{{$diem->monhoc->tenMon}}" disabled>
        </div> 
         <div class="form-group">
          <label for="pwd">Tên sinh viên :</label>
          <input type="text" class="form-control" id="pwd" value="{{$diem->sinhvien->tenSV}}" disabled>
        </div> 
        <div class="form-group">
          <label for="pwd">Điểm học phần :</label>
          <input type="number" class="form-control" id="pwd" value="{{$diem->diemhocphan}}" placeholder="Điểm học phần" name="diemhocphan" min="0" max="10" step="0.01">
          
          <div class="invalid-feedback">Điểm phải >= 0 và <=10 </div>
        </div>
        <div class="form-group">
          <label for="pwd">Điểm thi :</label>
          <input type="number" class="form-control" id="pwd" value="{{$diem->diemthi}}" placeholder="Điểm thi" name="diemthi" min="0" max="10" step="0.01">

          <div class="invalid-feedback">Điểm phải >= 0 và <=10 </div>
        </div>
        <div class="btn-setting" style="text-align: center;">
          <button type="submit" class="btn btn-primary">Sửa</button>
          <a class="btn btn-danger" href="diem/danhsach">Huỷ</a>
        </div>
      </form>
    </div>
  </div>

</main>
@endsection
@include('admin.layout.script');
<script>


// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
