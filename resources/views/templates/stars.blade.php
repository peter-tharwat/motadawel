@for($i=0;$i<5;$i++)
	<span class="{{$score<=$i?'fal':'fas'}} fa-star" style="color: #f16327;{{isset($size)?"font-size:{$size}px":""}}"></span>
@endfor