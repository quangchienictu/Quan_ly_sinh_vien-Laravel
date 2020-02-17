@extends('admin.layout.index')
@section('title', 'Môn học')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Danh sách </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Điểm</li>
        </ol>
        
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable</div>
            <div class="card-body">
                <div class="table-responsive">
                   <!--   <a style="float: right;margin: 0px 20px;" class="btn btn-primary" href="" ><i class="fas fa-plus"></i>ADD</a> -->
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mã SV</th>
                                <th>Tên SV</th>
                                <th>Mã Môn</th>
                                <th>Tên Môn</th>
                                <th>Điểm hoc phần </th>
                                <th>Điểm thi</th>
                                <th>Điểm TB</th>
                                <th>Xoá</th>
                                <th>Sửa</th>

                            </tr>
                        </thead>

                        <tbody>
                        
                         @foreach ($diem as $value)
                         @php
                         if($value->diemhocphan!=''&&$value->diemthi!='')
                           $TB=round(($value->diemhocphan*0.3)+($value->diemthi*0.7), 2);
                         else
                           $TB ="";
                         @endphp
                         <tr>         
                            <td>{{$value->id}}</td>
                             <td >{{$value->sinhvien->maSV}}</td>
                            <td >{{$value->sinhvien->tenSV}}</td>
                            <td >{{$value->monhoc->maMon}}</td>
                            <td >{{$value->monhoc->tenMon}}</td>
                           
                            <td >{{$value->diemhocphan}}</td>                      
                            <td >{{$value->diemthi}}</td>
                            <td>{{$TB}}</td>
                           <!--  <td ><a  class="btn btn-danger" href="monhoc/xoa/ " onclick="return confirm('Bạn có chắc chắn xóa không ?')"><i class="fas fa-trash-alt"></i> Delete</a></td> -->
                           <td><button class="btn btn-danger" onclick="return xoa('diem/xoa/{{$value->id}}')"><i class="fas fa-trash-alt"></i>Delete</button></td>
                             <td> <a  class="btn btn-success" href="diem/sua/{{$value->id}}" ><i class="fa fa-edit"></i>Edit</a></td>
                        </tr>
                      
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>
@endsection
@include('admin.layout.script');