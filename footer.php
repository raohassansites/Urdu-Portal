<footer>
  <p>Made By Umer Sajid</p>
</footer>





<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="js/plugins.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
<script src='js/jquery-1.11.0.min.js' type="text/javascript"></script>
<script src="js/vote_scripts.js"></script>
<script>
        function myFunction() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
        }
</script>
<script type="text/javascript">
  (function() {
    $("#btn1").on("click", function() {
      $(".user-detail-drpdwn").fadeToggle("fast", "linear").css('display', 'flex');
    });
  })();
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
  });
</script>
<script type="text/javascript">
      const btn = document.querySelector("#login")
      const searchBox = document.querySelector(".full-screen")
      const closeBtn = document.querySelector(".closeBtn")
      closeBtn.addEventListener("click", () => {
        searchBox.style.display = "none"
      })
      btn.addEventListener('click', () => {
        searchBox.style.display = "block"
      })
</script>
<script type="text/javascript">
      const btn1 = document.querySelector("#login-1")
      const searchBox1 = document.querySelector(".full-screen-1")
      const closeBtn1 = document.querySelector(".closeBtn-1")
      closeBtn1.addEventListener("click", () => {
        searchBox1.style.display = "none"
      })
      btn1.addEventListener('click', () => {
        searchBox1.style.display = "block"
      })
</script>
<script type="text/javascript">
      const btn2 = document.querySelector("#pop-up")
      const searchBox2 = document.querySelector(".full-screen-2")
      const closeBtn2 = document.querySelector(".closeBtn-2")
      closeBtn2.addEventListener("click", () => {
        searchBox2.style.display = "none"
      })
      btn2.addEventListener('click', () => {
        searchBox2.style.display = "block"
      })
</script>