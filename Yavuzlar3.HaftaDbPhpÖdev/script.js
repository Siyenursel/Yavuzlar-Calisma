const inputBox = document.getElementById('input-box');
const addButton = document.getElementById('buton1');
const tasksList = document.getElementById('tasks');
const searchBox = document.getElementById('searchİnput');
const todo = document.getElementById('todo');
const username = document.getElementById('username');


let tasks = [];

window.addEventListener('load', () => {
    const storedTasks = todo.innerHTML;
    console.log(storedTasks);
    if (storedTasks) {
        tasks = JSON.parse(storedTasks);
        updateTaskList();
    }
});

addButton.addEventListener('click', görevEkle);



function görevEkle() {
    const taskText = inputBox.value.trim();

    if (taskText !== '') {
        
        tasks.push(taskText);

        updateTaskList();

        inputBox.value = '';

        saveData();
    }
}

function updateTaskList() {
    tasksList.innerHTML = '';

    for (let i = 0; i < tasks.length; i++) {
        const task = tasks[i];

        if(task.includes(searchBox.value)){

        const taskDiv = document.createElement('div');
        taskDiv.classList.add('List');

        const taskInput = document.createElement('input');
        taskInput.type = 'text';
        taskInput.value = task;
        taskInput.readOnly = true;
           
const editButton = document.createElement('button');
editButton.textContent = 'DÜZENLE';
editButton.classList.add('butonDüzenle'); 
const deleteButton = document.createElement('button');
deleteButton.textContent = 'SİL';
deleteButton.classList.add('butonSil'); 

taskDiv.appendChild(taskInput);
taskDiv.appendChild(editButton);
taskDiv.appendChild(deleteButton);
    
        tasksList.appendChild(taskDiv);

        editButton.addEventListener('click', () => editTask(i));
        deleteButton.addEventListener('click', () => deleteTask(i));
     }
    }
    searchBox.addEventListener("input",updateTaskList)
}
function editTask(index) {

    // Hocam prompt ekranı açmadan nasıl değiştireceğimi bir türlü bulamadım denemeler kalsın dedim silmedim
//    var deger = document.getElementById("listeText");
//    deger.readOnly = false;
//    editButton.textContent = 'kaydet' ;

    const updatedTaskText = prompt('Yeni görev metnini girin:', tasks[index]);
    
    if (updatedTaskText != null) {
        tasks[index] = updatedTaskText;
        updateTaskList();

     saveData();
    }
}

function deleteTask(index) {
    tasks.splice(index, 1);
    updateTaskList();

    saveData();
}

function saveData()
{


var todolist = new FormData();
todolist.append("newtodo",JSON.stringify(tasks));
todolist.append("username",username.innerHTML);

fetch("update.php",{
    method: 'POST',
    body: todolist
});



}











