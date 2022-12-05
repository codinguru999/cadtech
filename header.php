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
                            <span class='row'>Courses
                                <label for="n1"><i class="fa-solid fa-chevron-down"></i></label></span>
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