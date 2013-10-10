     function AjaxLoadRequest(result_id, url) {
      jQuery.ajax({
                    url:     url, //Адрес подгружаемой страницы
                    type:     "GET", //Тип запроса
                    dataType: "html", //Тип данных
                    data: "", 
                        success: function(response) { //Если все нормально
                        	document.getElementById(result_id).innerHTML = response;
                        },
                        
                      });
   	 // console.log( jQuery("#"+form_id).serialize() );
     };





     function AjaxFormRequest(logined, result_id, form_id, url, back) {
      jQuery.ajax({
                    url:     url, //Адрес подгружаемой страницы
                    type:     "POST", //Тип запроса
                    dataType: "html", //Тип данных
                    data: jQuery("#"+form_id).serialize()+"&logined="+logined+"&back="+back, 
                        success: function(response) { //Если все нормально
                        	// document.getElementById(result_id).innerHTML = response;
                         AjaxLoadRequest('main-list','load-list.php');
                       },
                error: function(response) { //Если ошибка
                	document.getElementById(result_id).innerHTML = "Ошибка при отправке формы";
                }
              });
      // console.log( data);
    };

     function AjaxImGoRequest(result_id, user,id, url) {
      jQuery.ajax({
                    url:     url, //Адрес подгружаемой страницы
                    type:     "GET", //Тип запроса
                    dataType: "html", //Тип данных
                    data: "user="+user+"&id="+id, 
                        success: function(response) { //Если все нормально
                          document.getElementById(result_id).innerHTML = response ;
                        },
                        
                      });
     console.log("user="+user+"&id="+id);
     };
