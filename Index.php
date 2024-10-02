<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation/Ajax Exercise 5</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <h2>Please Fill Out the Following</h2>
    <form id="myForm">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        
        <label for="email">Enter your email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="age">Enter your age:</label>
        <input type="number" id="age" name="age" required><br>

        <button type="submit">Submit HereEeeeEe</button>
    </form>

    <div id="result"></div>

    <script>
        $(document).ready(function() {
            $('#myForm').on('submit', function(event) {
                event.preventDefault();

                
                const name = $('#name').val().trim();
                const email = $('#email').val().trim();
                const age = $('#age').val().trim();

                if (name === '' || email === '' || age === '') {
                    alert('Please fill all fields.');
                    return;
                }

                
                $.ajax({
                    type: 'GET',
                    url: 'process.php',
                    data: $(this).serialize(),
                    dataType: 'xml', 
                    success: function(response) {
                        const name = $(response).find('name').text();
                        const email = $(response).find('email').text();
                        const age = $(response).find('age').text();
                        $('#result').html(`Name: ${name}<br>Email: ${email}<br>Age: ${age}`);
                    },
                    error: function() {
                        alert('Error submitting the form.');
                    }
                });
            });
        });
    </script>

</body>
</html>
