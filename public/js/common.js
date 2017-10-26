function submit_get(e)
{
    $form = $(e);
    var action = $form.attr('action');
    var queryString = $form.serialize();
    var startIdx;
    if((startIdx = action.indexOf('?')) === -1)
    {
        window.location.href= action + "?" + queryString;
        return true;
    }else
    {
        var a_queryString =action.substring(startIdx+1,action.length);
        
        obj_a_queryStrng=JSON.parse('{"' + decodeURI(a_queryString).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"') + '"}');
        obj_queryStrng=JSON.parse('{"' + decodeURI(queryString).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"') + '"}');

        for(var key in obj_queryStrng)
        {
            var sw = false;
            for(var key2 in obj_a_queryStrng)
            {
                if(key2 === key){
                    obj_a_queryStrng[key2] = obj_queryStrng[key];
                    delete obj_queryStrng[key]; 
                    sw = true; 
                    break;
                }   
            }
            if(sw === false )
                obj_a_queryStrng[key] = obj_queryStrng[key];
        }

        var action_url = action.substring(0,startIdx+1);
        var queryString = $.param(obj_a_queryStrng);
    
        var url = action_url + queryString;
        window.location.href= url;
        return true;

    }

    
}



function confirm_redirect(url,msg=''){
    if(confirm(msg)){
        window.location.href= url;
    }
    return;
}


function ajax(url,queryString,e=null,callback =function(){return;}){
    $.ajax({
        type: "POST",
        dataType : 'json',
        data: queryString,
        url: url,
        success:function(data){
            callback(e,data);
            if("none" in data) return ;
            if("alert" in data)  alert(data['alert']);
            if(("reload" in data) && data['reload'] ==true)  window.location.reload();
            if("callback" in data) eval(data['callback']);
            if("redirect" in data) window.location.href= data["redirect"];
            if("confirm_redirect" in data) {
                    if(confirm(data["confirm_redirect"]["msg"]))
                        window.location.href= data["confirm_redirect"]["url"];
            }
            if("append" in data){
                var append = data['append'];
                var ele=$(e)[append['method']](append['selector'])[0];
                $(ele).append(append['data']);
            }
       
        
        },
        error: function(xhr, textStatus, errorThrown){
            alert('ajax 전송 실패.');
            console.log('code: '+request.status+"\n"+'message: '+request.responseText+"\n"+'error: '+error);
            console.log(errorThrown);
        }
    });

}



function confirm_callback(e,callback,msg){
    if(confirm(msg)){
        callback(e);
    }
}
function ajax_submit(e,validation =function(){return true;}){
    if(!validation(e)){
        return false;
    }
    var $form =$(e);
    var queryString = $form.serialize();
    var url = $form[0].action;
    ajax(url,queryString,e);
   
}


function ajax_a(e,validation= function(){return true;}){
    if(!validation(e)){
        return false;
    }
    $e =$(e);
    var queryString =$e.data('querystring')    
    if(typeof queryString !== 'undefined')
        queryString  = $.param(queryString);
   
    var url = $e.data('action');
    var callback = eval($e.data('callback'));
    ajax(url,queryString,e,callback);
}


// $('a[data-ajax=true]').click(function(e){
//     e.preventDefault();

//     $this =$(this);
//     var queryString  = $.param($this.data('querystring'));
//     var url = $this.data('action');
//     var callback = eval($this.data('callback'));
//     ajax(url,queryString,this,callback);

    
// });