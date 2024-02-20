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

