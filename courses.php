<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="index.css" />
  <script src="https://kit.fontawesome.com/3f04a3eb9b.js" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="fonts/google-fonts.css" /> -->
  <title>Cad Tech</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body style="background-color: white;">
<?php
include "config.php";
?>
<header>
    <nav>
      <div class="nav">
        <span>
          <!-- changed structre agar 700 se kam hua to only icon dikhega -->
          <a href="tel:+91 9084868584"><i class="fa fa-phone"></i><span>+91 9084868584</span></a>
          <!-- <a href="mailto:cadtech.hrd@gmail.com"><i
              class="fa-regular fa-envelope"></i><span>cadtech.hrd@gmail.com</span></a> -->
        </span>

      </div>
      <div class="nav">
        <a href="index.php"><img src="./images/logo.png" class="logo" alt="logo">
        </a>
        <div>
          <label class="links" for="ham"><i class="fa-solid fa-bars"></i></label>
          <input type="checkbox" name="ham" id="ham">
          <ul id="show">
            <li class="links">
              <a href="about.php">About Us</a>
            </li>
            <li class="links course-link">
              <a>Courses</a>
              <div class="hover">
                <ul>
                  <h2>Popular courses</h2>
                  <?php
                  
                  
                  $sql = "SELECT * from course where rating=5.0";
                  $result = mysqli_query($connection, $sql);
                  $x = 1;
                  while ($row = mysqli_fetch_array($result)) {
                    echo '<a class="learn" name="' . $row['name'] . '"><li>' . $row['name'] . '</li></a>';
                    $x++;
                  }
                  ?>
                </ul>
                <ul>
                  <h2>course category</h2>
                  <a href="./courses.php?name=Web Programming">
                    <li> Web Development</li>
                  </a>
                  <a href="./courses.php?name=Programming">
                    <li> Programming</li>
                  </a>
                  <a href="./courses.php?name=Mechanical">
                    <li> Mechanical Engineering</li>
                  </a>
                  <a href="./courses.php?name=Civil">
                    <li> Civil </li>
                  </a>
                  <a href="./courses.php?name=Electrical">
                    <li> Electrical</li>
                  </a>
                  <a href="./courses.php?name=SAP">
                    <li> SAP</li>
                  </a>
                  <a href="./courses.php?name=Diploma">
                    <li> Diploma</li>
                  </a>
                </ul>
              </div>
            </li>
            <li class="links course-link">
              <a>Services</a>
              <div class="hover">
                <ul>
                  <h1>Services</h1>
                  <!-- <li>Teaching</li> -->
                  <li>Web Designing</li>
                  <li>Interior Designing</li>
                  <li>Exterior Designing</li>
                  <li>Home Plans</li>
                  <li>Machine Designing</li>
                </ul>
              </div>
            </li>
            
            <li class="links">
              <a href="./index.php#contact">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <section>
    <img src="images\laptop-2838921_960_720.jpg" alt="" id="myimg" />
    <!-- for image section -->
  </section>
  <section>
    <h1 style="padding: 1rem; margin:auto;">
      <?php
      if ($_GET["name"] != "All") {

        echo $_GET["name"];
      } else {
        echo "All Courses";
      }
      ?>
    </h1>
  </section>
  <aside>
    <a class="learn" name="info1">
      <i class="fa-solid fa-circle-info"></i>
    </a>
    <a href="https://wa.me/c/919084868584">
      <i class="fa-brands fa-square-whatsapp"></i>
    </a>
  </aside>
  <side>
    
    <a  class="learn" name="inquiry"> <span>Enqui re</span></a>
  </side>
 <section class="section">
    </div>
    <div class="coures">
      <?php
      
      if ($connection) {
        $name = $_GET["name"];
if ($_GET["name"]=="Mechanical" || $_GET["name"]=="Civil" || $_GET["name"]=="Electrical" ){
  $sql = "select * from course where category='$name' or name='Autocad'";
}else{

  if ($_GET["name"] != "All") {
    
    $sql = "select * from course where category='$name'";
  } else {
    
    $sql = "select * from course";
  }
}
        $result = mysqli_query($connection, $sql);

        $x = 1;
        while ($row = mysqli_fetch_array($result)) {
          echo '<div class="course">
          <div class="img-cont">
          <img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="" />
          <a class="learn" name="' . $row['name'] . '">Learn More</a>
        </div>
        <span>' . $row['name'] . '</span>
        <div class="price">
          <div><i class="fa-solid fa-file-lines"></i>
            ' . $row['studentsenrolled'] . '
            <i class="fa-solid fa-user-group"></i>
            ' . $row["topicnumber"] . '
          </div>
          
        </div>
      </div>';
          $x++;
        }
      } else {
        echo 'some error occurd';
      }
      ?>
    </div>
  </section>
 <!-- footer starts -->
 <footer>
    
    <ul>
      <h1>Company</h1>
      <li><a href="about.php">About Us</a></li>
      <li><a href="gallery.html">Gallery</a></li>
      <li><a class="learn" name="Students_Corner">Students Corner</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a class="learn" name="Trainer">Become a Trainer</a></li>
      <li><a class="learn" name="Privacy_Policy"> Privacy Policy</a></li>
      <li><a class="learn" name="T&C"> Tearms and Condition</a></li>
    </ul>
    <ul>
      <h1>Services</h1>
      <li>Web Designing</li>
      <li>Interior Designing</li>
      <li>Exterior Designing</li>
      <li>Home Plans</li>
      <li>Machine Designing</li>
    </ul>
    <div style="border: 2px white; margin: 1rem">
      <!-- <img src="./images/logo.png" class="logo" alt="logo"> -->
      <a href="tel:+91 9084868584"> <i class="fa fa-phone"></i> +91 9084868584</a>
      <a href="mailto:cadtech.hrd@gmail.com"><i class="fa-regular fa-envelope"></i>cadtech.hrd@gmail.com</a>
      <h3>Head office</h3>
      <address><i class="fa-solid fa-location-dot"></i>T-4, A- Cluster, near ATM Chowk, Shivalik Nagar, Haridwar
      </address>
      <h3>2nd Branch</h3>
      <address><i class="fa-solid fa-location-dot"></i>105a, near Classic Stationary, Lane 1, Khanna Nagar, Ranipur
        More, Haridwar</address>
      <address style="display:flex; flex-direction: row;"><a href="http://facebook.com/cadtechharidwar"><i
            class="fa-brands fa-facebook"></i></a>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-linkedin"></i>
        <a href="http://instagram.com/cad_tech_institute/"><i class="fa-brands fa-instagram"></i></a>
      </address>
    </div>
  </footer>
 <?php
 $name = $_GET["name"];
 if ($_GET["name"]=="Mechanical" || $_GET["name"]=="Civil" || $_GET["name"]=="Electrical" ){
   $sql = "select * from course where category='$name' or rating=5.0 or name='Autocad'";
 }else{
 
   if ($_GET["name"] != "All") {
     
     $sql = "select * from course where category='$name' or rating=5.0";
   } else {
     
     $sql = "select * from course";
   }
 }
  $result = mysqli_query($connection, $sql);
  $x = 0;
  while ($row = mysqli_fetch_array($result)) {
    echo '<div class="hidden"  id="' . $row['name'] . '">
    <h1>' . $row['name'] . '</h1>
    <div>
      <span>Topics: ' . $row['topicnumber'] . '</span>
      <span><i class="fa-solid fa-hourglass-half"></i>Duration: ' . $row['durationfrm'] . '-' . $row['durationto'] . '</span>
      
    </div>
    <h2>Description</h2>
    <p>' . $row['description'] . '</p>
    <div>
    <img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="" />
      <ul>
        <h2>Topics</h2>';
    $dat = json_decode($row['topics']);
    if (gettype($dat) == "object") {
      foreach ($dat as $key => $value) {
        echo "<h4>" . $key . "</h4>;";
        echo "<ul>";
        foreach ($value as $ar) {
          echo "<li>" . $ar . "</li>";
        }
        echo "</ul>";
      }
    } else if (gettype($dat) == "array") {
      foreach ($dat as $ar) {
        echo "<li>" . $ar . "</li>,";
      }
    }
    echo '</ul>
    </div>
  </div>';
  }
  ?>
  <div class="hidden" id="info1">
    <h1>

    </h1>
    <div>
      <ul>
        <li><a class="learn" name="Partner" onclick="openPop(this)">Become Partner </a></li>
        <li><a class="learn" name="Trainer" onclick="openPop(this)"> Become Trainer</a></li>
        <li><a class="learn" name="Students_Corner" onclick="openPop(this)">Students Corner</a></li>
        <li><a class="learn" name="onlineteach" onclick="openPop(this)">Online course Enquiry</a></li>
      </ul>
    </div>
  </div>


  <!-- form for getting certivate of student -->


  <div class="hidden" id="Students_Corner">
    <h1>
      Get you certificate
    </h1>
    <form action="forms.php" name="certificate" method='post'>
      <label for="Id">Enter Your Id</label>
      <input type="number" name="certificateId" id="certificateId">
      <button type="submit">Submit</button>
    </form>
  </div>

  <!-- privacy policy card -->
  <div class="hidden" id="Privacy_Policy">
    <h1>
      Privacy Policys
    </h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, neque temporibus voluptatibus, animi voluptates
      suscipit vitae saepe aspernatur accusantium, labore voluptatem odit. Quae sunt atque magnam excepturi maxime, hic,
      aliquam molestias consectetur numquam repellat labore? Quas tenetur molestias perspiciatis mollitia maiores eum
      doloremque quibusdam! Doloremque aliquid ipsa temporibus placeat quia.</p>
  </div>

  <!-- terms and conditions card  -->
  <div class="hidden" id="T&C">
    <h1>
      Terms and Conditions
    </h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, neque temporibus voluptatibus, animi voluptates
      suscipit vitae saepe aspernatur accusantium, labore voluptatem odit. Quae sunt atque magnam excepturi maxime, hic,
      aliquam molestias consectetur numquam repellat labore? Quas tenetur molestias perspiciatis mollitia maiores eum
      doloremque quibusdam! Doloremque aliquid ipsa temporibus placeat quia.</p>
  </div>

  <div id="popup">
  </div>
  <?php
