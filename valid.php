<!DOCTYPE html>
<html>
<head>
  <script>
    function validateValueU() {
      var inputU = document.getElementById("inputU").value;
      var expected = "200"; // Replace with the exact value you want to validate

      if (inputU === expected) {
        alert("Value is valid!");
      } else {
        alert("Value is not valid. ");
      }
    }
    function validateExactValue() {
      var inputValue = document.getElementById("inputValue").value;
      var expectedValue = "50"; // Replace with the exact value you want to validate

      if (inputValue === expectedValue) {
        alert("Value is valid!");
      } else {
        alert("Value is not valid. ");
      }
    }
    function validateValue() {
      var input = document.getElementById("input").value;
      var expected = "140"; // Replace with the exact value you want to validate

      if (input === expected) {
        alert("Value is valid!");
      } else {
        alert("Value is not valid. ");
      }
    }
    function validateVal() {
      var inputAUB = document.getElementById("inputAUB").value;
      var expected = "24"; // Replace with the exact value you want to validate

      if (inputAUB === expected) {
        alert("Value is valid!");
      } else {
        alert("Value is not valid. ");
      }
    }
  </script>
</head>
<body>
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
          <form>
            <label for="inputU">n(U):</label>
            <input type="text" id="inputU" name="inputU">
            <input type="button" value="Validate" onclick="validateValueU()">
          </form><br><br>
  <form>
    <label for="inputValue">n(A):</label>
    <input type="text" id="inputValue" name="inputValue">
    <input type="button" value="Validate" onclick="validateExactValue()">
  </form><br><br>
  <form>
    <label for="input">n(B):</label>
    <input type="text" id="input" name="input">
    <input type="button" value="Validate" onclick="validateValue()">
  </form><br><br>
  <form>
    <label for="input">n(AUB):</label>
    <input type="text" id="inputAUB" name="inputAUB">
    <input type="button" value="Validate" onclick="validateVal()">
  </form>
  <button type="button"  class="btn btn-primary"
  style="background-color: rgb(171, 1, 1);color: rgb(240, 255, 255) ; --bs-btn-font-size:18px; border: 3px solid rgb(7, 0, 0); margin-left: 650px;"><a href="ven.php" style="color:#ffffff";>Generate a venn diagram</a>
  
</button>
</body>
</html>
