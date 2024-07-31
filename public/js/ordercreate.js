$(document).ready(function () {
    let id = $('#menu').val();
    // console.log(c);
    $.ajax({
        type: "GET",
        url: "/orderCreate/"+id,
        headers:{
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        dataType: 'json',
        success: function(data){
            let val = data.data;
            // console.log(val);
            
            $('#price').val(val.price);
            $('#unit').val(val.satuan);

    //         $('#menu').append(menu);
        }
      }); 
      $('#menu').on('change',function(){
        let ids = $('#menu').val();
        $.ajax({
            type: "GET",
            url: "/orderCreate/"+ids,
            headers:{
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            dataType: 'json',
            success: function(data){
                let g = data.data;
                // console.log(g);
                
                $('#price').val(g.price);
                $('#unit').val(g.satuan);
    
            }
          });      
      });
});