function getXmlHttp(){
    var xmlhttp;
    try {
      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (E) {
        xmlhttp = false;
      }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
      xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}
// javascript-код голосования из примера
function vote() {
	// (1) создать объект для запроса к серверу
	var req = getXmlHttp()  
       
        // (2)
	// span рядом с кнопкой
	// в нем будем отображать ход выполнения
	var statusElem = document.getElementById('vote_status') 
	
	req.onreadystatechange = function() {  
        // onreadystatechange активируется при получении ответа сервера

		if (req.readyState == 4) { 
            // если запрос закончил выполняться

			statusElem.innerHTML = req.statusText // показать статус (Not Found, ОК..)

			if(req.status == 200) { 
                 // если статус 200 (ОК) - выдать ответ пользователю
				alert("Ответ сервера: "+req.responseText);
			}
			// тут можно добавить else с обработкой ошибок запроса
		}

	}

       // (3) задать адрес подключения
	req.open('GET', '/ajax_request/vote.php', true);  

	// объект запроса подготовлен: указан адрес и создана функция onreadystatechange
	// для обработки ответа сервера
	 
        // (4)
	req.send(null);  // отослать запрос
  
        // (5)
	statusElem.innerHTML = 'Ожидаю ответа сервера...' 
}

function getMovedElementsAjax(chapterId) {
	var req = getXmlHttp();
	var statusElem = document.getElementById('elements-area'); 
	req.onreadystatechange = function() {
		if (req.readyState == 4) { 
            statusElem.innerHTML = req.statusText
            if(req.status == 200) { 
			    statusElem.innerHTML = req.responseText;
                startMovedElements(); // для перемещения элементов
            }
		}
	}
	req.open('GET', '/ajax_request/getMovedElements.php?chapterid='+chapterId, true);  
	req.send(null);  // отослать запрос
	statusElem.innerHTML = 'Ожидаю ответа сервера...' 
}
function setCoordsMovedElementAjax(id, top, left) {
	var req = getXmlHttp();
    console.log(id, top, left);
	var statusElem = document.getElementById('info_div'); 
	req.onreadystatechange = function() {
		if (req.readyState == 4) { 
            if(req.status == 200) { 
			    statusElem.innerHTML = req.responseText;
                startMovedElements(); // для перемещения элементов
            }
		}
	}
	req.open('GET', '/ajax_request/setCoordsMovedElement.php?id='+id+'&top='+top+'&left='+left, true);  
	req.send(null);  // отослать запрос
	statusElem.innerHTML = 'Ожидаю ответа сервера...' 
}
function editSubchapterAjax(id, title, description, color, chapterId) {
	var req = getXmlHttp();
	var statusElem = document.getElementById('info_div'); 
	req.onreadystatechange = function() {
		if (req.readyState == 4) { 
            if(req.status == 200) { 
			    statusElem.innerHTML = req.responseText;
				document.getElementsByClassName("close-window")[0].click();
				getMovedElementsAjax(chapterId);
            }
		}
	}
	let getStr = '/ajax_request/editSubchapterElement.php?id='+id+'&title='+title+'&description='+description+'&color='+color.replace(/[^\w\s]/gi, '')+'&chapterid='+chapterId;
	req.open('GET', getStr, true);  
	req.send(null);  // отослать запрос
	statusElem.innerHTML = 'Ожидаю ответа сервера...';
}
function editChapterAjax(id, title, description, color) {
	var req = getXmlHttp();
	var statusElem = document.getElementById('info_div'); 
	req.onreadystatechange = function() {
		if (req.readyState == 4) { 
            if(req.status == 200) { 
			    statusElem.innerHTML = req.responseText;
				document.getElementsByClassName("close-window")[0].click();
				getMainChaptersAjax();
            }
		}
	}
	let getStr = '/ajax_request/editChapter.php?id='+id+'&title='+title+'&description='+description+'&color='+color.replace(/[^\w\s]/gi, '');
	req.open('GET', getStr, true);  
	req.send(null);  // отослать запрос
	statusElem.innerHTML = 'Ожидаю ответа сервера...';
}
function getMainChaptersAjax() {
	var req = getXmlHttp();
	var statusElem = document.getElementById('main-list-menu'); 
	req.onreadystatechange = function() {
		if (req.readyState == 4) { 
            statusElem.innerHTML = req.statusText;
            if(req.status == 200) { 
			    statusElem.innerHTML = req.responseText;
				document.getElementById('elements-area').innerHTML = "";
            }
		}
	}
	req.open('GET', '/ajax_request/getMainChapters.php', true);  
	req.send(null);  // отослать запрос
	statusElem.innerHTML = 'Ожидаю ответа сервера...' 
}
function getSubchapterElementAjax(subchapterId) {
	var req = getXmlHttp();
	var statusElem = document.getElementById('content-view-subchapter'); 
	req.onreadystatechange = function() {
		if (req.readyState == 4) { 
            statusElem.innerHTML = req.statusText
            if(req.status == 200) { 
			    statusElem.innerHTML = req.responseText;
                //document.getElementById('open-view-subchapter').click();
				document.getElementById('window-view-subchapter').style.display = 'block';
            }
		}
	}
	req.open('GET', '/ajax_request/getSubchapterElement.php?subchapterid='+subchapterId, true);  
	req.send(null);  // отослать запрос
	statusElem.innerHTML = 'Ожидаю ответа сервера...' 
}
function getEditingChapterAjax(id) {
	var req = getXmlHttp();
	var statusElem = document.getElementById('chapter-editing-window-area'); 
	req.onreadystatechange = function() {
		if (req.readyState == 4) { 
            statusElem.innerHTML = req.statusText;
            if(req.status == 200) { 
			    statusElem.innerHTML = req.responseText;
				//document.getElementById('elements-area').innerHTML = "";
            }
		}
	}
	req.open('GET', '/ajax_request/getEditingChapter.php?id='+id, true);  
	req.send(null);  // отослать запрос
	statusElem.innerHTML = 'Ожидаю ответа сервера...' 
}
function getEditingSubchapterAjax(id, chapterId) {
	var req = getXmlHttp();
	var statusElem = document.getElementById('subchapter-editing-window-area'); 
	req.onreadystatechange = function() {
		if (req.readyState == 4) { 
            statusElem.innerHTML = req.statusText;
            if(req.status == 200) { 
			    statusElem.innerHTML = req.responseText;
				//document.getElementById('elements-area').innerHTML = "";
            }
		}
	}
	req.open('GET', '/ajax_request/getEditingSubchapter.php?id='+id+'&chapterid='+chapterId, true);  
	req.send(null);  // отослать запрос
	statusElem.innerHTML = 'Ожидаю ответа сервера...' 
}
function deleteElementAjax(type, id) {
	var req = getXmlHttp();
	var statusElem = document.getElementById('info_div'); 
	req.onreadystatechange = function() {
		if (req.readyState == 4) { 
            statusElem.innerHTML = req.statusText;
            if(req.status == 200) { 
			    statusElem.innerHTML = req.responseText;
				getMainChaptersAjax();
            }
		}
	}
	req.open('GET', '/ajax_request/deleteElement.php?type=' + type + '&id='+id, true);  
	req.send(null);  // отослать запрос
	statusElem.innerHTML = 'Ожидаю ответа сервера...' 
}
function getCalendarElementsAjax() {
	var req = getXmlHttp();
	var statusElem = document.getElementById('elements-area'); 
	req.onreadystatechange = function() {
		if (req.readyState == 4) { 
            statusElem.innerHTML = req.statusText
            if(req.status == 200) { 
			    statusElem.innerHTML = req.responseText;
                startMovedElements(); // для перемещения элементов
            }
		}
	}
	req.open('GET', '/ajax_request/getCalendarElements.php', true);  
	req.send(null);  // отослать запрос
	statusElem.innerHTML = 'Ожидаю ответа сервера...' 
}