<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web 2023</title>
</head>

<body>

    <form action="./process_db.php" id="registrationForm" method="POST">
      
        <table border="1">

            <tr>
                <td><label for="name">Name</label></td>
                <td><input type="text" name="name" id="name"></td>
            </tr>

            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="email" id="email"></td>
            </tr>

            <tr>
                <td><label for="zipCode">Zip Code</label></td>
                <td><input type="text" name="zipCode" id="zipCode"></td>
            </tr>

            <tr>
                <td><label for="country">Country</label></td>
                <td><select name="country" id="country">
                        <option selected disabled>[choose yours]</option>
                        <option value="usa">USA</option>
                        <option value="uk">UK</option>
                        <option value="india">INDIA</option>
                    </select></td>
            </tr>


            <tr>
                <td></td>
                <td><button type="submit">Submit</button></td>
            </tr>

        </table>

    </form>

    <script>

        const registrationForm = document.getElementById('registrationForm');

        registrationForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const zipCode = document.getElementById('zipCode').value;
            const country = document.getElementById('country').value;

            if(name !== "" && email !== "" && zipCode !== "" && country !== "") {
                
                if(!email.includes('@')) {
                    alert("Incorrect email standard");
                }else {
                    registrationForm.submit();
                }

            }else {
                alert("All data must be entered befre submission");
            }

        });

    </script>

</body>

</html>