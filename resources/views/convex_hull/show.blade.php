
<div class='canvas' style="width:{{ $max_x * 10}}px;height:{{ $max_y * 10}}px;">
@foreach ($points as $i=>$point)
    <div class="point" style="
    @if($i == 0) background: black; @endif
    bottom:{{ $point['y']*10 - $radius-1}}px;left:{{ $point['x']*10 - $radius-1}}px;width:{{  $radius*2 }}px;height:{{  $radius*2 }}px;"
    title='{{ json_encode($point) }} : {{$i}}'
    >
    </div>
@endforeach
<canvas id="myCanvas" width="{{ $max_x * $radius * 2 }}" height="{{ $max_y * $radius * 2 }}"></canvas>

</div>

<style>
.canvas{
    position:relative;
    display:block;
}
.point{
    position: absolute;
    display: block;
    border: 1px solid;
}
</style>

<script>
var c = document.getElementById("myCanvas");
@foreach ($points as $i=>$point)
    var ctx = c.getContext("2d");
    @if ($i == 0)
    ctx.fillStyle="#000000";
    @endif
    ctx.beginPath();
    ctx.arc({{ $point['x']*10 }},{{ $max_y * $radius * 2 - $point['y']*10  }},{{  $radius }},0,2*Math.PI);

    @if ($i == 0)
    ctx.fill();
    @endif
    ctx.stroke();
@endforeach

</script>