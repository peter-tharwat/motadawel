@if(isset($video))
<div class="col-12 px-0">
	@if($video->type=="LIVE")
	<div class="col-12 px-0">
		<div class="col-12 px-0">
			<a href="{{$video->url}}" class="py-3 d-block" target="_blank">{{$video->url}}</a>
		</div>
	</div>
	@elseif($video->type=="RECORDED")
	<div class="col-12 px-0"> 
		<video controls contextmenu>
			<source src="{{$video->url()}}" type="video/mp4">
		</video>
	</div>
	@elseif($video->type=="OFFLINE")
	<div class="col-12 px-0">
		<div class="col-12 px-0 font-2">
			دورة حضورية ! 
		</div>
	</div>
	@endif
</div>
@endif