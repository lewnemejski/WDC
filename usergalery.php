<?php
	session_start();
	require "page.php";
	require_once 'business.php';
	if(isset($_SESSION['user'])==false)
		$_SESSION['user']='0';
?>	
			<h1>Galeria zdjęć użytkowników</h1>
			<?php
					if (isset($_POST["submit"]))
					{
						deleteImage($_POST['number']);
						unset($_POST['number']);
					}
					//$page = isset($_GET['page'])?(int)$_GET['page']:1;
					//$pageSize = 5;
					//$prev = $page - 1;
					//next = $page + 1;
					/*$options = [
						'skip' => ($page - 1) * $pageSize,
						'limit' => $pageSize
					];	
					$images = galeryPage($options);
					$number = numberOfImages();*/
					$images=getTable("images");
					echo '<div style="position: relative; text-align:center;">';
					foreach($images as $image)
					{ 
							if($image['private']==true && $image['author']==$_SESSION['user'])
							{
								echo "<figure style='display: inline-block;'><a href='uploads/watermarks/water_".$image['source']."' target='blank'><img src='uploads/".$image['source']."'/></a><br/>";
								echo "<figcaption>Autor: ".$image['author']."<br/>Tytuł: ".$image['title']."<br/>Prywatne: Tak<br/>"; if(($_SESSION['authorization'] == 3 && $image['auth'] < 3) || $_SESSION['authorization'] == 4){ echo "</br><form method='post'><input type='text' value='{$image['id']}' name='number' hidden/><input type='submit' value='Delete' name='submit' /></form>";} echo "</figcaption></figure>";
							}
							else if($image['private']==true)
							{
								/*$options = [
									'skip' => ($page - 1) * $pageSize+1,
									'limit' => $pageSize
									];*/
							}
							else
							{
								echo "<figure style='display: inline-block;'><a href='uploads/watermarks/water_".$image['source']."'target='blank'><img src='uploads/".$image['source']."'/></a><br/>";
								echo "<figcaption>Autor: ".$image['author']."<br/>Tytuł: ".$image['title']."<br/>Prywatne: Tak<br/>"; if(($_SESSION['authorization'] == 3 && $image['auth'] < 3) || $_SESSION['authorization'] == 4){ echo "</br><form method='post'><input type='text' value='{$image['id']}' name='number' hidden/>
								<input type='submit' value='Delete' name='submit' /></form>";} echo "</figcaption></figure>";
							}
					}
					echo '<br/>';
					/*if($page>1)
					{  
						echo '<a style="font-size: 20px; font-weight:bold; text-decoration: none; color: #ff1744;" href="usergalery.php?page='.$prev.'">Poprzednia</a>';    
					}
					if($page*$pageSize < $number)
					{  
						echo '<a style="font-size: 20px; font-weight:bold; text-decoration: none; color: #ff1744;" href="usergalery.php?page='.$next.'">Następna</a>';
					}*/
					echo "</div>";
			?>
		
	</div>
		<div id="footer">
			<footer>
				Copyright &copy; Kacper Wszeborowski s189477
			</footer>
		</div>

	</div>
	
</body>

</html>