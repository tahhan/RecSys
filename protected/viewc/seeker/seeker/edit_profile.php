<h2>Edit Profile</h2>
<form action="<?php echo $data['APP_URL']; ?>seeker/edit_profile_submit" method="post">
   <fieldset>
      <legend>Personal Information</legend>
      <div class="form-element">
         <label for="name">Full Name</label>
         <input type="text" name="seeker[full_name]" id="name" value="<?php echo $data['seeker']->full_name; ?>" class="validate[required]"  />
      </div>

      <div class="form-element">
         <label for="telephone">Phone Number</label>
         <input type="text" name="seeker[telephone]" id="telephone" value="<?php echo $data['seeker']->telephone; ?>" class="validate[required]" />
      </div>

      <div class="form-element">
         <label for="DOB">DOB</label>
         <input type="text" name="date" id="DOB" class="datepicker" autocomplete="off" value="<?php echo $data['seeker']->DOB; ?>" class="validate[required]"/>
         <input type="hidden" name="seeker[DOB]" id="actualDate" value="<?php echo $data['seeker']->DOB; ?>">
      </div>

      <div class="form-element">
         <label for="gender">Gender</label>
         <select name="seeker[gender]" id="gender" >
            <option value="0" <?php if($data['seeker']->gender==0): ?> selected="selected" <?php endif; ?>>Male</option>
            <option value="1" <?php if($data['seeker']->gender==1): ?> selected="selected" <?php endif; ?>>Female</option>
         </select>
      </div>

      <div class="form-element">
         <label for="marital_status">Marital Status</label>
         <select name="seeker[marital_status]" id="marital_status" >
            <option value="0" <?php if($data['seeker']->marital_status==0): ?> selected="selected" <?php endif; ?>>Single</option>
            <option value="1" <?php if($data['seeker']->marital_status==1): ?> selected="selected" <?php endif; ?>>Married</option>
         </select>
      </div>
      <div id="nation_list">
         <label for="nationalities">Nationalities :</label>
         <?php $doo_view_basic_1308088497 = $data['seeker']->nationalities;
if (!empty($doo_view_basic_1308088497)):
foreach($doo_view_basic_1308088497 as $data['nationalitie']):
?>
         <div class="form-element" id="nation">
            <select name="nationalities[]" class="nationalities"  >
               <option value="">Select Country</option>
               <?php $doo_view_basic_1308088498 = $data['countries'];
if (!empty($doo_view_basic_1308088498)):
foreach($doo_view_basic_1308088498 as $data['country']):
?>
               <option value="<?php echo $data['country']->id; ?>" <?php if($data['nationalitie']==$data['country']->id): ?>selected="selected"<?php endif; ?>><?php echo $data['country']->country_name; ?></option>
               <?php endforeach;
 endif; ?>
            </select>
         </div>
         <?php endforeach;
 endif; ?>
         <a id="add_more_nation" href="#0" onclick="addMoreNation();" class="button">Add More</a>
      </div>
      <div class="form-element">
         <label for="living_in">Living In</label>
         <select name="seeker[living_in]" id="living_in" class="validate[required]" >
            <option value="">Select Country</option>
            <?php $doo_view_basic_1308088499 = $data['countries'];
if (!empty($doo_view_basic_1308088499)):
foreach($doo_view_basic_1308088499 as $data['country']):
?>
            <option value="<?php echo $data['country']->id; ?>" <?php if($data['seeker']->living_in==$data['country']->id): ?>selected="selected"<?php endif; ?>><?php echo $data['country']->country_name; ?></option>
            <?php endforeach;
 endif; ?>
         </select>
      </div>

      <div class="form-element">
         <label for="residency_status">Residency Status</label>
         <select name="seeker[residency_status]" id="residency_status" class="validate[required]" >
            <option value="">Select status</option>
            <option value="0" <?php if($data['seeker']->residency_status==0): ?>selected="selected"<?php endif; ?>>Citizen</option>
            <option value="1" <?php if($data['seeker']->residency_status==1): ?>selected="selected"<?php endif; ?>>Residency Visa (Non-transferable)</option>
            <option value="2" <?php if($data['seeker']->residency_status==2): ?>selected="selected"<?php endif; ?>>Residency Visa (Transferable)</option>
            <option value="3" <?php if($data['seeker']->residency_status==3): ?>selected="selected"<?php endif; ?>>Student Visa</option>
            <option value="4" <?php if($data['seeker']->residency_status==4): ?>selected="selected"<?php endif; ?>>Transit Visa</option>
            <option value="5" <?php if($data['seeker']->residency_status==5): ?>selected="selected"<?php endif; ?>>Visit Visa</option>
            <option value="6" <?php if($data['seeker']->residency_status==6): ?>selected="selected"<?php endif; ?>>No Visa</option>
         </select>
      </div>

   </fieldset>

   <fieldset>
      <legend>Professional Information</legend>

      <div class="form-element">
         <label for="exp_years">experience years</label>
         <input type="text" name="seeke_prof_info[exp_years]" id="exp_years" value="<?php echo $data['seeker']->SeekerProfessionalInfo->exp_years; ?>" class="validate[required]" />
      </div>

      <div class="form-element">
         <label for="last_job_title">Last Job Title</label>
         <input type="text" name="seeke_prof_info[last_job_title]" id="last_job_title" value="<?php echo $data['seeker']->SeekerProfessionalInfo->last_job_title; ?>" class="validate[required]" />
      </div>

      <div class="form-element">
         <label for="primary_comm">Primary Community</label>
         <select name="seeke_prof_info[primary_comm]" id="primary_comm" class="validate[required]" >
            <option value="">Select Community</option>
            <?php $doo_view_basic_1308088500 = $data['industries'];
