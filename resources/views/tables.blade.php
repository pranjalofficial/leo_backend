@extends('welcome')
<h1>tables</h1>

@isset($table)
<div id="reload">
    @foreach ($table as  $item)
    @if($item->status == 1)
    <a class="btn btn-success" disabled>{{ $loop->index+1 }}</a>
    @else
    <a class="btn btn-warning" href="{{url('/table/order/'.$item->id)}}">{{ $loop->index+1 }}</a>
    @endIf
    @endforeach

    <a class="btn btn-primary">Common</a>
</div>
@endisset

<script>
    (function () {
        setInterval(function () {
            axios.get('/branch/table/{id}',)
                .then(function(response){
                        document.querySelector('#reload')
                                .innerHtml(response.data);
                }); // do nothing for error - leaving old content.
            }); 
        }, 5000); // milliseconds

</script>
