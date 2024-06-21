<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
      function validateExactValue() {
         var n(A) = document.getElementById("n(A)").value;
         var expectedValue = "50"; // Replace with the exact value you want to validate
   
         if (n(A) === expectedValue) {
           alert("Value is valid!");
         } else {
           alert("Value is not valid. Please enter the exact value.");
         }
       }
   </script>
</head>
<style>
    input[type="tel"] {
  border: 1px solid #ddd;
  padding: 4px 8px;
}
input[type="tel"]:focus {
  border: 1px solid #000;
}

input[type="submit"] {
  font-weight: bold;
  padding: 4px 8px;
  border:1px solid #000;
  background: #3b5998;
  color:#fff;
}

form {
  width: 50%;
  margin: 0 auto;
}

.p {
  padding-top: 30px;
}
</style>
<body>
  <Body background="https://img.freepik.com/premium-photo/abstract-white-background-product-display-with-banner-background_655634-81.jpg" style="background-size: cover;">
    <div class="pat">
    <figure class="figure">
          <img src="final.png" class="figure-img img-fluid rounded" alt="Somaiya Trust" style="height: 100px; width:1500px">           
            <figcaption class="figure-caption"></figcaption>
          </figure>
      <h3 style="margin-left: 650px;">Inclusion & Exclusion Principle</h3>
    <p>
      <h4>  Q.Out of 200 students, 50 of them take the course discrete athematics, 140 of them take the course economics and 24 of them take both the courses. Since both courses have scheduled examations for the following day, only students who are not in either one of these courses will be able to go to the party, the night before. Find how many students will be at the party?</h4>
    </p>
    <form id="n(A)">
      <label for="n(A)">n(A):</label>
      <input type="text" id="n(A)" name="n(A)">
      <input type="button" value="Validate" onclick="validateExactValue()">
</form>


<br>
<form id="n(B)">
    <label for="n(B)">n(B: Economics )</label>
    <input type="text" id="n(B)" name="n(B)" required>
    <span id="error" style="color: red;"></span>
    <input type="submit" value="Submit">
  </form>
  
  <script>
    document.getElementById("n(B)").addEventListener("submit", function (event) {
      const n(B) = document.getElementById("n(B)");
      const errorSpan = document.getElementById("error");
      const value = parseFloat(n(B).value);
  
      if (isNaN(value) || value < 139 || value > 141) {
        errorSpan.textContent = "Invalid input";
        event.preventDefault();
      } else {
        errorSpan.textContent = "";
      }
    });
  </script>
<br>
<form id="n(AUB)">
    <label for="n(AUB)">n(AUB: Union of both)</label>
    <input type="text" id="n(AUB)" name="n(AUB)" required>
    <span id="error" style="color: red;"></span>
    <input type="submit" value="Submit">
  </form>
  
  <script>
    document.getElementById("n(AUB)").addEventListener("submit", function (event) {
      const n(AUB) = document.getElementById("n(AUB)");
      const errorSpan = document.getElementById("error");
      const value = parseFloat(n(AUB).value);
  
      if (isNaN(value) || value < 23 || value > 25) {
        errorSpan.textContent = "Invalid input";
        event.preventDefault();
      } else {
        errorSpan.textContent = "";
      }
    });
  </script>
  <br> <br> <br>
  <button type="button"  class="btn btn-primary"
  style="background-color: rgb(171, 1, 1);color: rgb(240, 255, 255) ; --bs-btn-font-size:18px; border: 3px solid rgb(7, 0, 0); margin-left: 650px;"><a href="ven.php" style="color:#ffffff";>Generate a venn diagram</a>
  
</button>
</body>
</html>