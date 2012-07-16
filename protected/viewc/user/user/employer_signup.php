<h2>Create Company Profile</h2>
<form action="<?php echo $data['APP_URL']; ?>user/signup_submit/employer" method="post">
    <div class="form-element">
        <label for="company_name">Company Name:</label>
        <input type="text" name="company[company_name]" id="company_name" />
    </div>

    <div class="form-element">
        <label for="industry_id">Type of industry</label>
        <select name="company[industry_id]" id="industry_id" >
            <option value="">Select Industry</option>
            <?php $doo_view_basic_1307714447 = $data['industries'];
if (!empty($doo_view_basic_1307714447)):
foreach($doo_view_basic_1307714447 as $data['industry']):
?>
            <option value="<?php echo $data['industry']->id; ?>"><?php echo $data['industry']->industry_name; ?></option>
            <?php endforeach;
 endif; ?>
        </select>
    </div>

    <div class="form-element">
        <label for="no_employees">Number of employees</label>
        <input type="text" name="company[no_employees]" id="no_employees" />
    </div>

    <div class="form-element">
        <label for="country">Country</label>
        <select name="company[country_id]" id="country">
            <option>Select Country</option>
            <?php $doo_view_basic_1307714448 = $data['countries'];
if (!empty($doo_view_basic_1307714448)):
foreach($doo_view_basic_1307714448 as $data['country']):
?>
            <option value="<?php echo $data['country']->id; ?>"><?php echo $data['country']->country_name; ?></option>
            <?php endforeach;
 endif; ?>
        </select>
    </div>

    <div class="form-element">
        <label for="contact_person">Contact Person</label>
        <input type="text" name="employee[name]" id="contact_person" />
    </div>

    <div class="form-element">
        <label for="website">Website</label>
        <input type="text" name="company[website]" id="website" />
    </div>

    <div class="form-element">
        <label for="hear_from">How did you hear about us?</label>
        <select name="company[hear_from]" id="hear_from">
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
        <label for="phone_number">Phone Number</label>
        <input type="text" name="employee[phone_number]" id="phone_number" />
    </div>
    
     <div class="form-element">
        <label for="email">Email</label>
        <input type="text" name="employee[email]" id="email" />
    </div>
    
     <div class="form-element">
        <label for="password">Password</label>
        <input type="password" name="employee[password]" id="password" />
    </div>
    
    <div class="form-element">
        <input type="submit" value="Sign Up"/>
    </div>
</form>