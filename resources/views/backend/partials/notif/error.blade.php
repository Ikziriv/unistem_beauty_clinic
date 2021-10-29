@if ($errors->any())
<div class="alert bg-danger" role="alert">
	<em class="fa fa-minus-circle mr-2"></em> Error {{$page_title}} 
	  <ul>
	      @foreach ($errors->all() as $error)
	          <li>{{ $error }}</li>
	      @endforeach
	  </ul>
	<a href="#" class="float-right"><em class="fa fa-remove"></em></a>
</div>
@endif