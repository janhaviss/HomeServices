<div class="sidebar">
  
        <h4>SoobinSolutions</h4>
    <ul>
        <?php
        $sidebarLink = array(
          'Dashboard' => 'dashboard',
          'Profile' => 'profile',
          'Bookings' => 'bookings',
          'Customer Support'=> 'customer',
        );

        foreach ($sidebarLink as $linkName => $fileName) {
            // Font-awesome class names for different icons (assuming you're using font-awesome 6)
            $iconClasses = array(
                'Dashboard' => 'fas fa-tachometer-alt',
                'Profile' => 'fas fa-user',
                'Bookings' => 'fa-solid fa-calendar-check',
                'Customer Support'=> 'fa fa-phone' 
            );

            echo '<li><a href="#"  ';
            echo 'onclick="loadContent(\'' . $fileName . '\')">';
            echo '<i class="' . $iconClasses[$linkName] . ' m-2 " style="color: #f2f2f2;" ></i>'; // Echo the icon using the specified class
            echo $linkName;
            echo '</a></li>';
        }
        ?>

           <li><a href="logout.php">
            <i class="fa-solid fa-arrow-right-from-bracket" style="color: #f2f2f2f2;"></i>
            <span>Logout</span></a>
            </li>
    </ul>
</div>
