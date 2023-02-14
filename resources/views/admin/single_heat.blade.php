<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<iframe width="100%" height="100%" src="{{$path}}" sandbox="allow-same-origin" scrolling="yes" style="display: inherit; pointer-events: none;"></iframe>
<script src="../assets/heatmap.js"></script>
<script>
    var config = {
    container: document.body,
radius: 50,
    };
    var heatmap = h337.create(config);
    heatmap.setData({
        min: 0, 
        max: 100,
        data: {{Js::from($ladata)}}
    });
</script>
