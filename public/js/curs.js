window.onload = function () {
//При загрузке страницы мы будем прослушивать изменения поля суммы в гривнах
//При изменении будет отправлять AJAX запрос на https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5
//получаем курс доллара на сейчас в поле sum_dol будет записывать сумму в долларах 
var curs={};
curs.test;
var sum_dol = document.getElementById("sum_dol");
var number_sum = document.getElementById("number_sum");


number_sum.addEventListener("keyup",
function () {
      curs(); 
      curs.test = curs.test || 28;
      sum_dol.value.value = (number_sum.value/test).toFixed(2);
}, false);

number_sum.addEventListener("change",
function () {
      curs(); 
      curs.test = curs.test || 28;
      sum_dol.value = (number_sum.value/test).toFixed(2);
}, false);


 function curs() {

                var xhr = new XMLHttpRequest();          
                xhr.open("GET", "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5", true); 

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) { // если получен ответ
                        if (xhr.status == 200) { // и если статус код ответа 200
                            var text = JSON.parse(xhr.responseText);
                            text = text[0];
                            for(var key in text){
                               if(key=="sale"){
                               curs.test = text[key];}
                            }
                             
                        }
                    }

                }
                
                xhr.send();   
                                          
            }


  }