if (!empty($doo_view_basic_1308088500)):
foreach($doo_view_basic_1308088500 as $data['industry']):
?>
            <option value="<?php echo $data['industry']->id; ?>" <?php if($data['seeker']->SeekerProfessionalInfo->primary_comm==$data['industry']->id): ?>selected="selected"<?php endif; ?>><?php echo $data['industry']->industry_name; ?></option>
            <?php endforeach;
 endif; ?>
         </select>
      </div>

      <div class="form-element">
         <label for="second_comm">Second Community</label>
         <select name="seeke_prof_info[second_comm]" id="second_comm" >
            <option value="0">Select Community</option>
            <?php $doo_view_basic_1308088501 = $data['industries'];
if (!empty($doo_view_basic_1308088501)):
foreach($doo_view_basic_1308088501 as $data['industry']):
?>
            <option value="<?php echo $data['industry']->id; ?>" <?php if($data['seeker']->SeekerProfessionalInfo->second_comm==$data['industry']->id): ?>selected="selected"<?php endif; ?>><?php echo $data['industry']->industry_name; ?></option>
            <?php endforeach;
 endif; ?>
         </select>
      </div>

      <div class="form-element">
         <label for="third_comm">Third Community</label>
         <select name="seeke_prof_info[third_comm]" id="third_comm" />
         <option value="0">Select Community</option>
         <?php $doo_view_basic_1308088502 = $data['industries'];
if (!empty($doo_view_basic_1308088502)):
foreach($doo_view_basic_1308088502 as $data['industry']):
?>
         <option value="<?php echo $data['industry']->id; ?>" <?php if($data['seeker']->SeekerProfessionalInfo->third_comm==$data['industry']->id): ?>selected="selected"<?php endif; ?>><?php echo $data['industry']->industry_name; ?></option>
         <?php endforeach;
 endif; ?>
         </select>

      </div>
      <div id="lang_list">
         <label for="languages">Languages :</label>
         <?php $doo_view_basic_1308088503 = $data['seeker']->SeekerProfessionalInfo->lang_list;
