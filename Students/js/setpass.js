function validateUser() {
    var username = document.getElementById("username").value;
    var id = document.getElementById("id").value;
    var password = document.getElementById("password").value;

    if (username === "" || id === "" || password === "") {
        document.getElementById("response").innerHTML = "<p>Please fill the form first!!</p>";
    } else {
        // Perform AJAX request to PHP script for user validation
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("response").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "setpass.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("username=" + username + "&id=" + id + "&password=" + password);
    }
}
