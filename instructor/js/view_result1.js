function fetch_result() {
    var username = document.getElementById("stud_name").value;
    var id = document.getElementById("id").value;
    var exam_id = document.getElementById("examid").value; 
    if (username === "" || id === "" || exam_id === "") {
        document.getElementById("response").innerHTML = "<p>Please fill the form first!!</p>";
    } else {
        // Perform AJAX request to PHP script for user validation
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("response").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "view_result.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("stud_name=" + username + "&id=" + id + "&exam_id=" + exam_id);
    }
}