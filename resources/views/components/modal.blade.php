<!-- Button trigger modal -->
<?php $random = rand(1,90000); ?>
<button type="button" class="btn btn-{{($name=='Edit') ? 'warning' : 'primary'}} btn-sm" data-bs-toggle="modal" data-bs-target="#{{$name.$random}}">
    {{$name}}
</button>

<!-- Modal -->
<div class="modal fade" id="{{$name.$random}}" tabindex="-1" aria-labelledby="{{$name.$random}}Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{$title}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{$action}}" method="post" class="form-group" enctype="multipart/form-data">
            @csrf
            {{$slot}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">{{($button) ? $button : 'Simpan'}}</button>
      </div>
    </form>
    </div>
  </div>
</div>