// ссылки на элементы
var subchapterWindow = {
    title: document.getElementById('subchapter_title'),
    description: document.getElementById('subchapter_description'),
    color: document.getElementById('subchapter_color'),
    chapterId: document.getElementById('subchapter_chapter_id'),
    id: document.getElementById('subchapter_id'),
};

function openLogin(evt, tabName) {
    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent-login");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks-login");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}
function clickMainListItem(evt, itemId) {
    //console.log(evt, itemId);

    tablinks = document.getElementsByClassName("main-list-item");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    evt.currentTarget.className += " active";
    //document.getElementById('subchapter_chapter_id').setAttribute('value', itemId);
    subchapterWindow.chapterId.setAttribute('value', itemId);
    getMovedElementsAjax(itemId); // аякс запрос
}
function dragElement(elmnt) {
    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    var date1;
    var area = document.getElementById("elements-area");
    elmnt.onmousedown = dragMouseDown;
    function dragMouseDown(e) {
        date1 = new Date().getTime();
        e.preventDefault();
        // получить положение курсора мыши при запуске:
        pos3 = e.clientX;
        pos4 = e.clientY;
        document.onmouseup = closeDragElement;
        // вызов функции при каждом перемещении курсора:
        document.onmousemove = elementDrag;
    }
    function elementDrag(e) {
        if (checkEnd()) {
            return true;
        }
        e.preventDefault();
        // вычислить новую позицию курсора:
        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;
        // установите новое положение элемента:
        elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
        elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
    }
    function closeDragElement() {
        // остановка перемещения при отпускании кнопки мыши:
        document.onmouseup = null;
        document.onmousemove = null;
        if (new Date().getTime()-date1<300) {
            click();
        }
        else {
            e = elmnt.getBoundingClientRect();
            setCoordsMovedElementAjax(elmnt.getAttribute('idMovedElement'), e.top-area.getBoundingClientRect().top, e.left-area.getBoundingClientRect().left);
        }
    }
    function checkEnd() {
        a = area.getBoundingClientRect();
        e = elmnt.getBoundingClientRect();
        if (e.x < a.x || e.y < a.y || (e.x-e.width)>a.width || (e.y+e.height)>a.height){
            elmnt.style.top = (a.height/2) + "px";
            elmnt.style.left = (a.width/2) + "px";
            closeDragElement();
            return true;
        }
        return false;
    }
    function click(){
        console.log('-',elmnt);
    }
}
function startMovedElements(){
    var movedElements = document.getElementsByClassName("moved-element");
    for (var i = 0; i < movedElements.length; i++) {
        dragElement(movedElements[i]);
    }
}
function addSubchapter(){
    editSubchapterAjax(subchapterWindow.id.getAttribute('value'), subchapterWindow.title.value, subchapterWindow.description.value, subchapterWindow.color.value, subchapterWindow.chapterId.getAttribute('value'));
}

// Выполнить сразу
document.getElementsByClassName("tablinks-login")[0].click();
//dragElement(document.getElementById("mydiv"));

var mainListItems = document.getElementsByClassName("main-list-item");
if (mainListItems.length > 0) {
    mainListItems[0].click();
}
//startMovedElements()
