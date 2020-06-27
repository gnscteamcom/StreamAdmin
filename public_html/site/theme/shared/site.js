$( document ).ready(function() {
    $(".ajax").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        var method = form.attr('method');
        $.ajax({
               type: method,
               url: url,
               data: form.serialize(),
               success: function(data)
               {
                   try
                   {
                       jsondata = JSON.parse(data);
                       var redirectdelay = 1500;
                       if(jsondata.hasOwnProperty('status'))
                       {
                           if(jsondata.hasOwnProperty('message'))
                           {
                               if(jsondata.status == true)
                               {
                                   if(jsondata.message != "") alert_success(jsondata.message);
                               }
                               else
                               {
                                   redirectdelay = 3500;
                                   if(jsondata.message != "") alert_warning(jsondata.message);
                               }
                           }
                           if(jsondata.hasOwnProperty('redirect'))
                           {
                               setTimeout(function(){ $(location).attr('href', jsondata.redirect) }, redirectdelay);
                           }
                       }
                       else
                       {
                           alert_error("Reply from server is not vaild please reload the page and try again.");
                       }
                   }
                   catch(e)
                   {
                       alert_warning("Unable to process reply, please reload the page and try again!");
                   }
               },
               error: function (data)
               {
                   alert_error(data);
               }
        });
    });
});

$('#NotecardModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var rentaluid = button.data('rentaluid') // Extract info from data-* attributes
  var modal = $(this)
  modal.find('#ModalTitle').text('Loading');
  modal.find('#ModalText').val("Fetching notecard for rental "+rentaluid);
  $.ajax({
         type: "get",
         url: url_base+"ajax.php/client/getnotecard/"+rentaluid,
         success: function(data)
         {
             try
             {
                 jsondata = JSON.parse(data);
                 var redirectdelay = 1500;
                 if(jsondata.hasOwnProperty('status'))
                 {
                     if(jsondata.hasOwnProperty('message'))
                     {
                         modal.find('#ModalTitle').text('Notecard');
                         modal.find('#ModalText').val(jsondata.message);
                     }
                 }
                 else
                 {
                     alert_error("Reply from server is not vaild please reload the page and try again.");
                 }
             }
             catch(e)
             {
                 alert_warning("Unable to process reply, please reload the page and try again!");
             }
         },
         error: function (data)
         {
             alert_error(data);
         }
  });
})

function alert_success(smsg)
{
    alert(smsg,"success");
}
function alert_error(smsg)
{
    alert(smsg,"error");
}
function alert_warning(smsg)
{
    alert(smsg,"warning");
}
function alert(smsg,alerttype)
{
    $.notify({
    	// options
    	message: smsg
    },{
    	// settings
    	type: alerttype
    });
}
