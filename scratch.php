if(myqli_num_rows($res)>0) {
					while($row = mysqli_fetch_assoc($res)) {
						$id = $row['id'];
						$title = $row['title'];
						$content = $row['content'];
						$date = $row['date'];

						$admin = "<div>
									<a href = 'del_post.php?pid=$id'>
									Delete
									</a>


									</div>";
						//alter to prevent
						$output = $content;

						$posts .= "<div>
										<h2>
											<a href ='display_post.php?pid=$id'>$title</a>
										</h2>
											<h3>$date</h3>
											<p>$content</p>
											$admin
								  </div>"
					} echo $posts;
				} 
				else{
					echo "there are no posts to display at this time";
				}