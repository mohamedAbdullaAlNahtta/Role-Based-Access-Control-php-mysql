<?php

echo "";


?>

<html>
    <head>
        

    </head>
    <body>
        <div>
        <nav class="sidebar-nav">
				<ul id="sidebarnav">
					<!-- <li class="nav-small-cap">Softwar Development Team v.01</li> -->

					<!-- <li class="nav-devider" style="margin:5px 0px 0px 0px"></li> -->
					<li class="nav-small-cap">Arabicss Managed Call Center </li>
					<!-- <li class="active"> -->
					<li>
						<a class="has-arrow" href="#" aria-expanded="true"><span class="hide-menu"><i class="mdi mdi-chart-areaspline"></i>Real Time Reports</span></a>
						<ul aria-expanded="true" class="collapse">
							<li>
								<a href="monitoring_login_status_real_time.php">Agent Real Time</a>
							</li>
                            <li>
                            <a href="0004_inbound_calls.php">Queue Real time</a>
                            </li>
						</ul>
					</li>
					<li>
						<a class="has-arrow" href="#" aria-expanded="true"><span class="hide-menu"><i class="mdi mdi-chart-areaspline"></i>Historical Reports</span></a>
						<ul aria-expanded="true" class="collapse">
							<li>
								<a href="index?module=Outbound-Calls">Outbound calls</a>
							</li>
						</ul>
					</li>

					<li>
						<a class="has-arrow" href="#" aria-expanded="true"><span class="hide-menu"><i class="mdi mdi-audiobook"></i>Call Recording</span></a>
						<ul aria-expanded="true" class="collapse">
							<li>
								<a href="index?module=Listen-Outbound-Calls">Listen-Outbound Calls</a>
							</li>
						</ul>
					</li>
					<li>
						<a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-calendar-text"></i><span class="hide-menu">Bills</span></a>
						<ul aria-expanded="false" class="collapse">
							<li><a href="#">Outbound</a></li>
							<li><a href="#">Monthly Bill</a></li>
						</ul>
					</li>
                    <li>
						<a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-calendar-text"></i><span class="hide-menu">Bills</span></a>
						<ul aria-expanded="false" class="collapse">
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="true"><span class="hide-menu"><i class="mdi mdi-chart-areaspline"></i>Real Time Reports</span></a>
                                <ul aria-expanded="true" class="collapse">
                                    <li>
                                        <a href="monitoring_login_status_real_time.php">Agent Real Time</a>
                                    </li>
                                    <li>
                                    <a href="0004_inbound_calls.php">Queue Real time</a>
                                    </li>
                                </ul>
                            </li>
							<li><a href="#">Monthly Bill</a></li>
						</ul>
					</li>

                    <?php 

                    // $user_group = new UserGroup();
                    // $user_pages = $user_group->get_pages();
                    // // var_dump($user_pages);
                    // while($row = $user_pages->fetch_assoc()) {
                    // 	echo "<li><a class='has-arrow' aria-expanded='true'>".$row["groupName"]."</a>
                    // 	<ul aria-expanded='true' class='collapse'>
                    // 	<li><a href='index?module=".$row["pageName"]."'>".$row["pageName"]."</a></li>"."</ul></li>";
                    //   }


                    ?>
					

				</ul>
			</nav>
        </div>
    </body>
</html>