if (!empty($doo_view_basic_1308088503)):
foreach($doo_view_basic_1308088503 as $data['lang']):
?>
         <div class="form-element" id="lang" >
            <select name="languages[0][name]" class="lang_name">
               <option value="arabic" <?php if($data['lang']->name=='arabic'): ?>selected="selected"<?php endif; ?>>Arabic</option>
               <option value="english" <?php if($data['lang']->name=='english'): ?>selected="selected"<?php endif; ?>>English</option>
               <option value="armenian" <?php if($data['lang']->name=='armenian'): ?>selected="selected"<?php endif; ?>>Armenian</option>
               <option value="bengali" <?php if($data['lang']->name=='bengali'): ?>selected="selected"<?php endif; ?>>Bengali</option>
               <option value="cantonese" <?php if($data['lang']->name=='cantonese'): ?>selected="selected"<?php endif; ?>>Cantonese</option>
               <option value="danish" <?php if($data['lang']->name=='danish'): ?>selected="selected"<?php endif; ?>>Danish</option>
               <option value="dutch" <?php if($data['lang']->name=='dutch'): ?>selected="selected"<?php endif; ?>>Dutch</option>
               <option value="finnish" <?php if($data['lang']->name=='finnish'): ?>selected="selected"<?php endif; ?>>Finnish</option>
               <option value="french" <?php if($data['lang']->name=='french'): ?>selected="selected"<?php endif; ?>>French</option> 
               <option value="german" <?php if($data['lang']->name=='german'): ?>selected="selected"<?php endif; ?>>German</option>
               <option value="greek" <?php if($data['lang']->name=='greek'): ?>selected="selected"<?php endif; ?>>Greek</option>
               <option value="hebrew" <?php if($data['lang']->name=='hebrew'): ?>selected="selected"<?php endif; ?>>Hebrew</option>
               <option value="hindi" <?php if($data['lang']->name=='hindi'): ?>selected="selected"<?php endif; ?>>Hindi</option>
               <option value="italian" <?php if($data['lang']->name=='italian'): ?>selected="selected"<?php endif; ?>>Italian</option>
               <option value="japanese" <?php if($data['lang']->name=='japanese'): ?>selected="selected"<?php endif; ?>>Japanese</option>
               <option value="kurdish" <?php if($data['lang']->name=='kurdish'): ?>selected="selected"<?php endif; ?>>Kurdish</option>
               <option value="mandarin" <?php if($data['lang']->name=='mandarin'): ?>selected="selected"<?php endif; ?>>Mandarin</option>
               <option value="norwegian" <?php if($data['lang']->name=='norwegian'): ?>selected="selected"<?php endif; ?>>Norwegian</option>
               <option value="persian" <?php if($data['lang']->name=='persian'): ?>selected="selected"<?php endif; ?>>Persian</option>
               <option value="portuguese" <?php if($data['lang']->name=='portuguese'): ?>selected="selected"<?php endif; ?>>Portuguese</option>
               <option value="russian" <?php if($data['lang']->name=='russian'): ?>selected="selected"<?php endif; ?>>Russian</option>
               <option value="spanish" <?php if($data['lang']->name=='spanish'): ?>selected="selected"<?php endif; ?>>Spanish</option>
               <option value="swedish" <?php if($data['lang']->name=='swedish'): ?>selected="selected"<?php endif; ?>>Swedish</option>
               <option value="turkish" <?php if($data['lang']->name=='turkish'): ?>selected="selected"<?php endif; ?>>Turkish</option>
               <option value="urdu" <?php if($data['lang']->name=='urdu'): ?>selected="selected"<?php endif; ?>>Urdu</option>
            </select>

            <select name="languages[0][proficiency]" class="lang_proficiency">
               <option value="beginner" <?php if($data['lang']->proficiency=='beginner'): ?>selected="selected"<?php endif; ?>>Beginner</option>
               <option value="intermediate" <?php if($data['lang']->proficiency=='intermediate'): ?>selected="selected"<?php endif; ?>>Intermediate</option>
               <option value="fluent" <?php if($data['lang']->proficiency=='fluent'): ?>selected="selected"<?php endif; ?>>Fluent</option>
            </select>
         </div>
         <?php endforeach;
 endif; ?>
         <a id="add_more" href="#0" onclick="addMoreLang();" class="button">Add More</a>
      </div>

      <div class="form-element">
         <label for="skills">Skills</label>
         <textarea name="seeke_prof_info[skills]" id="skills" class="validate[required]" ><?php echo $data['seeker']->SeekerProfessionalInfo->skills; ?></textarea>
      </div>

      <div class="form-element">
         <label for="preferd_place">Preferd Place</label>
         <select name="seeke_prof_info[preferd_place]" id="preferd_place" class="validate[required]" >
            <option value="">Select Country</option>
            <?php $doo_view_basic_1308088504 = $data['countries'];
if (!empty($doo_view_basic_1308088504)):
foreach($doo_view_basic_1308088504 as $data['country']):
?>
            <option value="<?php echo $data['country']->id; ?>" <?php if($data['seeker']->SeekerProfessionalInfo->preferd_place==$data['country']->id): ?>selected="selected"<?php endif; ?>><?php echo $data['country']->country_name; ?></option>
            <?php endforeach;
 endif; ?>
         </select>
      </div>

   </fieldset>

   <fieldset>
      <legend>Educational Information</legend>

      <div class="form-element">
         <label for="highest_level">Highest Level</label>
         <select name="seeker_edu_info[highest_level]" id="highest_level" class="validate[required]" >
            <option value="">Select Level</option>
            <option value="elementary" <?php if($data['seeker']->SeekerEduInfo->highest_level=='elementary'): ?>selected="selected"<?php endif; ?>>Elementary</option>
            <option value="high_school" <?php if($data['seeker']->SeekerEduInfo->highest_level=='high_school'): ?>selected="selected"<?php endif; ?>>High School</option>
            <option value="diploma" <?php if($data['seeker']->SeekerEduInfo->highest_level=='diploma'): ?>selected="selected"<?php endif; ?>>Diploma</option>
            <option value="uni" <?php if($data['seeker']->SeekerEduInfo->highest_level=='uni'): ?>selected="selected"<?php endif; ?>>University</option>
         </select>
      </div>

   </fieldset>

   <div class="form-element">
      <input type="submit" value="Save" class="button" />
   </div>

</form>