<!-- Import header.blade.php -->
@extends('layouts.app')

@section('content')
@php
    $title = 'LessTax - des stats de fdp';
@endphp
<section id="heat" style="min-height:1000px">
<script>
    const config = {
      container: document.body,
  radius: 50,
    };
    const heatmap = h337.create(config);
    heatmap.setData({
        min: 0, 
        max: 100,
        data: {{Js::from($ladata)}}
    });
    var dataPoint = {
  x: 5, // x coordinate of the datapoint, a number
  y: 5, // y coordinate of the datapoint, a number
  value: 100 // the value at datapoint(x, y)
};
</script>

</section>

@endsection
