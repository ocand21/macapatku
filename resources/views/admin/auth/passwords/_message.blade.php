@if(Session::has('flash_message'))
<!-- <div class="alert alert-success alert-dismissable">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
           {!! session('flash_message') !!}
</div> -->
<script type="text/javascript">
  swal("Berhasil!", "{!! session('flash_message') !!}", "success");
</script>
@endif

@if(Session::has('flash_error'))
<script type="text/javascript">
  swal("Gagal!", "{!! session('flash_error') !!}", "error");
</script>
@endif

@if(count($errors) > 0)
<script type="text/javascript">
  swal("Gagal!", "Operasi tidak dapat dilakukan", "error");
</script>

	<div class="alert alert-danger alert-dismissable" role="alert">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
		<strong>Errors:</strong>
		<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>

  <!-- <script type="text/javascript">
    swal([
      title: "Gagal!",
      text: "@foreach($errors->all() as $error) <li>{{$error}}</li> @endforeach",
      icon: "error",
    ])
  </script> -->



@endif
