<?php
include "config.php";
?>
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
  <script src="./index.js"></script>
  <script>
    function band() {
      console.log('yes');
      ele = document.getElementsByTagName("input");
      for (var i = 0; i < ele.length; i++)
        ele[i].checked = false;
    }
  </script>
  <style>
    #contact * {
      font-size: large;

      color: #001D6E;
      align-items: center;
      justify-content: center;
    }

    #contact h5 {
      margin: auto;
      justify-content: center;
    }

    #contac {
      display: flex;
      flex-direction: column;
    }

    #contac p {
      margin-top: 1rem;
    }

    #contac i {
      margin: 1rem auto;
      height: 2rem;
      width: 3rem;
    }

    #contac button {
      width: max-content;
      margin: auto;
    }
  </style>
</head>



<body onload="load()">
  <header>
    <nav>
      <div class="nav">
        <a href="./"><img src="./images/logo.png" class="logo" alt="logo"></a>
        <div>
          <label class="links" for="ham" id="menu"><i class="fa-solid fa-bars"></i></label>
          <input type="checkbox" name="ham" id="ham">
          <ul id="show">
            <div>
              <div class="row">
                <img src="./images/logo.png" class="logo" alt="logo">
                <i class="fa-solid fa-xmark" id="cross"></i>
              </div>
              <div class="list">
                <span class='row'>Courses<label for="n1"><i class="fa-solid fa-chevron-down"></i></label></span>
                <input type="radio" name="drop" id="n1">
                <div class="list">
                  <?php
                  $sql = "SELECT * from category";
                  $result = mysqli_query($connection, $sql);
                  while ($row = mysqli_fetch_array($result)) {
                    $name = $row['categor'];
                    echo '<li><span class="row"><a href="./courses.php?name=' . $name . '">' . $name . '</a>
                      <label for="' . str_replace(' ', '_', $name) . '"><i class="fa-solid fa-chevron-down"></i></label></span>
                      <input type="radio" name="drop2" id=' . str_replace(' ', '_', $name) . '>
                      <div class="list">';
                    $sql2 = "SELECT * from course where category='$name'";
                    $result2 = mysqli_query($connection, $sql2);
                    while ($row2 = mysqli_fetch_array($result2)) {
                      echo '<a class="learn row" name="' . $row2['name'] . '">' . $row2['name'] . '</a>';
                    }
                    echo ('</div></li>');
                  }
                  ?>
                </div>
              </div>
              <div class='list'>
                <span class='row'>
                  <span>Services</span>
                  <label for="n2"><i class="fa-solid fa-chevron-down"></i></label>
                </span>
                <input type="radio" name="drop" id="n2">
                <div class="list">
                  <li class="row">Web Designing</li>
                  <li class="row">Interior Designing</li>
                  <li class="row">Exterior Designing</li>
                  <li class="row">Home Plans</li>
                  <li class="row">Machine Designing</li>
                </div>
              </div>
              <div class="row">
                <a class="learn" name="onlineteach">Online course</a>
              </div>
              <div class="row">
                <a class="learn" name="Students_Corner">Students Corner</a>
              </div>
              <div class="row">
                <a href="about.php">About Us</a>
              </div>
              <div class="row">
                <a href="#contact" onclick="band()">Contact Us</a>
              </div>
            </div>
          </ul>
        </div>
    </nav>
  </header>
  <section>
    <div class="slideshow-container">

      <div class="mySlides fade">
        <img src="./images/monitor-1307227_960_720.jpg" style="width:100%">
      </div>

      <div class="mySlides fade">
        <img src="./images/code-1839406_960_720.jpg" style="width:100%">
      </div>

      <div class="mySlides fade">
        <img src="./businessman-4608276__340.jpg" style="width:100%">
      </div>

    </div>
    <div style="text-align:center">
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div>

    <!-- for image section -->
  </section>
  <section class="section category">
    <div class="culist">
      <?php
      $sql = "SELECT * from category";
      $result = mysqli_query($connection, $sql);

      while ($row = mysqli_fetch_array($result)) {
        echo '<a href="./courses.php?name=' . $row['categor'] . '" class="imgcu">
        <img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="" />
        <span class="category-name">' . $row['categor'] . '</span>
      </a>';
      }
      ?>
    </div>
    <!-- for categories of courses in round form -->
  </section>
  <section class="section">
    <div class="upper">
      <h1>Trending Courses</h1>
      <a href="./courses.php?name=All">View All</a>
    </div>
    <div class="courses">
      <?php
      $sql = "SELECT * from course where rating=5.0";
      $result = mysqli_query($connection, $sql);

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
      }
      ?>
    </div>
  </section>

  <section class="section">
    <div class="middle">
      <h1>Why choose us?</h1>
      <span>A choice that makes the difference.</span>
    </div>
    <div class="choose-us">
      <div>
        <img src="./images/expirience.svg" alt="">
        <h3>Highly Experienced</h3>
        <span>We have a great staff of certified and experienced teachers and world class reference guides for best
          quality training solution</span>
      </div>
      <div>
        <img src="./images/quiz.svg" alt="">
        <h3>Question, Quiz & Course</h3>
        <span>We provide standard 35+ courses curated by the CPD (Curriculum & Product Development) team. It includes
          practical projects and helps with illustrations to better understand real-world usage</span>
      </div>
      <div>
        <img src="./images/support.svg" alt="">
        <h3>Dedicated Support</h3>
        <span>We support our students after the course also. Whenever they want they can reach us and ask their
          doubts</span>
      </div>
    </div>
  </section>

  <!-- side section -->

  <side>
    <a class="learn" name="inquiry">Enquire</a>
  </side>
  <aside>
    <a class="learn" name="info1">
      <i class="fa-solid fa-circle-info"></i>
    </a>
    <a href="https://wa.me/c/919084868584">
      <i class="fa-brands fa-square-whatsapp"></i>
    </a>
  </aside>

  <!-- side section close -->

  <!-- number section -->


  <section class="numbers section">
    <div class="container">
      <div>
        <i class="fa-solid fa-graduation-cap"></i>
        <div class="count" data-count="200">0</div>
        Classes <br> Complete
      </div>
      <div>
        <i class="fa-solid fa-book-open-reader"></i>
        <div class="count" data-count="400">0</div>
        Students <br> Enrolled
      </div>
      <div>
        <i class="fa-solid fa-chalkboard-user"></i>
        <div class="count" data-count="35">0</div>
        Certified <br> Courses
      </div>
    </div>
  </section>
  <!-- number section end -->

  <!-- online course section -->


  <section class="section" style="background-color: #f9e4d9; width:100vw;">
    <div class="middle">
      <h1>Want to learn online</h1>
      <p>We also provide online learning you can also enroll with us for online courses</p>
      <p style="padding:1rem; color: #696767">Fill out the form for enquiry of online courses</p>
      <a class="learn" name="onlineteach"
        style="padding:0.5rem; border:1px black; border-radius: 1rem; background-color:#b3aaaa; margin:1rem">Ckick
        Me</a>
    </div>
  </section>
  <!-- online course section end -->


  <!-- explore certificate section -->


  <section class="section">
    <div>
      <h2>Explore certificates</h2>
      <div class="cards">
        <?php
        $sql = "SELECT * from certified";
        $result = mysqli_query($connection, $sql);
        $x = 0;
        while ($row = mysqli_fetch_array($result)) {
          echo '<div class="card">
        <a class="learn" name="' . $row['name'] . '"><img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="" /></a>
          <h5>' . $row['name'] . '</h5>
          <div class="price">
            <span>' . $row['duration'] . ' months</span>
            <!-- $10 -->
          </div>
        </div>';
        }
        ?>
      </div>
    </div>
  </section>


  <!-- explore certicate section close -->

  <section class="section">
    <h2>What people say about us</h2>
    <script src="https://widget.trustmary.com/ve0QnlUGK"></script>
  </section>

  <!-- Contact form starts -->


  <section id="contact" class="section" style="background-color: #ffa371;width:100vw">
    <div class="middle" id="contac">
      <h3 style="font-weight: bold;">Obtaining further information by contacting our experienced staff</h4>
        <p>We're available for 8 hours a day! Contact to require a detailed analysis and assessment of your plan</p>
        <i class="fa fa-phone" style="height: 2rem; width: 2rem;"></i>
        <span style="font-weight: bold;">Reach Out Now!</span>
        <a href="tel:+91 9084868584" style="margin-top: 1rem; margin-bottom: 1rem;">+919084868584</a>
        <button><a href="tel:+91 9084868584" style="font-weight: bold;">Contact Us</a></button>
    </div>
  </section>
  <div>

  </div>
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
      <a href="tel:+91 9084868584"><i class="fa fa-phone"></i> +91 9084868584</a>
      <a href="mailto:cadtech.hrd@gmail.com"><i class="fa-regular fa-envelope"></i>cadtech.hrd@gmail.com</a>
      <h3>Head office</h3>
      <address><i class="fa-solid fa-location-dot"></i>T-4, A- Cluster, near ATM Chowk, Shivalik Nagar, Haridwar
      </address>
      <h3>2nd Branch</h3>
      <address><i class="fa-solid fa-location-dot"></i>105a, near Classic Stationary, Lane 1, Khanna Nagar, Ranipur
        More, Haridwar</address>
      <address style="display:flex; flex-direction: row; margin: auto; justify-content: center;"><a
          href="http://facebook.com/cadtechharidwar"><i class="fa-brands fa-facebook"></i></a>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-linkedin"></i>
        <a href="http://instagram.com/cad_tech_institute/"><i class="fa-brands fa-instagram"></i></a>
      </address>
    </div>
  </footer>

  <!-- cards loop with php to show details of courses -->
  <?php

  $sql = "SELECT * from course";
  $result = mysqli_query($connection, $sql);
  $x = 0;
  while ($row = mysqli_fetch_array($result)) {
    echo '<div class="hidden"  id="' . $row['name'] . '">
    <h1>' . $row['name'] . '</h1>
    <div>
      <span>topics: ' . $row['topicnumber'] . '</span>
      <span><i class="fa-solid fa-hourglass-half"></i>duration: ' . $row['durationfrm'] . '-' . $row['durationto'] . ' days</span>
    </div>
    <h2>description</h2>
    <p>' . $row['description'] . '</p>
    <div>
    <img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="" />
      <ul>
        <h2>topics</h2>';
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
        echo "<li>" . $ar . "</li>";
      }
    }
    echo '</ul>
    </div>
  </div>';
  }
  $sql = "SELECT * from certified";
  $result = mysqli_query($connection, $sql);
  $x = 0;
  while ($row = mysqli_fetch_array($result)) {
    echo '<div class="hidden"  id="' . $row['name'] . '">
    <h1>' . $row['name'] . '</h1>
    <div>
      <span><i class="fa-solid fa-hourglass-half"></i>duration: ' . $row['duration'] . ' months</span>
    </div>
    <h2>description</h2>
    <p>' . $row['description'] . '</p>
    <div>
    <img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="" />
      <ul>
        <h2>topics</h2>';
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
        echo "<li>" . $ar . "</li>";
      }
    }
    echo '</ul>
    </div>
  </div>';
  }

  ?>
  <!-- show student corner,partener,trainer -->
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
      <label for="name">Name</label>
      <input type="text" name="namep" id="name">
      <label for="email">Email</label>
      <input type="email" name="emailp" id="email">
      <label for="mobile">Mobile</label>
      <input type="number" name="mobilep" id="mobile">
      <h3>Proposed location</h3>
      <label for="addline">Address</label>
      <input type="text" name="addlinep" id="addline">

      <label>State <span style="color:red">*</span></label>
      <select class="form-control" name="state" id="stateId" onchange="getCityByState();">
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
    function openPop(e) {
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
      if (slideIndex > slides.length) { slideIndex = 1 }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      setTimeout(showSlides, 4000); // Change image every 2 seconds
    }
  </script>
  <script>
    function getStatesByCountry() {
      var countryId = 101;
      $.post("ajax.php", { getStatesByCountry: 'getStatesByCountry', countryId: countryId }, function (response) {
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
      $.post("ajax.php", { getCityByState: 'getCityByState', stateId: stateId }, function (response) {
        // alert(response);
        var data = response.split('^');
        var cityData = data[1];
        $("#cityDiv").html(cityData);
      });
    }
  </script>
  <script>
    let s = document.getElementById('show')
    s.addEventListener("click", (e) => {
      if (!s.children[0].contains(event.target)) {
        band()
      }
    })
    document.getElementById('cross').addEventListener('click', () => {
      band()
    })
  </script>
</body>