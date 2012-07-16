<h2>Assign Department</h2>
<form action="<?php echo $data['APP_URL']; ?>employer/assign_dept_submit" method="post">
   <div id="dept_list">
      <div id="dept" class="element">
         <div class="form-element">
            <label for="department_name">Department Name</label>
            <input type="text" name="department[0][name]" class="department_name" />
         </div>

         <div class="form-element">
            <label for="business_partner">Business Partner</label>
            <input type="text" name="department[0][employee][name]" class="business_partner" />
         </div>

         <div class="form-element">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="department[0][employee][phone_number]" class="phone_number" />
         </div>

         <div class="form-element">
            <label for="email">Email</label>
            <input type="text" name="department[0][employee][email]" class="email" />
         </div>

         <div class="form-element">
            <label for="password">Password</label>
            <input type="password" name="department[0][employee][password]" class="password" />
         </div>

         <div class="form-element">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="department[0][employee][confirm_password]" class="confirm_password" />
         </div>
      </div>
   </div>
   <a href="#0" onclick="addDept();" class="button">Add More</a>
   <div class="form-element">
      <input type="submit" value="Save" class="button"/>
   </div>

</form>