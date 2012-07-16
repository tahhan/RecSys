<div class="left">
   <h2>Login As <?php echo ucfirst($data['user_type']); ?></h2>
   <form action="<?php echo $data['APP_URL']; ?>user/login_submit/<?php echo $data['user_type']; ?>" method="post" id="login_form">
      <div class="form-element">
         <label for="email">Email : </label>
         <input type="text" name="user[email]" id="email" class="validate[required,custom[email]]" />
      </div>

      <div class="form-element">
         <label for="password">Password : </label>
         <input type="password" name="user[password]" id="login_password" class="validate[required]"/>
      </div>

      <div class="form-element">
         <input type="submit" value="submit" class="button" />
      </div>
   </form>
</div>
<?php if($data['user_type']=='employer'): ?>
<div class="right">
   <h2>Create Company Profile</h2>
   <form action="<?php echo $data['APP_URL']; ?>user/signup_submit/employer" method="post" id="signup_form" >
      <div class="form-element">
         <label for="company_name">Company Name : </label>
         <input type="text" name="company[company_name]" id="company_name" class="validate[required]" />
      </div>

      <div class="form-element">
         <label for="industry_id">Type of industry : </label>
         <select name="company[industry_id]" id="industry_id" class="validate[required]" >
            <option value="">Select Industry</option>
            <?php $doo_view_basic_1308079277 = $data['industries'];
if (!empty($doo_view_basic_1308079277)):
foreach($doo_view_basic_1308079277 as $data['industry']):
?>
            <option value="<?php echo $data['industry']->id; ?>"><?php echo $data['industry']->industry_name; ?></option>
            <?php endforeach;
 endif; ?>
         </select>
      </div>

      <div class="form-element">
         <label for="no_employees">Number of employees : </label>
         <input type="text" name="company[no_employees]" id="no_employees" class="validate[required,custom[integer]]" />
      </div>

      <div class="form-element">
         <label for="country">Country : </label>
         <select name="company[country_id]" id="country" class="validate[required]" >
            <option value="">Select Country</option>
            <?php $doo_view_basic_1308079278 = $data['countries'];
if (!empty($doo_view_basic_1308079278)):
foreach($doo_view_basic_1308079278 as $data['country']):
?>
            <option value="<?php echo $data['country']->id; ?>"><?php echo $data['country']->country_name; ?></option>
            <?php endforeach;
 endif; ?>
         </select>
      </div>

      <div class="form-element">
         <label for="contact_person">Contact Person : </label>
         <input type="text" name="employee[name]" id="contact_person" class="validate[required,custom[onlyLetterSp]]" />
      </div>

      <div class="form-element">
         <label for="website">Website : </label>
         <input type="text" name="company[website]" id="website" class="validate[required,custom[url]]" />
      </div>

      <div class="form-element">
         <label for="hear_from">How did You Hear About Us ? </label>
         <select name="company[hear_from]" id="hear_from" class="validate[required]">
            <option value="">Select Please</option>
            <option value="friend or collage">Friend or collage</option>
            <option value="internet">Internet</option>
            <option value="magazine">Magazine</option>
            <option value="newspaper">Newspaper</option>
            <option value="radio">Radio</option>
            <option value="seminar or job fair">Seminar or job fair</option>
            <option value="sales call or visite">Sales call or visite</option>
            <option value="other">Other</option>
         </select>
      </div>

      <div class="form-element">
         <label for="phone_number">Phone Number : </label>
         <input type="text" name="employee[phone_number]" id="phone_number" class="validate[required,custom[phone]]" />
      </div>

      <div class="form-element">
         <label for="email">Email : </label>
         <input type="text" name="employee[email]" id="email" class="validate[required,custom[email]]" />
      </div>

      <div class="form-element">
         <label for="password">Password : </label>
         <input type="password" name="employee[password]" id="password" class="validate[required]" />
      </div>

      <div class="form-element">
         <label for="cpassword">Confirm Password : </label>
         <input type="password" name="cpassword" id="cpassword" class="validate[required,equals[password]]" />
      </div>

      <div class="form-element">
         <input type="submit" value="Sign Up" class="button"/>
      </div>
   </form>
</div>
<?php else: ?>
<div class="right">
   <h2>Job Seeker Signup</h2>

   <form action="<?php echo $data['APP_URL']; ?>user/signup_submit/seeker" enctype="multipart/form-data" method="post" id="signup_form">
      <div class="form-element">
         <label for="email">Email</label>
         <input type="text" name="user[email]" id="email" class="validate[required,custom[email]]" />
      </div>

      <div class="form-element">
         <label for="password">Password</label>
         <input type="password" name="user[password]" id="password" class="validate[required]" />
      </div>

      <div class="form-element">
         <label for="cpassword">Confirm Password</label>
         <input type="password" name="cpassword" id="cpassword" class="validate[required,equals[password]]" />
      </div>

      <div class="form-element">
         <label for="file">upload your CV</label>
         <input type="file" name="file" id="file"  accept="application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.oasis.opendocument.text, text/plain" />
      </div>

      <div class="form-element">
         <input type="submit" value="Signup" class="button" />
      </div>

   </form>
</div>
<?php endif; ?>
<div class="clear">&nbsp;</div>