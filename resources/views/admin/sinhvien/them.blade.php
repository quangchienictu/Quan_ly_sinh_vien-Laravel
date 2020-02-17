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
          'Thông báo  !',
          '{{session('thongbao')}}',
          'success'
          )
        </script>


        @endif



        <form action="sinhvien/them" class="needs-validation" method="post" novalidate>
          @csrf
          <div class="form-group">
            <label for="uname">Mã SV:</label>
            <input type="text" class="form-control"  value="{{$last}}" disabled="">
          </div>
          <div class="form-group">
            <label for="pwd">* Tên SV:</label>
            <input type="text" class="form-control" id="pwd" placeholder="Tên sinh viên" name="tenSV" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Không để trống trường này!</div>
          </div>
          <div class="form-group">
            <label for="pwd">Giới tính:</label>
            <br>
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="gioitinh" value="nam" checked="">Nam 
              </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="gioitinh" value="nữ">Nữ
              </label>
            </div>
            
          </div>
          <div class="form-group">
            <label for="pwd">Số điện thoại:</label>
            <input type="text" class="form-control" id="pwd" placeholder="Số điện thoại" name="sdt" min="10" max="15">
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Không đúng định dạng số điện thoại!</div>
          </div>
          <div class="form-group">
            <label for="pwd">* Năm sinh:</label>
            <input type="text" class="form-control" id="pwd" placeholder="Năm sinh" name="namsinh" min="1990" max="2020" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Năm sinh phải > 1990 và < 2020</div>
          </div>
          <div class="form-group">
            <label for="pwd">Địa chỉ:</label>
            <input type="text" class="form-control" id="pwd" placeholder="Địa chỉ" name="diachi" >
          </div>
          <div class="form-group">
            <label for="pwd">Email:</label>
            <input type="email" class="form-control" id="pwd" placeholder="Email" name="email" >
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Không đúng định dạng!</div>
          </div>
          <div class="form-group">
            <label for="sel1">Thuộc Lớp :</label>
            <select class="form-control" id="sel1" name="maLop">
              @foreach ($lop as $element)
              <option value="{{$element->maLop}}">{{$element->tenLop}}</option>
              @endforeach
            </select>
          </div>
          <div class="alert alert-secondary">Các trường * không được bỏ trống !</div>
          <div class="btn-setting" style="text-align: center;">
            <button type="submit" class="btn btn-primary">Thêm</button>
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
