
$(function()
{
    function after_form_submitted(data) 
    {
        if(data.result == 'success')
        {
            $('form#reused_form').hide();
              $('#my-container').hide();
            $('#success_message').show();
            $('#error_message').hide();
            $('my-container#message1').hide();
             $('col-md-3#message2').hide();
            
            console.log("good");
        }
        else
        {
            $('#error_message').append('<ul></ul>');

            jQuery.each(data.errors,function(key,val)
            {
                $('#error_message ul').append('<li>'+key+':'+val+'</li>');
            });
            $('#success_message').hide();
            $('#error_message').show();
               $('col#message1').hide();
             $('row#message2').hide();
            console.log("bad");

            //reverse the response on the button
            $('button[type="button"]', $form).each(function()
            {
                $btn = $(this);
                label = $btn.prop('orig_label');
                if(label)
                {
                    $btn.prop('type','submit' ); 
                    $btn.text(label);
                    $btn.prop('orig_label','');
                }
            });
            
        }//else
    }

	$('#reused_form').submit(function(e)
      {
        e.preventDefault();

        $form = $(this);
        //show some response on the button
        $('button[type="submit"]', $form).each(function()
        {
            $btn = $(this);
            $btn.prop('type','button' ); 
            $btn.prop('orig_label',$btn.text());
            $btn.text('Sending ...');
        });
        

                    var formdata = new FormData(this);
            $.ajax({
                type: "POST",
                url: 'handler.php',
                data: formdata,
                success: after_form_submitted,
                dataType: 'json' ,
                processData: false,
                contentType: false,
                cache: false        
            });
        
      });	
});
