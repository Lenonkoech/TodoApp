//customizing the add task button to point and submit add-task form
document.getElementById('add-btn').addEventListener('click', function () {
    document.getElementById('submit').click();
});

//Change color of an ative nav button onclick

function toggleActive(clickedButton) {
    var buttons = document.getElementsByClassName('btn');
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].classList.remove('active');
    }
    buttons[clickedButton - 1].classList.add("active");
}
//pointing <a> attributes to buttons for data validation

//linking all button
document.getElementById('all-link').addEventListener('click', function () {
    document.getElementById('all-btn').click();
});
//linking pending button
document.getElementById('pending-link').addEventListener('click', function () {
    document.getElementById('pending-btn').click();
});
//linking complete button
document.getElementById('complete-link').addEventListener('click', function () {
    document.getElementById('complete-btn').click();
});
//linking to category menu toggle
document.getElementById('category-link').addEventListener('click', function () {
    document.getElementById("category-toggle").click();
});
//linking to add category button
document.getElementById('mng-add').addEventListener('click', function () {
    document.getElementById('add-category').click();
});
//linking to category delete button
document.getElementById('mng-delete').addEventListener('click', function () {
    document.getElementById('delete-btn').click();
});
//linking to delete selected
document.getElementById('del-btn').addEventListener('click', function () {
    document.getElementById('delete-task').click();
});
//linking admin toggle button
document.getElementById('add-admin').addEventListener('click', function () {
    document.getElementById('admin-toggle').click();
});
//function to toggle the display of categories
function toggle() {
    // alert("Button clicked");
    var item = document.getElementById("item");
    if (item.style.display === "none") {
        item.style.display = "block";
    }
    else {
        item.style.display = "none"
    }
}

//function to toggle admin login
function toggleAdmin() {
    //alert("Button clicked");
    var adminForm = document.getElementById("adminToggle");
    if (adminForm.style.display === "none") {
        adminForm.style.display = "block";
    }
    else {
        adminForm.style.display = "none"
    }
}
