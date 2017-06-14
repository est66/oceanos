    /***************************************----------REQUEST---------**********************************************/

    /*************************************************************************/
    /* Admin - Function - POST_REQ  ******************************/
    /*************************************************************************/
    //Close Popups and Fade Layer
    function requestPost(data,url,extension,msg) { //Au clic sur le body...       
        $.ajax({
            url: url + extension,
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(data),
            dataType: 'json',
            success: function (data) {
                alert(msg);
                location.reload();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //On error do this
                if (xhr.status == 200) {
                    alert(ajaxOptions);
                } else {
                    alert(xhr.status);
                    alert(thrownError);
                }
            }
        });    
    };
    /*************************************************************************/
    /* Admin - Function - PUT_REQ  ******************************/
    /*************************************************************************/
    //Close Popups and Fade Layer
    function requestPut(data,id,url,extension,msg) { //Au clic sur le body...
        $.ajax({
            url: url + extension+ id,
            type: 'PUT',
            data: data,
            success: function (data) {
                alert(msg);
                location.reload();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //On error do this
                if (xhr.status == 200) {
                    alert(ajaxOptions);
                } else {
                    alert(xhr.status);
                    alert(thrownError);
                }
            }
        });
    };
    /*************************************************************************/
    /* Admin - Function - GET_REQ  ******************************/
    /*************************************************************************/
    //Close Popups and Fade Layer
    function requestGet(id,url,extension,msg) { //Au clic sur le body...       
        $.ajax({
            url: url + extension +id,
            success: function () {
                alert(msg);
                //location.reload();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //On error do this
                if (xhr.status == 200) {
                    alert(ajaxOptions);
                } else {
                    alert(xhr.status);
                    alert(thrownError);
                }
            }
        });
    };
    /*************************************************************************/
    /* Admin - Edition - Function - DELETE_REQ  *****************************/
    /*************************************************************************/
    function requestDelete(id,url,extension,msgDelete,msg){
        var answer = confirm(msgDelete);    
        if(answer)
        {
            $.ajax({
                url: url + extension + id,
                type: 'DELETE',
                success: function(result) {
                    alert(msg);
                    location.reload();
                }
             })
        }
    };