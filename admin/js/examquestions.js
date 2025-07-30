let num = 1;
function submitRegistration() {
  

    const num_of_questions = document.getElementById('no_of_questions').value;
    if(num_of_questions == 0){
        document.getElementById('warn').innerHTML = "pleas enter number of questions";
        console.log("pleas enter number of questions")
    }else{
        document.getElementById('warn').innerHTML = "";
         let usersHtml = '';
    for (let i = 1; i <= num_of_questions; i++) {
        num+=1;
         usersHtml += `
            <label for="question_statement${i}"> ${i}Question Statement:</label><br>
            <input type="text" id="question_statement${i}" name="question_statement${i}" required><br>
        
            <label for="option_a${i}">Option A:</label><br>
            <input type="text" id="option_a${i}"  name="option_a${i}" required><br>
        
            <label for="option_b${i}">Option B:</label><br>
            <input type="text"  id="option_b${i}" name="option_b${i}" required><br>
        
            <label for="option_c${i}">Option C:</label><br>
            <input type="text"  id="option_c${i}" name="option_c${i}" required><br>
        
            <label for="option_d${i}">Option D:</label><br>
            <input type="text" id="option_d${i}" name="option_d${i}" required><br>
        
            <label for="correct_option${i}">Correct Option:</label><br>
            <input  type="text" id="correct_option${i}" name="correct_option${i}"required><br><br><br>
        `;
    }
    usersHtml = `<hr> <br/> <br/>`+usersHtml;
    document.getElementById('questionsContainer').innerHTML = usersHtml;

    document.getElementById('submitBtn').style.display = 'block';
    document.getElementById('Generate_fieldes').style.display = 'none';
    }
   
}


document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    fetch('add_users.php', {
        method: 'POST',
        body: new FormData(this)
    })
    .then(response => response.text())
    .then(data => {
        alert(data);//it was alert
    })
    .catch(error => console.error('Error:', error));
});

function add_one_question_field(){
    let usersHtml = '';
    usersHtml = `
    <label for="question_statement${num}"> ${num}Question Statement:</label><br>
    <input type="text" id="question_statement${num}" name="question_statement${num}" required><br>

    <label for="option_a${num}">Option A:</label><br>
    <input type="text" id="option_a${num}"  name="option_a${num}" required><br>

    <label for="option_b${num}">Option B:</label><br>
    <input type="text"  id="option_b${num}" name="option_b${num}" required><br>

    <label for="option_c${num}">Option C:</label><br>
    <input type="text"  id="option_c${num}" name="option_c${num}" required><br>

    <label for="option_d${num}">Option D:</label><br>
    <input type="text" id="option_d${num}" name="option_d${num}" required><br>

    <label for="correct_option${num}">Correct Option:</label><br>
    <input  type="text" id="correct_option${num}" name="correct_option${num}"required><br><br><br>
`;
document.getElementById('questionsContainer').innerHTML += usersHtml;
num+=1;
}