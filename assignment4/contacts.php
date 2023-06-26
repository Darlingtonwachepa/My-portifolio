<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  <style>
   label{
    width: 400px;
    height: 5vh;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
   }

   input, select {
    height: 4vh;
    width: 200px;
   }
   input[type="checkbox"]{
    width: 20px;
    height: 20px;
    cursor: pointer;
   }

   button {
     width: 100px;
     height: 4vh;
     cursor: pointer;
     margin-right: 2em;
   }
    fieldset {
      background-color: rgb(3, 106, 143);
      color: white;
      font-size: large;
    }
  legend {
    background-color: black;
    padding: 2px 10px;
  }
    body {
      background-color: whitesmoke;
    }
    #msg {
      width: 200px;
      height: 8vh;
    }
  </style>
  
  <?php
        if(isset($_POST['fname'])){
          $dbConn = new mysqli('localhost', 'root', '', 'potifolio');
  
          if($dbConn->connect_error){
            die($dbConn->connect_error);
          }
  
          $fname = $_POST['fname'];
          $surname = $_POST['surname'];
          $id = $_POST['email'];
          $msg = $_POST['message'];
  
          $query = "INSERT INTO `contacts`(`email`, `fname`, `surname`, `message`) VALUES ('$id','$fname','$surname','$msg');";
  
          if(!$dbConn->query($query)){
            echo '<h1>Form submission failed</h1>';
          }else{
            header('location: index.html');
          }
        }
      ?>
  
  <form action="contacts.php" method="post" class="form">
    <fieldset>
      <legend>Fill in Your Details:</legend>
      <div class="form-group">
          <label><span>Firstname:</span><input type="text" name="fname" class="fname" required placeholder="Type Your Name"></label> <br><br>
      </div>
      <label><span>Surname:</span><input type="text" name="surname" class="surname" required placeholder="Type Your Surname"> </label><br><br>
      <label><span>Email:</span> <input type="email" name="email" class="mail" required placeholder="Type Your Email"></label><br><br>

      <label>Sex:<input type="checkbox" name="gen" class="male"> Male <input type="checkbox" name="gen"
        class="female">female </label><br><br>

      <label><span>Message:</span><textarea name="message" id="msg" cols="50" rows="2" placeholder="Type Your Message" required></textarea></label>
      <br><br><br><br>
      <button type="submit">Submit</button>
      <button type="reset">Reset</button>
    </fieldset>
  </form>

  <script>
    let form = document.querySelector('.form');
    let fname = document.querySelector('.fname');
    let surname = document.querySelector('.surname');
    let msg = document.querySelector('#msg');
    let male = document.querySelector('.male');
    let female = document.querySelector('.female');


    form.onsubmit = function (e) {
      e.preventDefault();

      //isNaN() return true is the pased data is a string else return false
      if (!isNaN(fname.value)) {
        alert('Name must be textual data');
        return;
      }

      if (fname.value.length < 2) {
        alert('Name cannot be a single character');
        return;
      }

      if (!isNaN(surname.value)) {
        alert('Surname must be textual data');
        return;
      }

      if (surname.value.length < 2) {
        alert('Surname cannot be a single character');
        return;
      }

      if (!male.checked && !female.checked) {
        alert('please make sure you select your gender');
        return;
      }

      if(msg.value.length < 5){
        alert("Message seems to be to short");
        return;
      }

      e.target.submit();
    }
  </script>

</body>
</html>