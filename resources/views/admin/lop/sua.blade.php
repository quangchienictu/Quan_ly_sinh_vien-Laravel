@extends('admin.layout.index')
@section('title', 'Thêm khoa')
@section('content')
<main>

  <div class="container-fluid">
    <h1 class="mt-4">Thêm Lớp </h1>
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
       

         
      <form action="lop/sua/{{$lop->maLop}}" class="needs-validation" method="post" novalidate>
        @csrf
        <div class="form-group">
          <label for="uname">Mã Lớp:</label>
          <input type="text" class="form-control"  value="{{$lop->maLop}}" disabled="">
        </div>
        <div class="form-group">
          <label for="pwd">Tên Lớp:</label>
          <input type="text" class="form-control" id="pwd" placeholder="Tên Lớp" value="{{$lop->tenLop}}" name="tenLop" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Không để trống trường này!</div>
        </div>
        <div class="form-group">
            <label for="sel1">Thuộc Khoa :</label>
            <select class="form-control" id="sel1" name="maKhoa">
              @foreach ($khoa as $element)
                <option  @if ($element->maKhoa == $lop->maKhoa) {{"selected"}} @endif  value="{{$element->maKhoa}}">{{$element->tenKhoa}}</option>
              @endforeach
            </select>
          </div>
        <div class="btn-setting" style="text-align: center;">
          <button type="submit" class="btn btn-primary">Sửa</button>
          <a class="btn btn-danger" href="lop/danhsach">Huỷ</a>
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

    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
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
