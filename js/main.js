
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
    //subchapterWindow.chapterId.setAttribute('value', itemId);
    if (itemId == -1) getCalendarElementsAjax(); // если выбран календарь
    else getMovedElementsAjax(itemId); // аякс запрос
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
        //console.log('-',elmnt);
        getSubchapterElementAjax(elmnt.getAttribute('idMovedElement'));  
    }
}
function startMovedElements(){
    var movedElements = document.getElementsByClassName("moved-element");
    for (var i = 0; i < movedElements.length; i++) {
        dragElement(movedElements[i]);
    }
}
function addSubchapter(){
    closeWindows();
    editSubchapterAjax(document.getElementById('subchapter_id').getAttribute('value'), document.getElementById('subchapter_title').value, 
        document.getElementById('subchapter_description').value, document.getElementById('subchapter_color').value, 
        document.getElementById('subchapter_chapter_id').getAttribute('value'));
}
function addChapter(){
    closeWindows();
    editChapterAjax(document.getElementById('chapter_id').getAttribute('value'), document.getElementById('chapter_title').value, 
        document.getElementById('chapter_description').value, document.getElementById('chapter_color').value);
}
function editChapter(itemId){
    document.getElementById('window-addchapter').style.display = 'block';
    getEditingChapterAjax(itemId);
}
function editSubchapter(itemId, chapterId){
    document.getElementById('window-view-subchapter').style.display = 'none';
    document.getElementById('window-addsubchapter').style.display = 'block';
    getEditingSubchapterAjax(itemId, chapterId);
}
function editDailyTask(itemId){
    document.getElementById('window-adddailytask').style.display = 'block';
    getEditingDailyTaskAjax(itemId);
}
function addDailyTask(){
    closeWindows();
    editDailyTaskAjax(document.getElementById('task_id').getAttribute('value'), document.getElementById('task_title').value, 
        document.getElementById('task_description').value);
}
function closeWindows(){
    document.getElementById('window-addchapter').style.display = 'none';
    document.getElementById('window-addsubchapter').style.display = 'none';
    document.getElementById('window-view-subchapter').style.display = 'none';
    document.getElementById('window-delete').style.display = 'none';
    document.getElementById('window-adddailytask').style.display = 'none';
}
function deleteWindow(chapterId, subchapterId){
    if (chapterId > 0) document.getElementById('window-delete-title').innerText = 'Удалить группу?';
    else if (subchapterId > 0) document.getElementById('window-delete-title').innerText = 'Удалить элемент?';
    document.getElementById('window-delete-chapter').setAttribute('value', chapterId);
    document.getElementById('window-delete-subchapter').setAttribute('value', subchapterId);
    document.getElementById('window-delete').style.display = 'block';
}
function deleteElement(){
    closeWindows();
    let chapterId = document.getElementById('window-delete-chapter').getAttribute('value');
    let subchapterId = document.getElementById('window-delete-subchapter').getAttribute('value');
    if (chapterId > 0) deleteElementAjax('chapter', chapterId);
    else if (subchapterId > 0) deleteElementAjax('subchapter', subchapterId);
}

// Выполнить сразу
document.getElementsByClassName("tablinks-login")[0].click();
getMainChaptersAjax();
//dragElement(document.getElementById("mydiv"));

/*var mainListItems = document.getElementsByClassName("main-list-item");
if (mainListItems.length > 0) {
    mainListItems[0].click();
}*/
//startMovedElements()