include "config.php";
include_once "Common.php";
$common = new Common();
$allCountries = $common->getCountries($connection);
?>
  <!-- form for partnership with us -->
  <div class="hidden" id="Partner">
    <h1>
      Become Our Partner
    </h1>
    <form action="forms.php" method='post'>
      <label for="name" >Name</label>
      <input type="text" name="namep" id="name" >
      <label for="email">Email</label>
      <input type="email" name="emailp" id="email">
      <label for="mobile">Mobile</label>
      <input type="number" name="mobilep" id="mobile">
      <h3>Proposed location</h3>
      <label for="addline">Address</label>
      <input type="text" name="addlinep" id="addline">
     
        <label>State <span style="color:red">*</span></label>
        <select class="form-control" name="state" id="stateId" onchange="getCityByState();"  >
            <option value="">State</option>
        </select>

        <label>City <span style="color:red">*</span></label>
        <select class="form-control" name="city" id="cityDiv">
            <option value="">City</option>
        </select>
      </select>
      <label for="zip">ZipCode</label>
      <input type="number" name="zipp" id="zip">
      <button type="submit">Submit</button>
    </form>
  </div>

  <!-- Become a trainer form  -->
  <div class="hidden" id="Trainer">
    <h1>
      Beacome a Trainer
    </h1>
    <form action="forms.php" method='post' enctype="multipart/form-data">
      <label for="name">Name</label>
      <input type="text" name="namet" id="name">
      <label for="email">Email</label>
      <input type="email" name="emailt" id="email">
      <label for="mobile">Mobile</label>
      <input type="number" name="mobilet" id="mobile">
      <label for="position">Applying Position</label>
      <input type="text" name="positiont" id="position">
      <label for="qualification">Qualification</label>
      <input type="text" name="qualificationt" id="qualification">
      <label for="resume">Upload Resume</label>
      <input type="file" name="resumet" id="resume">
      <button type="submit">Submit</button>
    </form>
  </div>

  <!-- general inquiry form -->
  <div class="hidden" id="inquiry">
    <h1>
      Enquiry Form
    </h1>
    <form action="forms.php" method='post'>
      <label for="name">Name</label>
      <input type="text" name="namei" id="name">
      <label for="email">Email</label>
      <input type="email" name="emaili" id="email">
      <label for="mobile">Mobile</label>
      <input type="number" name="mobilei" id="mobile">
      <label for="Category1">Course Category</label>
      <select name="Categoryi" id="Category1" onchange="kuchto(this)">

      </select>
      <label for="Course1">Course</label>
      <select name="Coursei" id="Course1">

      </select>
      <label for="Centre">Centre</label>

      <select name="centeri" id="center">
        <option value="select" selected>Select Center</option>
        <option value="Shivalik">T-4, A- Cluster, near ATM Chowk, Shivalik Nagar, Haridwar</option>
        <option value="Khanna">105a, near Classic Stationary, Lane 1, Khanna Nagar, Ranipur More, Haridwar</option>
      </select>
      <button type="submit">Submit</button>
    </form>
  </div>
  <!-- loading as json -->
  <?php
  $sql = "SELECT * from course";
  $result = mysqli_query($connection, $sql);
  $x = 0;
  echo "<script>let x = {";
  while ($row = mysqli_fetch_array($result)) {
    echo "'" . $row['name'] . "':'" . $row['category'] . "',";
  }
  echo "}</script>";
  ?>
  <!-- loading as json -->

  <!-- for for online class inquiry -->
  <div class="hidden" id="onlineteach">
    <h1>
      Online Classes
    </h1>
    <form action="forms.php" method='post'>
      <label for="name">Name</label>
      <input type="text" name="nameo" id="name">
      <label for="email">Email</label>
      <input type="email" name="emailo" id="email">
      <label for="mobile">Mobile</label>
      <input type="number" name="mobileo" id="mobile">
      <label for="Category">Course Category</label>
      <select name="Categoryo" id="Category2" onchange="kuchto2(this)">
        <option value="null" selected>Select Category</option>
      </select>

      <label for="Course2">Course</label>
      <select name="Course2o" id="Course2">

      </select>
      <button type="submit">Submit</button>
    </form>
  </div>

  <script>
    let p = document.getElementById('popup')
    p.addEventListener("click", (e) => {
      if (!p.children[0].contains(event.target)) {
        p.style.display = 'none';
      }
    })
    function openPop(e){
      let x = document.getElementById(e.name)
      p.style.display = 'flex'
      let div = document.createElement('div')
      div.innerHTML = x.innerHTML
      p.appendChild(div)
      setTimeout(() => {
        p.children[0].remove()
      }, 100);
    }
    Array.from(document.getElementsByClassName("learn")).forEach(e => {
      console.log(e.name);
      e.addEventListener('click', () => {
        let x = document.getElementById(e.name)
        p.style.display = 'flex'
        p.innerHTML = ''
        let div = document.createElement('div')
        div.innerHTML = x.innerHTML
        p.appendChild(div)
      })
    })
    function load() {

      let x = document.getElementById("inquiry");
      p.style.display = 'flex'
      p.innerHTML = ''
      let div = document.createElement('div')
      div.innerHTML = x.innerHTML
      p.appendChild(div)
    }
  </script>
  <script>
    let c = document.getElementById('Category1');
    let k = new Set(Object.values(x));
    let all = Object.entries(x);
    k.forEach(e => {
      let o = document.createElement('option')
      o.value = e
      o.innerHTML = e;
      c.appendChild(o);
    });
    function kuchto(e) {
      let v = e.options[e.selectedIndex].value
      if (v == 'null') {
        console.log('null');
        document.getElementById('Course1').innerHTML = '';
      }
      else {
        let f = all.filter(e => e[1] == v)
        f.forEach(f => {
          let o = document.createElement('option')
          o.value = f[0]
          o.innerHTML = f[0]
          document.getElementById('Course1').appendChild(o);
        })
      }
    }
  </script>
  <script>
    let c2 = document.getElementById('Category2');
    let k2 = new Set(Object.values(x));
    let all2 = Object.entries(x);
    k2.forEach(e => {
      let o = document.createElement('option')
      o.value = e
      o.innerHTML = e;
      c2.appendChild(o);
    });
    function kuchto2(e) {
      let v = e.options[e.selectedIndex].value
      if (v == 'null') {
        console.log('null');
        document.getElementById('Course2').innerHTML = '';
      }
      else {
        let f = all2.filter(e => e[1] == v)
        console.log(f);
        f.forEach(f => {
          let o = document.createElement('option')
          o.value = f[0]
          o.innerHTML = f[0]
          document.getElementById('Course2').appendChild(o);
        })
      }
    }
  </script>
  <script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 4000); // Change image every 2 seconds
}
</script>
<script>
    function getStatesByCountry() {
        var countryId = 101;
        $.post("ajax.php",{getStatesByCountry:'getStatesByCountry',countryId:countryId},function (response) {
           // alert(response);
            var data = response.split('^');
            var stateData = data[1];
            $("#stateId").html(stateData);
        });
    }
    getStatesByCountry();
    // (101, 'IN', 'India', 91)
    function getCityByState() {
        var stateId = $("#stateId").val();
        $.post("ajax.php",{getCityByState:'getCityByState',stateId:stateId},function (response) {
            // alert(response);
            var data = response.split('^');
            var cityData = data[1];
            $("#cityDiv").html(cityData);
        });
    }
</script>

</body>

</html>