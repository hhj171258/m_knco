<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="format-detectoin" content="telephone=no, email=no, address=no">
<link rel="stylesheet" href="/m_knco/css/reset.css?ver=1.0">
<link rel="stylesheet" href="/m_knco/css/main.css?ver=1.0">
<link rel="stylesheet" href="/m_knco/css/sub.css?ver=1.0">
<link rel="stylesheet" href="/css/fontawesome/all.css?ver=1.0">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;500;700&display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.0/css/swiper.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.0/js/swiper.min.js"></script>
<title>작물보호제 | 경농 모바일</title>
</head>
<body>
<div id="wrap">
	<header id="header"></header>
	<div id="container">
		<div class="subvisual2">
			<div><img src="/m_knco/images/sub2/img_subvisual.jpg" alt=""></div>
			<h2>경농소개</h2>
			<div class="tab">
				<div>
					<div>
						<a href="/m_knco/sub2_1.php#tab1?advt=Y#tab1" class="on">작물보호제</a>
						<a href="#">작물영양제</a>
					</div>	
					<div>
						<a href="#">종자</a>
						<a href="#">관수자재</a>
					</div>
				</div>
			</div>
		</div>
		<div class="protect">
			<ul class="tabmenu">
				<li><input type="button" onclick='location.href="/m_knco/sub2_1.php?advt=Y#tab1"' value='추천제품'></li>
				<li><a href="#tab2">작물별</a></li>
				<li><a href="#tab3">용도별</a></li>
			</ul>
			<!-- 추천제품 -->
			<div class="content"></div>
			<!--// 추천제품 -->
			<!-- 작물별 -->
			<div class="content">
				<form class="filter" action="/m_knco/sub2_1.php#tab2" method="post">
					<div class="filter1">
						<strong><i class="fas fa-leaf"></i> 작물 선택</strong>
						<ul>
							<?php
 								include_once "include/head.inc";

 								$advt = $_REQUEST["advt"];
								$Rsearch2_type1 = $_REQUEST["Rsearch2_type1"];
								$Rsearch3_type1 = $_REQUEST["Rsearch3_type1"];
								$Rusee = $_REQUEST["Rusee"];
								$Rcrop = $_REQUEST["Rcrop"];
								$Rtrgt = $_REQUEST["Rtrgt"];

 								if(isset($_POST["filter_u"]))
 								{
									$usee = $_POST["usee"];
									$search3_type1 = $_POST["search3_type1"];
 								}

 								if(isset($_POST["filter_c"]))
 								{
									$search2_type1 = $_POST["search2_type1"];
									$crop = $_POST["crop"];
									$trgt = $_POST["trgt"];
 								}

								

								if($crop == "A" || $crop == "") echo "<li><input type='radio' name='crop' id='crop_A' checked value='A'><label for='crop_A'>전체</label></li>";
								else echo "<li><input type='radio' name='crop' id='crop_A' value='A'><label for='crop_A'>전체</label></li>";

								$sql = "select distinct(a.code), a.Comm from knco_product_crop a
												left join knco_product_crop_trgt b on a.code = b.crop";
								$result = mysqli_query($db, $sql);
								while ($data = mysqli_fetch_array($result))
								{
									if($crop == $data[0]) echo "<li><input type='radio' name='crop' id='crop_$data[0]' value='$data[0]' checked><label for='crop_$data[0]'>$data[1]</lable></li>";
									else echo "<li><input type='radio' name='crop' id='crop_$data[0]' value='$data[0]'><label for='crop_$data[0]'>$data[1]</lable></li>";
								}
							 ?>
						</ul>
					</div>
					<div class="filter2">
						<strong><i class="fas fa-leaf"></i> 약제 선택</strong>
						<ul>
 							<?php
 								if($search2_type1 == "A" || $search2_type1 == "") echo "<li><input type='radio' name='search2_type1' id='search2_type1_A' checked value='A'><label for='search2_type1_A'>전체</label></li>";
								else echo "<li><input type='radio' name='search2_type1' id='search2_type1_A' value='A'><label for='search2_type1_A'>전체</label></li>";

								$sql = "select distinct(a.type1), b.name from knco_product a
												left join knco_product_type1 b on a.type1 = b.code";
								$result = mysqli_query($db, $sql);
								while ($data = mysqli_fetch_array($result))
								{
									if($search2_type1 == $data[0]) echo "<li><input type='radio' name='search2_type1' id='search2_type1_$data[0]' value='$data[0]' checked><label for='search2_type1_$data[0]'>$data[1]</lable></li>";
									else echo "<li><input type='radio' name='search2_type1' id='search2_type1_$data[0]' value='$data[0]'><label for='search2_type1_$data[0]'>$data[1]</lable></li>";
								}
							 ?>
						</ul>
					</div>
					<div class="filter3">
						<strong><i class="fas fa-leaf"></i> 병해충 선택</strong>
						<ul>
							<?php
								if($trgt == "A" || $trgt == "") echo "<li><input type='radio' name='trgt' id='trgt_A' checked value='A'><label for='trgt_A'>전체</label></li>";
								else  echo "<li><input type='radio' name='trgt' id='trgt_A' value='A'><label for='trgt_A'>전체</label></li>";

								$sql = "select distinct(a.code), a.Comm from knco_product_trgt a
												left join knco_product_crop_trgt b on a.code = b.trgt";
								$result = mysqli_query($db, $sql);
								while ($data = mysqli_fetch_array($result))
								{
									if($trgt == $data[0]) echo "<li><input type='radio' name='trgt' id='trgt_$data[0]' value='$data[0]' checked><label for='trgt_$data[0]'>$data[1]</lable></li>";
									else echo "<li><input type='radio' name='trgt' id='trgt_$data[0]' value='$data[0]'><label for='trgt_$data[0]'>$data[1]</lable></li>";
								}
							 ?>
						</ul>
					</div>
					<button type="submit" name="filter_c"><i class="fas fa-search" ></i> 검색</button>
					<button type="reset">초기화</button>
				</form>
			</div>
			<!--// 작물별 -->
			<!-- 용도별 -->
			<div class="content">
				<form class="filter" action="/m_knco/sub2_1.php#tab3" method="post">
					<div class="filter1">
						<strong><i class="fas fa-leaf"></i> 용도 선택</strong>
						<ul>
							<?php 
								if($usee == "A" || $usee == "") echo "<li><input type='radio' name='usee' value='A' id='usee_A' checked><label for='usee_A'>전체</label></li>";
								else echo "<li><input type='radio' name='usee' value='A' id='usee_A'><label for='usee_A'>전체</label></li>";

								if($usee == "W") echo "<li><input type='radio' name='usee' value='W' id='usee_W' checked><label for='usee_W'>수도용</label></li>";
								else echo "<li><input type='radio' name='usee' value='W' id='usee_W'><label for='usee_W'>수도용</label></li>";

								if($usee == "G") echo "<li><input type='radio' name='usee' value='G' id='usee_G' checked><label for='usee_G'>원예용</label></li>";
								else echo "<li><input type='radio' name='usee' value='G' id='usee_G'><label for='usee_G'>원예용</label></li>";
							 ?>
						</ul>
					</div>
					<div class="filter2">
						<strong><i class="fas fa-leaf"></i> 약제 선택</strong>
						<ul>
 							<?php
 								if($Rusee <> "")
 								{
 									$sql = "select distinct(a.type1), b.name from knco_product a
												left join knco_product_type1 b on a.type1 = b.code
												where a.usee = '$Rusee'";
 								}
								else
								{	
									$sql = "select distinct(a.type1), b.name from knco_product a
												left join knco_product_type1 b on a.type1 = b.code";
								}
								$result = mysqli_query($db, $sql);
								while ($data = mysqli_fetch_array($result))
								{
									if($search3_type1 == $data[0]) echo "<li><input type='radio' name='search3_type1' id='search3_type1_$data[0]' value='$data[0]' checked><label for='search3_type1_$data[0]'>$data[1]</lable></li>";
									else echo "<li><input type='radio' name='search3_type1' id='search3_type1_$data[0]' value='$data[0]'><label for='search3_type1_$data[0]'>$data[1]</lable></li>";
								}
							 ?>
						</ul>
					</div>
					<button type="submit" name="filter_u"><i class="fas fa-search"></i> 검색</button>
					<button type="reset">초기화</button>
				</form>
			</div>
			<!--// 용도별 -->
			<u>검색 내 결과 <span></span>개</u>
			<form>
				<input type="text">
				<button><i class="fas fa-search"></i></button>
			</form>		
			<ol>
				<?php
					$sql = "select  a.code, a.name, a.desc2, a.usee, b.name from knco_product a
							left join knco_product_type1 b on a.type1 = b.code";

					if($advt == "Y"){ $sql = $sql . " where a.advt = 'Y'";}

					if($usee == "A" && $search3_type1 <> "A" ) $sql = $sql . " where a.type1 = '$search3_type1'";
					if($usee <> "A" && $search3_type1 == "A") $sql = $sql . " where a.usee = '$usee'";
					if($usee <> "A" && $usee <> "" && $search3_type1 <> "A" && $search3_type1 <> "") $sql = $sql . " where a.usee = '$usee' and a.type1 = '$search3_type1'";
					
					if($search2_type1 == "A" && $crop <> "A" && $trgt <> "A") $sql = "select distinct(a.code), a.name, a.desc2, a.usee, c.name from knco_product_crop_trgt b
																						left join knco_product a on a.code = b.code
																						left join knco_product_type1 c on a.type1 = c.code
   																						where b.crop = '$crop' and b.trgt = '$trgt'";
   					if($search2_type1 <> "A" && $crop == "A" && $trgt <> "A") $sql = "select distinct(a.code), a.name, a.desc2, a.usee, c.name from knco_product_crop_trgt b
																						left join knco_product a on a.code = b.code
																						left join knco_product_type1 c on a.type1 = c.code
   																						where a.type1 ='$search2_type1' and b.trgt = '$trgt'";
   					if($search2_type1 <> "A" && $crop <> "A" && $trgt == "A") $sql = "select distinct(a.code), a.name, a.desc2, a.usee, c.name from knco_product_crop_trgt b
																						left join knco_product a on a.code = b.code
																						left join knco_product_type1 c on a.type1 = c.code
   																						where a.type1 ='$search2_type1' and b.crop = '$crop'";
   					if($search2_type1 == "A" && $crop == "A" && $trgt <> "A") $sql = "select distinct(a.code), a.name, a.desc2, a.usee, c.name from knco_product_crop_trgt b
																						left join knco_product a on a.code = b.code
																						left join knco_product_type1 c on a.type1 = c.code
   																						where b.trgt = '$trgt'";
   					if($search2_type1 == "A" && $crop <> "A" && $trgt == "A") $sql = "select distinct(a.code), a.name, a.desc2, a.usee, c.name from knco_product_crop_trgt b
																						left join knco_product a on a.code = b.code
																						left join knco_product_type1 c on a.type1 = c.code
   																						where b.crop = '$crop'";
   					if($search2_type1 <> "A" && $crop == "A" && $trgt == "A") $sql = $sql . " where a.type1 = '$search2_type1'";
					if($search2_type1 <> "" && $search2_type1 <> "A" && $crop <> "" && $crop <> "A" && $trgt <> "" && $trgt <> "A") $sql = "select distinct(a.code), a.name, a.desc2, a.usee, c.name from knco_product_crop_trgt b
																																					left join knco_product a on a.code = b.code
																																					left join knco_product_type1 c on a.type1 = c.code
   																																					where b.crop = '$crop' and b.trgt = '$trgt' and a.type1 ='$search2_type1'";
					$sql = $sql . " order by a.code";
					$result = mysqli_query($db, $sql);
					while ($data = mysqli_fetch_array($result))
					{
						if($data[3] == "G") $data[3] = "원예용";
						else $data[3] = "수도용";
						if($data[4] == "비선택성 제초제") $data[4] = "제초제";
						echo "<li>";
						echo "<div><img src='/m_knco/images/sub2/img_product_$data[0].png' alt=''></div>";
						echo "<a href='#'>$data[1]</a>";
						echo "<small>$data[2]</small>";
						echo "<span>$data[3] $data[4]</span>";
					}
				 ?>
			</ol>
			<span class="more">더보기</span>
		</div>
		<a href="#top"></a>
	</div>
	<footer id="footer"></footer>
</div>
<script src="/m_knco/script/sub.js"></script>
</body>
<script>
	$('input[type="radio"]').on('click', function(){
		var name = 'R' + this.name;
		var value = this.value;
		var link  = document.location.href.slice(0, -5);
		var hash  = document.location.href.slice(-5);

		$.ajax({
			url: document.location.href,

		}); 
	});
</script>
</html>