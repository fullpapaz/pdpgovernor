
<?php
    $pagetitle = 'Documents | PDP Governors Forum';
    $currentPage = 'documents';

    include('php/header.php');
?>
<?php
  include 'php/config.php';

  $conn = new mysqli($servername, $username, $password, $db_name);
  $page_name = "Our Documents";
  $sql = "SELECT * FROM documents WHERE type>3 ORDER BY date DESC";

  if (isset($_GET["type"])) {
    $doc_type = $_GET["type"];
    if ($doc_type == "federal") {
      $page_name = "Federal Documents";
      $sql = "SELECT * FROM documents WHERE type=4 ORDER BY date DESC";
    }
    if ($doc_type == "state") {
      $page_name = "State Documents";
      $sql = "SELECT * FROM documents WHERE type=5 ORDER BY date DESC";
    }
    if ($doc_type == "publication") {
      $page_name = "Publication Documents";
      $sql = "SELECT * FROM documents WHERE type=6 ORDER BY date DESC";
    }
  }


  $result = $conn -> query($sql);
  $data_table = "";
  while($row = $result -> fetch_assoc()) {
    $date = date("Y-m-d", $row["date"]);
    $data_table .= '<div class="col-lg-4 col-md-6 team-item">
      <h4 class="title"><a href="' .$row["path"] . '"><i class="fas fa-file-alt"></i> ' .$row["name"] . '</a></h4><a href="' .$row["path"] . '" class="btn btn-yellow" style="margin-top: 10px">Download <i class="fas fa-cloud-download-alt"></i></a>
    <p>' .$date . '</p></div>';
  }
  $conn -> close;
?>

	<!--=================== PAGE-TITLE ===================-->
	<div class="page-title" style="background-image: url(assets/img/Blur.jpg);">
		<div class="container">
			<h1 class="title-line-left">Documents</h1>
			<div class="breadcrumbs">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li>Documents</li>
				</ul>
			</div>
		</div>
	</div>
	<!--================= PAGE-TITLE END =================-->

  <!--=================== S-OUR-TEAM ===================-->
  <section class="s-our-team about-team speakers-our-team" style="padding-top: 50px">
    <div class="container">
      <h2 class="title-line" style="margin-bottom: 15px"><?php echo $page_name; ?></h2>
      <div class="row team-cover justify-content-center">
        <?php
          echo $data_table;
        ?>
      </div>
    </div>
  </section>
  <!--================= S-OUR-TEAM END =================-->

<section>
  <div class="container" style="padding-top: 50px">
    <div class="row">
      <div class="col-12 col-md-4 about-info">
        <div class="col-lg-12 col-md-12">
          <h2 class="title-line-left">OUR STATES</h2>
          <a href="states.php" class="btn btn-yellow">EXPLORE STATES</a>
        </div>
        <div class="col-lg-12 col-md-12">
          <button style="color: white; background: #88a4bc; padding: 10px 40px">OTHER STATES</button>
        </div>
        <div class="col-lg-12 col-md-12">
          <button style="color: white; background: #07923c; padding: 10px 40px">PDP STATES</button>
        </div>
      </div>
      <div class="col-12 col-md-8" id="map" align="center" style="margin-top: 10px">
      </div>
      <style>
        tspan {
          display: none
        }
      </style>
    </div>
  </div>
</section>


    <?php


  include('php/footer.php');
?>
