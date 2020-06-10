/*global $*/
$('#exampleModal').on('hide.bs.modal', function () {
    'use strict';
    $('#edit-text').val = '';
});

$('#save').click( function () {
    $('.modal').modal('hide');
});
$("#textarea").focus(function () {
    'use strict';
    $(".text span").text("Type something here:");
   });
   var focs = 0;
$("#textarea").focusout(function() {
    'use strict';
    focs++;
    if($("#textarea").val() =='' && focs != 0){
        setTimeout(function() {
            $(".text span").text("Type something here...");
        }, 400);
    }
});


//to disable or enable submit button in js
function manage(textarea) {
    var bt = document.getElementById('btn-fb');
    var sp = $(".text span");
    if (textarea.value != '') {
        bt.disabled = false;
        sp.css("top", "-35px");
        sp.text("Type something here:");
    }
    else {
        bt.disabled = true;
        sp.css("top", "2px");
    }
}

/*to disable or enable submit button in jquery
$(document).ready(function() {
            $(':input[type="submit"]').prop('disabled', true);
            $('#textarea').keyup(function() {
                if($(this).val() != '') {
                $(':input[type="submit"]').prop('disabled', false);
                }else {
                    $('input[type="submit"]').attr('disabled', true);
                }
            });*/

function post(reqType, id) {
    'use strict';
    var user = "moon";
    var post = document.getElementById("textarea").value;
   
    var xhr = new XMLHttpRequest();

    if(reqType == undefined && id == undefined){
        reqType = '';
        id='';
    }else if(reqType == 'add'){
        id= '';
    }else if(reqType == 'del'){
        var a = window.confirm("Are you sure?");
        if(a == false){
            id = '';
        }
    }else if(reqType == 'modify'){
        post = $("#"+id).parent().siblings('p').text();
        $('#exampleModal').on('shown.bs.modal', function () {
            $('#edit-text').trigger('focus');
            $('#edit-text').val(post);
            $('#post-id').val(id);
            
          });    
    }else if(reqType == 'edit'){
        post = $('#edit-text').val();
        id = $('.editor').data('id');     
    }
    xhr.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("posts-container").innerHTML = xhr.responseText;
            document.getElementById("textarea").value = "";
        }
    };
    xhr.open("GET", "server.php?req="+reqType+"&id="+id+"&u="+user+"&p="+post, true);
    xhr.send();
}

$("form").submit(function (e) {
    'use strict';
    e.preventDefault();
});