function addReminder() {
    var taskInput = document.getElementById("task-input");
    var datetimeInput = document.getElementById("datetime-input");
    var notesInput = document.getElementById("notes-input");

    if (taskInput.value === "" || datetimeInput.value === "") {
      alert("Please enter a task and a date/time.");
      return;
    }

    var reminderList = document.getElementById("reminder-list");
    var reminderItem = document.createElement("li");
    reminderItem.classList.add("reminder-item");

    var taskSpan = document.createElement("span");
    taskSpan.textContent = taskInput.value;

    var datetimeSpan = document.createElement("span");
    var datetimeValue = new Date(datetimeInput.value);
    var formattedDate = datetimeValue.toLocaleString();
    datetimeSpan.textContent = formattedDate;

    var notesSpan = document.createElement("span");
    notesSpan.textContent = notesInput.value;
    notesSpan.classList.add("notes");

    var deleteBtn = document.createElement("button");
    deleteBtn.classList.add("btn");
    deleteBtn.textContent = "Delete";
    deleteBtn.onclick = function() {
      reminderItem.remove();
    };

    reminderItem.appendChild(taskSpan);
    reminderItem.appendChild(datetimeSpan);
    reminderItem.appendChild(notesSpan);
    reminderItem.appendChild(deleteBtn);
    reminderList.appendChild(reminderItem);

    taskInput.value = "";
    datetimeInput.value = "";
    notesInput.value = "";
  }
  function updateTime() {
    const currentTime = new Date().toLocaleTimeString();
    const currentTimeElement = document.getElementById("current-time");
    currentTimeElement.innerHTML = currentTime;
  }

  setInterval(updateTime, 1000);