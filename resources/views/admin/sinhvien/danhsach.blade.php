@extends('admin.layout.index')
@section('title', 'Môn học')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Danh sách </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sinh Viên</li>
        </ol>
        
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable</div>
            <div class="card-body">
                <div class="table-responsive">
                   <!--   <a style="float: right;margin: 0px 20px;" class="btn btn-primary" href="" ><i class="fas fa-plus"></i>ADD</a> -->
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã SV</th>
                                <th>Tên SV</th>
                                <th>Giới tính</th>
                                <th>Năm sinh</th>
                                <th>SDT</th>
                                <th>Email</th>
                                <th>Lớp</th>
                                <th>Xoá</th>
                                <th>Sửa</th>

                            </tr>
                        </thead>

                        <tbody>
                         @php
                             $x =1;
                         @endphp
                         @foreach ($sinhvien as $value)
                         <tr>
                            <td>{{$x}}</td>
                            <td>{{$value->maSV}}</td>
                            <td>{{$value->tenSV}}</td>
                            <td>{{$value->gioitinh}}</td>
                            <td>{{$value->namsinh}}</td>
                            <td>{{$value->sdt}}</td>
                             <td>{{$value->email}}</td>
                            <td>{{$value->lop->tenLop}}</td>
                     
                           <td><button class="btn btn-danger" onclick="return xoa('sinhvien/xoa/{{$value->maSV}}')"><i class="fas fa-trash-alt"></i>Delete</button></td>
                             <td> <a  class="btn btn-success" href="sinhvien/sua/{{$value->maSV}}" ><i class="fa fa-edit"></i>Edit</a></td>
                        </tr>
                        @php
                          $x++;
                        @endphp
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