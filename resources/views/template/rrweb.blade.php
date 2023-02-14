<script src="../assets/rrweb.min.js"></script>
<script>
    let events = [];
    let $ole = "";
    rrweb.record({
      emit(event) {
        
        // push event into the events array
        event.path = '{{url()->current()}}';
        events.push(event);
       
      },
    });

    // this function will send events to the backend and reset the events array
    function save() {
      let path = '{{url()->current()}}';
      if(events.length>0){
      const body = JSON.stringify({
        events,path
      });
      $.ajax({
            type: "POST",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url : "{{route('record')}}",
            data:{
              events: body,
            },
            success: function (response) {
               
            },
            error: function (error) {
             

            }

        });
        events = [];
    }
  }
    setInterval(save, 10 * 100);

  </script>