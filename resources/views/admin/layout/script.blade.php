<script type="text/javascript">
 function xoa(id){
   Swal.fire({
  title: 'Cảnh báo ?',
  text: "Bạn có chắc chắn xoá !",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
  if (result.value) {
    window.location=id;
    
  }
})
 }
</script>
