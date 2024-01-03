<?php $id = rand(1, 10000);?>
<button type="button" class="btn btn-danger btn-sm" onclick="deleteData(this)">
    Hapus
</button>
<form id="delete-form{{$id}}" action="{{ $action }}" method="POST" style="display: none;">
    @csrf
</form>
<script>
    function deleteData(){
        Swal.fire({
        title: "Apakah Anda Yakin?",
        text: "Tindakan ini tidak dapat dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya!"
        }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form{{$id}}').submit()
            Swal.fire({
            title: "Deleted!",
            text: "Data berhasil dihapus!",
            icon: "success"
            });
        }
    });
    }
</script>