 

 <form id='demoform-1' class='store-data list-block' action='facebooksign.php' method='POST'>
 		<?php	echo"<img src='$image' width='75%' height='75%' /></br><p></p>";

 $result = explode(' ',$name);
 array_shift($result);
	$value0 = $result[0];
   $value1 = $result[1]; 
 
   $uu= $value0.$value1;
     echo" <ul>
        <li>
          <div class='item-content'>
            <div class='item-media'><i class='icon material-icons'>person_outline</i></div>
            <div class='item-inner'> 
              <div class='item-title label'>Name</div>
              <div class='item-input'>
                <input type='text' disabled='disabled'  
				value='$name'
				placeholder='Your name' name='name'/>
              </div>
            </div>
          </div>
		            <div class='item-content'>
            <div class='item-media'><i class='icon material-icons'>person_outline</i></div>
            <div class='item-inner'> 
              <div class='item-title label'>Username</div>
              <div class='item-input'>
                <input type='text' value='$uu' placeholder='Username' name='username'/>
              </div>
            </div>
          </div>
        </li>
          <li>
          <div class='item-content'>
            <div class='item-media'><i class='icon material-icons'>call</i></div>
            <div class='item-inner'> 
              <div class='item-title label'>Phone</div>
              <div class='item-input'>
                <input type='tel' placeholder='Phone' value='$email' name='email'/>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class='item-content'>
            <div class='item-media'><i class='icon material-icons'>lock_outline</i></div>
            <div class='item-inner'> 
              <div class='item-title label'>Password</div>
              <div class='item-input'>
                <input type='password' placeholder='Password' name='password'/>
              </div>
            </div>
          </div>
        </li>
      </ul>
	       <div class='content-block'>";
		   
		   ?>
		 	<?php	
	echo"	<input type='hidden' name='name' value='$name'>
					<input type='hidden' name='username' value='$uu'>
					<input type='hidden' name='id' value='$id'>
					<input type='hidden' name='token' value='$secrettoken'>
					<input type='hidden' name='mail' value='$mail'>
					<input name='image' type='hidden' value='$image' />		";

			$strings = ",";
		$u = array('pink','teal', 'blue','#0c56ac');

		$well = $u[rand(0,4)];

    echo" <p class='buttons-row'>	<input type='submit' class='button button-fill ' name='btn' value='Join' style='background-color:$well' ></p>";
	  
	   ?>
    </div>
	  
    </form>