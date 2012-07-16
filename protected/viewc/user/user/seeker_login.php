<h1>Login As <?php echo $data['type']; ?></h1>

<form action="<?php echo $data['APP_URL']; ?>user/login_submit/{{type}]">
   <div class="form-element">
      <label for="email">Email</label>
      <input type="text" name="user[email]" id="email" />
   </div>

   <div class="form-element">
      <label for="password">Password</label>
      <input type="password" name="user[password]" id="password" />
   </div>

   <div class="form-element">
      <input type="submit" value="submit" />
   </div>


</form>