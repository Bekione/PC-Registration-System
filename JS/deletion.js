const deleteBtn = document.querySelector(".delete");
const headRow = document.querySelector(".head_row");
const bodyRows = document.querySelectorAll(".body_row");

deleteBtn.onclick = () => {    
    const deleteTitle = document.querySelector(".top.del");
    deleteTitle.classList.add("active");
    const th = document.createElement('th');
    const markTh = document.createElement('th');
    const title = document.createTextNode("Remove");
    const markAll = document.createElement("input");
    markAll.type = "checkbox";
    markAll.className += "mark_all";
    markAll.setAttribute("title", "Mark all");
    markAll.style.padding = "5px";
    th.setAttribute("scope", "col");
    markTh.setAttribute("scope", "col");
    th.appendChild(title);
    markTh.appendChild(markAll);
    headRow.appendChild(th);
    headRow.prepend(markTh);
    deleteBtn.setAttribute("disabled", true);
    
    bodyRows.forEach(row => {
        row.setAttribute("title", "");
        const td = document.createElement("td");
        const markTd = document.createElement("td");
        const checkBox = document.createElement("input");
        checkBox.className += "check";
        checkBox.type = "checkbox";
        td.className += "operation";
        const name = row.childNodes[3].innerText;
        const link = `<a href="#" class="remove" title="Delete ${name}"><span class="fa fa-times"></span></a>`;
        td.innerHTML = link;
        markTd.appendChild(checkBox);
        row.prepend(markTd);
        row.appendChild(td);
    });

    const checkMark = document.querySelector(".mark_all");
    const checkBoxes = document.querySelectorAll(".check");
    const deleteAllBtn = document.querySelector(".delete-all");
    const deleteAllLink = document.querySelector(".del-all-link");
    var isChecked = false;
    var num = 0;
    checkBoxes.forEach(box => {
        box.addEventListener('change', () => {
            if(box.checked){
                num++;
                isChecked = true;
            }
            else if(!box.checked){
                isChecked = false;
            }
        })
        if(isChecked){
            alert("Hello");
        }
    })
    
    checkMark.onclick = function(){
        if(checkMark.checked){
            checkBoxes.forEach(box => {
                if(!box.checked){
                    box.click();
                }
            })
        }
        if(!checkMark.checked){
            checkBoxes.forEach(box => {
                if(box.checked){
                    box.click();
                }
            })
        }
        deleteAllBtn.classList.toggle("active");
    }       
    deleteAllBtn.onclick = function(){
        if(confirm("Are you sure you want to delete all the data?")){
            if(confirm("This action cannot be undone know that!")){
                let delAllLink = `_REMOVE.php?deleteAll`;
                deleteAllLink.setAttribute("href", delAllLink);
            }
        }
    }
    var idArray = [];
    checkBoxes.forEach((box, index) => {
        box.addEventListener('change', () => {
            if(box.checked){
                box.parentElement.parentElement.classList.add("active");
                idArray.push(box.parentElement.parentElement.childNodes[2].innerHTML);
                console.log(idArray);
            } else {
                box.parentElement.parentElement.classList.remove("active");
                idArray.pop(box.parentElement.parentElement.childNodes[2].innerHTML);
                console.log(idArray);
            }
        });
    })
    
    const removeIcons = document.querySelectorAll('.remove');
    for(let i=0; i<removeIcons.length; i++){
        const stdName = removeIcons[i].parentElement.parentElement.childNodes[4].innerText;
        const stdId = removeIcons[i].parentElement.parentElement.childNodes[2].innerText;
        removeIcons[i].onclick = function(){
            if(confirm(`Are you sure you want to delete pc owner ${stdName}?`)){
                let delLink = `_REMOVE.php?deleteId=${stdId}`;
                removeIcons[i].setAttribute("href", delLink);
            } else {
                removeIcons[i].setAttribute("href", "manage.php");
            }
        }
    }            
}
