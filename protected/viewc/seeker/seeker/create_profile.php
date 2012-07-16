<h2>Create Profile</h2>
<form action="<?php echo $data['APP_URL']; ?>seeker/create_profile_submit" method="post" id="profile_add_form">
   <fieldset>
      <legend>Personal Information</legend>
      <div class="form-element">
         <label for="name">Full Name</label>
         <input type="text" name="seeker[full_name]" id="name" class="validate[required]" />
      </div>

      <div class="form-element">
         <label for="telephone">Phone Number</label>
         <input type="text" name="seeker[telephone]" id="telephone" class="validate[required,custom[phone]]" />
      </div>

      <div class="form-element">
         <label for="DOB">DOB</label>
         <input type="text" name="date" id="DOB" class="datepicker" autocomplete="off" class="validate[required]" />
         <input type="hidden" name="seeker[DOB]" id="actualDate">
      </div>

      <div class="form-element">
         <label for="gender">Gender</label>
         <select name="seeker[gender]" id="gender" class="validate[required]" >
            <option value="0">Male</option>
            <option value="1">Female</option>
         </select>
      </div>

      <div class="form-element">
         <label for="marital_status">Marital Status</label>
         <select name="seeker[marital_status]" id="marital_status" class="validate[required]" >
            <option value="0">Single</option>
            <option value="1">Married</option>
         </select>
      </div>
      <div id="nation_list">
         <label for="nationalities">Nationalities :</label>
         <div class="form-element" id="nation">
            <select name="nationalities[]" class="validate[required] nationalities" id="nation-element">
               <option value="">Select Country</option>
               <?php $doo_view_basic_1308080557 = $data['countries'];
if (!empty($doo_view_basic_1308080557)):
foreach($doo_view_basic_1308080557 as $data['country']):
?>
               <option value="<?php echo $data['country']->id; ?>"><?php echo $data['country']->country_name; ?></option>
               <?php endforeach;
 endif; ?>
            </select>
         </div>
         <a id="add_more_nation" href="#0" onclick="addMoreNation();">Add More</a>
      </div>
      <div class="form-element">
         <label for="living_in">Living In</label>
         <select name="seeker[living_in]" id="living_in" class="validate[required]" >
            <option value="">Select Country</option>
            <?php $doo_view_basic_1308080558 = $data['countries'];
if (!empty($doo_view_basic_1308080558)):
foreach($doo_view_basic_1308080558 as $data['country']):
?>
            <option value="<?php echo $data['country']->id; ?>"><?php echo $data['country']->country_name; ?></option>
            <?php endforeach;
 endif; ?>
         </select>
      </div>

      <div class="form-element">
         <label for="residency_status">Residency Status</label>
         <select name="seeker[residency_status]" id="residency_status" class="validate[required]" >
            <option value="">Select status</option>
            <option value="0">Citizen</option>
            <option value="1">Residency Visa (Non-transferable)</option>
            <option value="2">Residency Visa (Transferable)</option>
            <option value="3">Student Visa</option>
            <option value="4">Transit Visa</option>
            <option value="5">Visit Visa</option>
            <option value="6">No Visa</option>
         </select>
      </div>

   </fieldset>

   <fieldset>
      <legend>Professional Information</legend>

      <div class="form-element">
         <label for="exp_years">experience years</label>
         <input type="text" name="seeke_prof_info[exp_years]" id="exp_years" class="validate[required]" />
      </div>

      <div class="form-element">
         <label for="last_job_title">Last Job Title</label>
         <input type="text" name="seeke_prof_info[last_job_title]" id="last_job_title" class="validate[required]" />
      </div>

      <div class="form-element">
         <label for="primary_comm">Primary Community</label>
         <select name="seeke_prof_info[primary_comm]" id="primary_comm" class="validate[required]" >
            <option value="">Select Community</option>
            <?php $doo_view_basic_1308080559 = $data['industries'];
