<ul class="paih">
@foreach($viewArticleList as $val)
    <li><a href="{{route('detail',['id'=>$val->art_id])}}" title="{{$val->art_title}}" target="_blank">{{$val->art_title}}</a></li>
@endforeach
</ul>