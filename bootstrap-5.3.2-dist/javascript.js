function showRegisterForm() {
    var loginForm = document.getElementById("loginForm");
    var registerForm = document.getElementById("registerForm");

    // Hide loginForm and show registerForm
    loginForm.style.display = 'none';
    registerForm.style.display = 'block';
}

function showLoginForm() {
    var loginForm = document.getElementById("loginForm");
    var registerForm = document.getElementById("registerForm");

    // Hide registerForm and show loginForm
    registerForm.style.display = 'none';
    loginForm.style.display = 'block';
}

function updateRightColumn(option) {
    // var rightColumn = document.querySelector('.col-9');
    var rightColumn = document.getElementById('rightColumn');

    // Clear previous content
    rightColumn.innerHTML = '<img class="bg" src="bgi.png" alt="">';

    // Add content based on the selected option
    switch (option) {
        case 'atc':
            rightColumn.innerHTML = '<img src="adminbg.jpg">';
            break;
        case 'cn':
            rightColumn.innerHTML = '<p>This is the content for CN.</p>';
            break;
        case 'dbms':
            rightColumn.innerHTML = '<p>This is the content for DBMS.</p>';
            break;
        case 'aiml':
            rightColumn.innerHTML = '<p>This is the content for AIML.</p>';
            break;
        case 'dbmslab':
            rightColumn.innerHTML = '<p>This is the content for DBMS Lab.</p>';
            break;
        case 'rm':
            rightColumn.innerHTML = '<p>This is the content for RM.</p>';
            break;
        case 'evs':
            rightColumn.innerHTML = '<p>This is the content for EVS.</p>';
            break;
        case 'c#':
            rightColumn.innerHTML = '<p>This is the content for C#.</p>';
            break;
        case 'report':
            rightColumn.innerHTML = '<p>This is the content for Report.</p>';
            break;
        // Add more cases for other options
    }
}


function updateBottum(option) {
    var bottum = document.getElementById('bottum');

    // Clear previous content
    bottum.innerHTML = '';

    // Add content based on the selected option
    switch (option) {
        case 'student':
            bottum.innerHTML = '<a href="admin_student_details.php">Display</a>';
            break;
        case 'course':
            bottum.innerHTML = '<p>This is the content for Coirse.</p>';
            break;
        // Add more cases for other options
    }
}