if (!empty($doo_view_basic_1308080559)):
foreach($doo_view_basic_1308080559 as $data['industry']):
?>
            <option value="<?php echo $data['industry']->id; ?>"><?php echo $data['industry']->industry_name; ?></option>
            <?php endforeach;
 endif; ?>
         </select>
      </div>

      <div class="form-element">
         <label for="second_comm">Second Community</label>
         <select name="seeke_prof_info[second_comm]" id="second_comm" >
            <option value="0">Select Community</option>
            <?php $doo_view_basic_1308080560 = $data['industries'];
if (!empty($doo_view_basic_1308080560)):
foreach($doo_view_basic_1308080560 as $data['industry']):
?>
            <option value="<?php echo $data['industry']->id; ?>"><?php echo $data['industry']->industry_name; ?></option>
            <?php endforeach;
 endif; ?>
         </select>
      </div>

      <div class="form-element">
         <label for="third_comm">Third Community</label>
         <select name="seeke_prof_info[third_comm]" id="third_comm" />
         <option value="0">Select Community</option>
         <?php $doo_view_basic_1308080561 = $data['industries'];
if (!empty($doo_view_basic_1308080561)):
foreach($doo_view_basic_1308080561 as $data['industry']):
?>
         <option value="<?php echo $data['industry']->id; ?>"><?php echo $data['industry']->industry_name; ?></option>
         <?php endforeach;
 endif; ?>
         </select>

      </div>
      <div id="lang_list">
         <label for="languages">Languages :</label>
         <div class="form-element" id="lang" >
            <select name="languages[0][name]" class="lang_name validate[required]" id="lang-element" >
               <option value="arabic">Arabic</option>
               <option value="english">English</option>
               <option value="armenian">Armenian</option>
               <option value="bengali">Bengali</option>
               <option value="cantonese">Cantonese</option>
               <option value="danish">Danish</option>
               <option value="dutch">Dutch</option>
               <option value="finnish">Finnish</option>
               <option value="french">French</option> 
               <option value="german">German</option>
               <option value="greek">Greek</option>
               <option value="hebrew">Hebrew</option>
               <option value="hindi">Hindi</option>
               <option value="italian">Italian</option>
               <option value="japanese">Japanese</option>
               <option value="kurdish">Kurdish</option>
               <option value="mandarin">Mandarin</option>
               <option value="norwegian">Norwegian</option>
               <option value="persian">Persian</option>
               <option value="portuguese">Portuguese</option>
               <option value="russian">Russian</option>
               <option value="spanish">Spanish</option>
               <option value="swedish">Swedish</option>
               <option value="turkish">Turkish</option>
               <option value="urdu">Urdu</option>
            </select>

            <select name="languages[0][proficiency]" class="lang_proficiency validate[required]" id="proficiency-element">
               <option value="beginner">Beginner</option>
               <option value="intermediate">Intermediate</option>
               <option value="fluent" selected="selected">Fluent</option>
            </select>
         </div>
         <a id="add_more" href="#0" onclick="addMoreLang();" class="button">Add More</a><br />
      </div>

      <div class="form-element">
         <label for="skills">Skills</label>
         <textarea name="seeke_prof_info[skills]" id="skills" class="validate[required]" ></textarea>
      </div>

      <div class="form-element">
         <label for="preferd_place">Preferd Place</label>
         <select name="seeke_prof_info[preferd_place]" id="preferd_place" class="validate[required]">
            <option value="">Select Country</option>
            <?php $doo_view_basic_1308080562 = $data['countries'];
if (!empty($doo_view_basic_1308080562)):
foreach($doo_view_basic_1308080562 as $data['country']):
?>
            <option value="<?php echo $data['country']->id; ?>"><?php echo $data['country']->country_name; ?></option>
            <?php endforeach;
 endif; ?>
         </select>
      </div>

   </fieldset>

   <fieldset>
      <legend>Educational Information</legend>

      <div class="form-element">
         <label for="highest_level">Highest Level</label>
         <select name="seeker_edu_info[highest_level]" id="highest_level" class="validate[required]">
            <option value="">Select Level</option>
            <option value="elementary">Elementary</option>
            <option value="high_school">High School</option>
            <option value="diploma">Diploma</option>
            <option value="uni">University</option>
         </select>
      </div>

   </fieldset>

   <div class="form-element">
      <input type="submit" value="Save" class="button"/>
   </div>

</form>