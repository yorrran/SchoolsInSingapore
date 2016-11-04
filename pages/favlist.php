<?php include_once('header.php') ?>
<!DOCTYPE html>

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


	$fav_list = get_fav_list("user1");
	if (!$fav_list) {
		die('Invalid query: ' . mysql_error());
	}
/*
	if(isset($_POST['unfav'])){
		$school_name = $_POST['unfav'];
		remove_from_fav_list('user1',$school_name);
		echo $school_name.' has been successfully removed from the favourite list';
		//header('Location: favlist.php');
	}
*/
	//while($school = $result->fetch_assoc()){
	foreach ($fav_list as $schoolname){

		echo '<form action="addToFav.php" method="POST" ><button name="unfavorite" class="fav" value="'.$schoolname.'" ><i style="font-size:30px; color: #FFD700; " class="fa">&#xf005;</i></button></form>';

		if(!in_array($schoolname,$_SESSION['clist'])){
			echo '<form action="addToCompare.php" method="POST" ><button name="compare" class="compare" value="'.$schoolname.'" onclick="toggle()">add to Comparison</button></form>';
		}else if(in_array($schoolname,$_SESSION['clist'])){
			echo '<form action="addToCompare.php" method="POST" ><button name="remove" class="compare" value="'.$schoolname.'" onclick="toggle()">remove from Comparison</button></form>';
		}
		
		echo '<button class="accordion" >';echo $schoolname;echo'</button>';
		echo '<div class="panel">';
		$results = searchSchool($schoolname);
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
		/*function toggle(){
			if(document.getElementById("cbutton").contains(document.getElementById("add"))){
				document.getElementById("compare").innerHTML="<button name="compare" id="remove" class="compare" value="<?php echo $row['schoolname']?>'" onclick="toggle()">remove from Comparison</button>";
			}else if(document.getElementById("cbutton").contains(document.getElementById("remove"))){
				document.getElementById("compare").innerHTML="<button name="compare" id="add" class="compare" value="<?php echo $row['schoolname']?>'" onclick="toggle()">add to Comparison</button>";
			}
		}*/	

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