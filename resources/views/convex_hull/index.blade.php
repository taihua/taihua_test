


<canvas id="myCanvas" width="{{ $max_x * $radius * 2 + $radius * 2}}" height="{{ $max_y * $radius * 2 + $radius * 2}}"></canvas>

<script>
var c = document.getElementById("myCanvas");
@foreach ($points as $i=>$point)
    var ctx = c.getContext("2d");
    @if ($i == 0)
    ctx.fillStyle="#000000";
    @endif
    ctx.beginPath();
    ctx.arc({{ $point['x']*10 +  $radius }},{{ $max_y * $radius * 2 - $point['y']*10 +  $radius }},{{  $radius }},0,2*Math.PI);

    @if ($i == 0)
    ctx.fill();
    @endif
    ctx.stroke();
@endforeach

</script>