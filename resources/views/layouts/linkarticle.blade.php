<ul class="website">
@foreach($linkList as $val)
    <li><a href="{{$val->link_url}}" target="_blank">{{$val->link_name}}</a></li>
@endforeach
</ul>