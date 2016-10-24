<?php include('header.php') ?>
<?php include('../backend/searchManager.php') ?>
<!DOCTYPE html>
<?php
/*
    $cps_name="Canberra Primary School";
    $cps_desc = "<p>Canberra Primary School was established in January 2000. The school takes the name of the old Canberra School which closed down in 1988.</p>
    <p>The school initially functioned at Wellington Primary School as its building at 21 Admiralty Drive was not ready. The school moved into its new premises in November 2000. It caters to the educational needs of pupil population in the new Sembawang Estate.</p>
    <p>Currently, the school has an Enrollment of 1650 pupils functioning as a partial-single session.</p>";

    $jps_name="Junyuan Primary School";
    $jps_desc = "<p>Junyuan Primary School is an English-medium government school. Our school adopted the name from the Choon Guan Primary School that was renamed Junyuan Primary School in Jun 1986 and closed in Dec 1986. The name Junyuan Primary School was subsequently revived and opened in the current site at 2 Tampines Street 91 in January 1988. The school was officially opened on 2 September 1989 by Mr Yatiman Yusof, the former Member of Parliament for Tampines GRC. When the school started, it functioned as a single session school with 20 classes, an enrolment of 620 and a teaching staff of 29. The school has since grown in pupil enrolment and teaching strength. With its good academic and non-academic track records, it has established itself as one of the choice schools in Tampines. </p>";

    $naps_name="Ngee Ann Primary School";
    $naps_desc="<p>Ngee Ann Primary School has its roots in 1940. That year, the Ngee Ann Kongsi's Board of Directors which comprised the late Mr Lee Wee Nam, the late Mr Yeo Chan Boon, the late Mr Lim Kim Seng and a few other members set up a girls' school in a bungalow owned by a Kongsi member at River Valley Road, opposite what is now the AA building. It was named Ngee Ann Girls' School, the first Chinese girls' school in Singapore. In 1967, it started accepting male pupils and refocused its activities to become a primary school.</p>";

    $shps_name="St. Hilda's Primary School";
    $shps_desc="<p>St Hilda's Primary School (SHPS), established in 1934, has had a long history since Archdeacon Graham White founded the school on the basis of exposing more children to education so that they might have a brighter future ahead.</p>";

    $tps_name="Tampines Primary School";
    $tps_desc = "<p>Tampines Primary School embraces the core belief that every pupil can learn and excel. In addition to the emphasis on holistic education, the school recognises the need to be responsive to the changing needs of education.</p>
    <p>In 1999, the school's crest was changed to a tapered 'T' to project its forward looking vision as a School of Distinction and strong endorsement in the use of ICT to support teaching and learning. By 2000, the school had acquired 280 computers to provide better support in teaching and learning - a sharp contrast to the 20 computers that were acquired in 1991.</p>";
*/
    ?>
<html>
<head>
<META NAME="GENERATOR" Content="Microsoft Visual Studio">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<TITLE>Favorite List</TITLE>
    <style>
        button.accordion{
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width:100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
			border: 2px solid black;

        }


        button.fav {
			background-color: #eee;
            color: #444;
            cursor: pointer;
            border: none;
            outline: none;
            transition: 0.4s;
            left:80%;
            display: inline-block;
            position:absolute;

        }

		button.remove {
			background-color: #eee;
            color: #444;
            cursor: pointer;
            border: none;
            outline: none;
            transition: 0.4s;
            left:85%;
            display: inline-block;
            position:absolute;

        }

        button.compare{
            background-color: #eee;
            color: #444;
            cursor: pointer;
            border: none;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
            left:85%;
            display: inline-block;
            position:absolute;

        }

        button.accordion.active, button.accordion:hover {
            background-color: #eee;
        }

        div.panel {
            padding: 0 18px;
            background-color: white;
            max-height: 0;
            overflow: hidden;
            transition: 0.6s ease-in-out;
            opacity: 0;
        }

            div.panel.show {
                opacity: 1;
                max-height: 500px;
            }

			article header ul .gk-comment:before {
    content: '\f086';
    font-family: FontAwesome;
        /* more styles for the icon, like color, font-size, position, etc. */
}
    </style>
</head>
<BODY>
    <h2>Favorite List</h2>

<?php


	$result = get_fav_list("user1");
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}

	if(isset($_POST['unfav'])){
		$school_name = $_POST['unfav'];
		remove_from_fav_list('user1',$school_name);
		echo $school_name.' has been successfully removed from the favourite list';
		header('Location: favlist.php');
	}

	while($row = $result->fetch_assoc()){
		echo '<form name="myForm" action="" method="POST">';
		echo '<button name="unfav" value="'.$row['schoolname'].'" class="fav" onclick="document.getElementById("myForm").submit();"><i style="font-size:30px; color: #FFD700; " class="fa">&#xf005;</i></button>';
		echo '</form>';
		echo '<form action="addToFav.php" method="POST" ><button name="unfavorite" class="remove" value="'.$row['schoolname'].'" >Remove</button></form>';
		echo '<button class="accordion" >';echo $row['schoolname'];echo'</button>';
		echo '<div class="panel">';
		$results = searchSchool($row['schoolname']);
		foreach ($results as $school){
			echo '<br />';
			echo 'Address: '.$school['school_location'].'<br />'.'<br />';
			echo 'Email: '.$school['school_email'].'<br />'.'<br />';
			echo 'School Code: '.$school['school_code'].'<br />'.'<br />'; //replace with description if have
		}
		echo '</div>'; //description
	}
?>

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].onclick = function accordion () {
                this.classList.toggle("active");
                this.nextElementSibling.classList.toggle("show");
                accordion();
            }
        }

    </script>
<?php include_once('../footer.php') ?>

</BODY>
</html>